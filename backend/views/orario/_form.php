<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orario */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="row">

  <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

  <div class="col-md-2">
    <?= $form->field($model, 'struttura_id')->widget(\kartik\widgets\Select2::classname(), [
      'data' => \yii\helpers\ArrayHelper::map(\backend\models\Struttura::find()->orderBy('id')->asArray()->all(), 'id', 'nome'),
      'options' => ['placeholder' => 'Choose Struttura'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]); ?>
  </div>

    <div class="col-md-2">
      <?= $form->field($model, 'risorsa_id')->widget(\kartik\widgets\Select2::classname(), [
          'data' => \yii\helpers\ArrayHelper::map(\backend\models\Risorsa::find()->orderBy('id')->asArray()->all(), 'id', 'nome'),
          'options' => ['placeholder' => 'Choose Risorsa'],
          'pluginOptions' => [
          'allowClear' => true
          ],
      ]); ?>

    </div>
  </div>

  <div class="row">

    <div class="col-md-2">
      <?= $form->field($model, 'inizio_orario')->widget(\kartik\datecontrol\DateControl::className(), [
          'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
          'saveFormat' => 'php:H:i:s',
          'ajaxConversion' => true,
          'options' => [
              'pluginOptions' => [
                  'placeholder' => 'Choose Inizio Orario',
                  'autoclose' => true
              ]
          ]
      ]); ?>
    </div>

  <div class="col-md-2">
    <?= $form->field($model, 'fine_orario')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Fine Orario',
                'autoclose' => true
            ]
        ]
    ]); ?>
  </div>

    <div class="col-md-2">
    <?= $form->field($model, 'data_inizio')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Data Inizio',
                'autoclose' => true
            ]
        ],
    ]); ?>
  </div>

  <div class="col-md-2">
    <?= $form->field($model, 'data_fine')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Data Fine',
                'autoclose' => true
            ]
        ],
    ]); ?>
    </div>
  </div>

    <?= $form->field($model, 'lock', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

  <div class="row">
    <div class="col-md-1">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>
