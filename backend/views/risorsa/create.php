<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Risorsa */

$this->title = 'Create Risorsa';
$this->params['breadcrumbs'][] = ['label' => 'Risorsa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risorsa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
