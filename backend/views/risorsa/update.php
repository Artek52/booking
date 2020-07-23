<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Risorsa */

$this->title = 'Update Risorsa: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Risorsa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="risorsa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
