<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Prova;

class ProvaController extends Controller 
{

	public function actionLoad()
	{
		$model = new Prova();

		if($model->load(Yii::$app->request->post()))
			die('ok');
		else
			return $this -> render('prova', ['model' => $model]);
	}
}

