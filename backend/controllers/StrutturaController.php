<?php

namespace backend\controllers;

use Yii;
use backend\models\Struttura;
use backend\models\StrutturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
* StrutturaController implements the CRUD actions for Struttura model.
*/
class StrutturaController extends Controller
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
            'actions' => ['index', 'view', 'create', 'update', 'delete', 'add-risorsa'],
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
  * Lists all Struttura models.
  * @return mixed
  */
  public function actionIndex()
  {
    $searchModel = new StrutturaSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
  * Displays a single Struttura model.
  * @param integer $id
  * @return mixed
  */
  public function actionView($id)
  {
    $model = $this->findModel($id);
    $modelOrario = new \backend\models\Orario();    

    if ($modelOrario->load(Yii::$app->request->post())) {
      $modelOrario->struttura_id=$model->id;
      if(!$this->isOrarioInConflitto($modelOrario))
        $modelOrario->save();
      else
      Yii::$app->session->addFlash('error', "Dati in conflitto");

    }

    $providerRisorsa = new \yii\data\ArrayDataProvider([
      'allModels' => $model->risorse,
    ]);

    $providerOrario = new \yii\data\ArrayDataProvider([
      'allModels' => $model->orari,
    ]);

    return $this->render('view', [
      'model' => $this->findModel($id),
      'modelOrario' => $modelOrario,
      'providerOrario' => $providerOrario,
      'providerRisorsa' => $providerRisorsa,
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

if ($model->risorsa_id!=null) {
  $conflitti->andWhere(['risorsa_id'=>$model->risorsa_id]);
}
if ($model->id!=null) {
  $conflitti->andWhere(['<>','id',$model->id]);
}

if ($conflitti->count() >0) {
  return true;
}
return false;
}
/**
* Creates a new Struttura model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
  $model = new Struttura();

  if ($model->load(Yii::$app->request->post()) && $model->save()) {
    return $this->redirect(['index']);
  } else {
    return $this->render('create', [
      'model' => $model,
    ]);
  }
}

/**
* Updates an existing Struttura model.
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
* Deletes an existing Struttura model.
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
* Finds the Struttura model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id
* @return Struttura the loaded model
* @throws NotFoundHttpException if the model cannot be found
*/
protected function findModel($id)
{
  if (($model = Struttura::findOne($id)) !== null) {
    return $model;
  } else {
    throw new NotFoundHttpException('The requested page does not exist.');
  }
}

/**
* Action to load a tabular form grid
* for Risorsa
* @author Yohanes Candrajaya <moo.tensai@gmail.com>
* @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
*
* @return mixed
*/
public function actionAddRisorsa()
{
  if (Yii::$app->request->isAjax) {
    $row = Yii::$app->request->post('Risorsa');
    if (!empty($row)) {
      $row = array_values($row);
    }
    if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
    $row[] = [];
    return $this->renderAjax('_formRisorsa', ['row' => $row]);
  } else {
    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
}
