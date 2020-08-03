<?php

namespace backend\controllers;

use Yii;
use common\models\Disponibilita;
use common\models\DisponibilitaSearch;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\SearchForm;

/**
 * DisponibilitaController implements the CRUD actions for Disponibilita model.
 */
class DisponibilitaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete','check-on-disponibilita'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Disponibilita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DisponibilitaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Disponibilita model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Disponibilita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Disponibilita();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Disponibilita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Disponibilita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Disponibilita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Disponibilita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Disponibilita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCheckOnDisponibilita()
    {
        $model = new SearchForm();

        if ($model->load(Yii::$app->request->post())) {

          $ora_inizio = \DateTime::createFromFormat ("H:i", $model->inizio_orario);
          $ora_fine = \DateTime::createFromFormat ("H:i", $model->fine_orario);
          $int_ora_inizio = (integer) str_replace(":*", "", $model->inizio_orario);
          $int_ora_fine = (integer) str_replace(":*", "", $model->fine_orario);

              $Query="";
              $aQuery="";
              for ($i= $int_ora_inizio; $i <= $int_ora_fine ; $i++) {
                  foreach (['00', '15', '30', '45'] as $y) {
                      $Query .= "orario_" . substr('0' . $i, -2) . '_' . $y . " = 1 and " ;
                      $aQuery .= "orario_" . substr('0' . $i, -2) . '_' . $y .", ";
                  }
              }

              $Query = substr($Query, 0 , -5);
              $aQuery = substr($aQuery, 0 , -2);

              $sQuery ="SELECT $aQuery FROM disponibilita WHERE data = '$model->data'  AND  ($Query)";
              $count = (int) "SELECT count(*) FROM disponibilita WHERE data = '2020-07-25'  AND risorsa_id = 1192 AND  ($Query)";



              $disponibilitaProvider = new SqlDataProvider([
                  "sql" => "$sQuery" ,
                  "totalCount" => "$count",
                  "sort" => [
                      "attributes" => ["risorsa_id","data"],
                  ],
                  "pagination" => [
                      "pageSize" => 20,
                  ],
              ]);

            return $this->render('controlloDisponibilita',
              ['disponibilitaProvider' => $disponibilitaProvider,
            ]);

        } else {
            return $this->render('search', [
                'model' => $model,
            ]);
        }
    }

    // public function actionCheckOnDisponibilita(){
    //
    //     $searchFormModel = new SearchForm();
    //     $this->render('search', ['searchFormModel' => $searchFormModel]);
    //     if($searchFormModel->load(Yii::$app->request->post()) && $searchFormModel->validate())
    //     {
    //
    //     return $this->render('controlloDisponibilita.php',["disponibilitaProvider" => $disponibilitaProvider]);
    //     }
    // }
    }
