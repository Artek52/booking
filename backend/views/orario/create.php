<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Orario */

$this->title = 'Create Orario';
$this->params['breadcrumbs'][] = ['label' => 'Orario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
