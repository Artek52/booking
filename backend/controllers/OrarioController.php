<?php

namespace backend\controllers;

use Yii;
use backend\models\Orario;
use backend\models\OrarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrarioController implements the CRUD actions for Orario model.
 */
class OrarioController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
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
     * Lists all Orario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orario model.
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
     * Finds the Orario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Orario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orario();
        if ($model->load(Yii::$app->request->post()) ) {

            if($this->isOrarioInConflitto($model)){
                Yii::$app->session->addFlash('error', "Dati in conflitto");
            }else{
                if($model->save()){
                    $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    private function isOrarioInConflitto($model) {

        $conflitti= \backend\models\Orario::find()
            ->andWhere(['giorno' => $model->giorno])
            ->andWhere(['struttura_id' => $model->struttura_id])
            ->andWhere(['OR',
                ['AND',
                    ['>=','data_inizio',$model->data_inizio],
                    ['<','data_inizio',$model->data_fine]
                ],
                ['AND',
                    ['>','data_fine',$model->data_inizio],
                    ['<=','data_fine',$model->data_fine]
                ],
            ])
            ->andWhere(['OR',
                ['AND',
                    ['>=','inizio_orario',$model->inizio_orario],
                    ['<','inizio_orario',$model->fine_orario]
                ],
                ['AND',
                    ['>','fine_orario',$model->inizio_orario],
                    ['<=','fine_orario',$model->fine_orario]
                ],
            ]);

        if ($model->risorsa_id!=null)
            $conflitti->andWhere(['risorsa_id'=>$model->risorsa_id]);

        if ($model->id!=null)
            $conflitti->andWhere(['<>','id',$model->id]);


        if ($conflitti->count() >0)
            return true;

        return false;
    }

    /**
     * Updates an existing Orario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            if($this->isOrarioInConflitto($model)){
                die("CONFLITTO");
            }else{
                if($model->save()){
                    $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
}
