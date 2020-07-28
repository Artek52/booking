<?php

namespace backend\controllers;

use Yii;
use backend\models\Risorsa;
use backend\models\Disponibilita;
use backend\models\RisorsaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RisorsaController implements the CRUD actions for Risorsa model.
 */
class RisorsaController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'add-disponibilita', 'add-prenotazione'],
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
     * Lists all Risorsa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RisorsaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Risorsa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelOrario = new \backend\models\Orario();
        $modelOrario->struttura_id = $model->struttura_id;
        $modelOrario->risorsa_id = $model->id;

        if ( $modelOrario->load(Yii::$app->request->post())) {
            if( ! $this->isOrarioInConflitto($modelOrario)) {
                $data = \DateTime::createFromFormat ("Y-m-d", $modelOrario->data_inizio);
                $dataFine = \DateTime::createFromFormat ("Y-m-d", $modelOrario->data_fine);
                $ora_inizio = (integer) str_replace(":", "", $modelOrario->inizio_orario);
                $ora_fine = (integer) str_replace(":", "", $modelOrario->fine_orario);

                while ($data->diff($dataFine)->format('%r%a') > 0) {
                    $modelDisponibilita = new \backend\models\Disponibilita();
                    $modelDisponibilita->risorsa_id = $model->id;
                    $modelDisponibilita->data = $data->format('Y-m-d');

                    for ($i=0; $i <=23 ; $i++) {
                        foreach (['00', '15', '30', '45'] as $y) {
                            $field = 'orario_' . substr('0' . $i, -2) . '_' . $y;
                            $tmp = substr("0" . $i, -2) . ":" . $y;
                            $ora_attuale = (integer) str_replace(":", "", $tmp);

                            if(($ora_inizio<$ora_attuale)&&($ora_attuale<$ora_fine))
                                $modelDisponibilita->$field = 0;
                            else
                                $modelDisponibilita->$field = -1;

                        }

                    }
                    $modelDisponibilita->save();

                    $data->add(new \DateInterval('P7D'));
                }
                $modelOrario->save();

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->addFlash('error', "Dati in conflitto");
            }

        }

        $providerOrario = new \yii\data\ArrayDataProvider([
            'allModels' => $model->orari,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelOrario' => $modelOrario,
            'providerOrario' => $providerOrario,
        ]);
    }



    private function isOrarioInConflitto($model) {

        $conflitti= \backend\models\Orario::find()
            ->andWhere(['giorno' => $model->giorno])
            ->andWhere(['struttura_id' => $model->struttura_id])
            ->andWhere(['OR', ['OR',
                ['AND', ['<', 'data_inizio',$model->data_inizio], ['>','data_fine',$model->data_inizio]],
                ['AND', ['<','data_fine',$model->data_fine], ['>','data_fine',$model->data_fine]]
            ], ['AND',
                ['data_inizio' => $model->data_inizio],
                ['data_fine' => $model->data_fine],
                ['OR',
                    ['AND', ['<=','inizio_orario',$model->inizio_orario], ['>=','fine_orario',$model->inizio_orario]],
                    ['AND', ['<=','inizio_orario',$model->fine_orario], ['>=','fine_orario',$model->fine_orario]],
                ]
            ]]);

        if ($model->id!=null) {
            $conflitti->andWhere(['<>','id',$model->id]);
        }

        if ($conflitti->count() >0) {
            return true;
        }
        return false;
    }

    /**
     * Creates a new Risorsa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Risorsa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Risorsa model.
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
     * Deletes an existing Risorsa model.
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
     * Finds the Risorsa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Risorsa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Risorsa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for Disponibilita
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddDisponibilita()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Disponibilita');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formDisponibilita', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for Prenotazione
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPrenotazione()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Prenotazione');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPrenotazione', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
