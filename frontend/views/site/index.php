<?php

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Cerca Strutture</h1>

        <p class="lead">digita struttura</p>

        <?php $form = ActiveForm::begin(); ?>
        <?=

            $form->field($formModel, 'nome')->textInput();
        ?>

        <?= Html::submitButton('prova') ?>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
              <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_post',
                         ]);
              ?>

            </div>
        </div>

    </div>
</div>
