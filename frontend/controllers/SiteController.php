<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Struttura;
use backend\models\Risorsa;
use yii\data\ActiveDataProvider;
use common\models\SearchForm;
use common\models\Disponibilita;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Struttura::find();
        $formModel = new Struttura();

        if ($formModel->load(Yii::$app->request->post())) {

            $query = $model;
            $query->andFilterWhere([
                'nome' => $formModel->nome,
            ]);

            $dataProvider = new ActiveDataProvider([
              'query' => $model,
              'pagination' => [
                'pageSize' => 5,
              ],
            ]);
            return $this->render('index', ['dataProvider' => $dataProvider , 'model' => $model , 'formModel' => $formModel]);
        }

        else
        {
          $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
              'pageSize' => 5,
            ],
          ]);
          return $this->render('index', ['dataProvider' => $dataProvider , 'model' => $model , 'formModel' => $formModel]);
      }
        }


    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionDetailStruttura($id){
      $model = Struttura::findOne(['id' => $id]);

      $risorsaProvider = new ActiveDataProvider([
        'query' => $model->getRisorse(),
        'pagination' => [
          'pageSize' => 5,
        ],
      ]);

      return $this->render('strutturaDetails', [
        'model' => $model,
        'risorsaProvider' => $risorsaProvider
      ]);

    }

      public function actionDetailRisorse($id){
        $model = Risorsa::findOne(['id' => $id]);
        // ->where();
        $disponibilitaProvider = new ActiveDataProvider([
          'query' => $model->getOrari(),
          'pagination' => [
            'pageSize' => 5,
          ],
        ]);

        return $this->render('risorsaDetails', [
          'model' => $model,
          'disponibilitaProvider' => $disponibilitaProvider
        ]);



      }

      public function actionDetailDisponibilita($id){

          $model = new searchForm();
          if($model->load(Yii::$app->request->post())){
              $ora_inizio = \DateTime::createFromFormat ("H:i", $model->inizio_orario);
              $ora_fine = \DateTime::createFromFormat ("H:i", $model->fine_orario);
              $int_ora_inizio = (integer) str_replace(":*", "", $model->inizio_orario);
              $int_ora_fine = (integer) str_replace(":*", "", $model->fine_orario);

              $Query="";
              $aQuery="";
              for ($i = $int_ora_inizio; $i <= $int_ora_fine ; $i++) {
                  foreach (['00', '15', '30', '45'] as $y) {
                      $Query .= "orario_" . substr('0' . $i, -2) . '_' . $y . " = 0 or " ;
                      $aQuery .= "orario_" . substr('0' . $i, -2) . '_' . $y .", ";
                  }
              }
              $aQuery = substr($aQuery, 0 , -2);
              $Query = substr($Query, 0 , -4);
              $modelDisponibilita = Disponibilita::find(['id' => $id])
              ->select('id, ' . $aQuery)
              ->where($Query)
              ->andWhere(['>=', 'data', $model->data]);
              //->Where(['id' => $id]);

              $disponibilitaProvider = new ActiveDataProvider([
                  'query' => $modelDisponibilita,
                  'pagination' => [
                      'pageSize' => 5,
                  ],
              ]);

              return $this->render('viewDisponibilita', [
                  'model' => $modelDisponibilita->asArray(true),
                  'disponibilitaProvider' => $disponibilitaProvider, 'select' => $aQuery
              ]);
          } else {
              return $this->render('search.php', ['model' => $model]);

          }
      }
            public function search($params)
            {
                $query = Struttura::find();

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                $this->load($params);

                if (!$this->validate()) {
                    // uncomment the following line if you do not want to return any records when validation fails
                    // $query->where('0=1');
                    return $dataProvider;
                }

                $query->andFilterWhere([
                    'id' => $this->id,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                    'created_by' => $this->created_by,
                    'updated_by' => $this->updated_by,
                    'deleted_by' => $this->deleted_by,
                    'deleted_at' => $this->deleted_at,
                ]);

                $query->andFilterWhere(['like', 'nome', $this->nome])
                    ->andFilterWhere(['like', 'indirizzo', $this->indirizzo]);

                return $dataProvider;
            }
}
