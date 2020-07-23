<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Struttura */

$this->title = 'Create Struttura';
$this->params['breadcrumbs'][] = ['label' => 'Struttura', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struttura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
