<?php

use kartik\datecontrol\DateControl;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(); ?>


<?= $form->field($model, 'data')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATE,
    'saveFormat' => 'php:Y-m-d',
    'ajaxConversion' => true,
    'options' => [
        'pluginOptions' => [
            'placeholder' => 'Choose Data',
            'autoclose' => true
        ]
    ],
]);
?>


<div class="col-md-2">
    <?=
     $form->field($model, 'inizio_orario')->widget(TimePicker::classname(),
    [
      'pluginOptions' => [
        'showSeconds' => false,
        'showMeridian' => false,
        'minuteStep' => 15,
      ]
      ])->label("dalle"); ?>
    </div>

    <div class="col-md-2">
      <?= $form->field($model, 'fine_orario')->widget(TimePicker::classname(),
      [
        'pluginOptions' => [
          'showSeconds' => false,
          'showMeridian' => false,
          'minuteStep' => 15,
        ]
        ])->label("alle");
      ?>
      </div>

      <?= Html::submitButton('prova') ?>

<?php ActiveForm::end(); ?>
