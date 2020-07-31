<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Disponibilita */

$this->title = 'Create Disponibilita';
$this->params['breadcrumbs'][] = ['label' => 'Disponibilita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disponibilita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
