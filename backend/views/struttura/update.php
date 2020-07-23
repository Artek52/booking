<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Struttura */

$this->title = 'Update Struttura: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Struttura', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="struttura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
