<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orario */

$this->title = 'Update Orario: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orario', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
