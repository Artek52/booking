<?php

use kartik\datecontrol\DateControl;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'data_corrente')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATETIME,
    'saveFormat' => 'php:Y-m-d-h-i',
    'ajaxConversion' => true,
    'options' => [
        'pluginOptions' => [
        'placeholder' => 'Choose Data',
        'autoclose' => true
        ]
    ],
]);
?>


<?= Html::submitButton('Invio') ?>

<?php ActiveForm::end(); ?>
