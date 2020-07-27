<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Disponibilita */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="disponibilita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'risorsa_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Risorsa::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Risorsa'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'data')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Data',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'orario_00_00')->textInput(['placeholder' => 'Orario 00 00']) ?>

    <?= $form->field($model, 'orario_00_15')->textInput(['placeholder' => 'Orario 00 15']) ?>

    <?= $form->field($model, 'orario_00_30')->textInput(['placeholder' => 'Orario 00 30']) ?>

    <?= $form->field($model, 'orario_00_45')->textInput(['placeholder' => 'Orario 00 45']) ?>

    <?= $form->field($model, 'orario_01_00')->textInput(['placeholder' => 'Orario 01 00']) ?>

    <?= $form->field($model, 'orario_01_15')->textInput(['placeholder' => 'Orario 01 15']) ?>

    <?= $form->field($model, 'orario_01_30')->textInput(['placeholder' => 'Orario 01 30']) ?>

    <?= $form->field($model, 'orario_01_45')->textInput(['placeholder' => 'Orario 01 45']) ?>

    <?= $form->field($model, 'orario_02_00')->textInput(['placeholder' => 'Orario 02 00']) ?>

    <?= $form->field($model, 'orario_02_15')->textInput(['placeholder' => 'Orario 02 15']) ?>

    <?= $form->field($model, 'orario_02_30')->textInput(['placeholder' => 'Orario 02 30']) ?>

    <?= $form->field($model, 'orario_02_45')->textInput(['placeholder' => 'Orario 02 45']) ?>

    <?= $form->field($model, 'orario_03_00')->textInput(['placeholder' => 'Orario 03 00']) ?>

    <?= $form->field($model, 'orario_03_15')->textInput(['placeholder' => 'Orario 03 15']) ?>

    <?= $form->field($model, 'orario_03_30')->textInput(['placeholder' => 'Orario 03 30']) ?>

    <?= $form->field($model, 'orario_03_45')->textInput(['placeholder' => 'Orario 03 45']) ?>

    <?= $form->field($model, 'orario_04_00')->textInput(['placeholder' => 'Orario 04 00']) ?>

    <?= $form->field($model, 'orario_04_15')->textInput(['placeholder' => 'Orario 04 15']) ?>

    <?= $form->field($model, 'orario_04_30')->textInput(['placeholder' => 'Orario 04 30']) ?>

    <?= $form->field($model, 'orario_04_45')->textInput(['placeholder' => 'Orario 04 45']) ?>

    <?= $form->field($model, 'orario_05_00')->textInput(['placeholder' => 'Orario 05 00']) ?>

    <?= $form->field($model, 'orario_05_15')->textInput(['placeholder' => 'Orario 05 15']) ?>

    <?= $form->field($model, 'orario_05_30')->textInput(['placeholder' => 'Orario 05 30']) ?>

    <?= $form->field($model, 'orario_05_45')->textInput(['placeholder' => 'Orario 05 45']) ?>

    <?= $form->field($model, 'orario_06_00')->textInput(['placeholder' => 'Orario 06 00']) ?>

    <?= $form->field($model, 'orario_06_15')->textInput(['placeholder' => 'Orario 06 15']) ?>

    <?= $form->field($model, 'orario_06_30')->textInput(['placeholder' => 'Orario 06 30']) ?>

    <?= $form->field($model, 'orario_06_45')->textInput(['placeholder' => 'Orario 06 45']) ?>

    <?= $form->field($model, 'orario_07_00')->textInput(['placeholder' => 'Orario 07 00']) ?>

    <?= $form->field($model, 'orario_07_15')->textInput(['placeholder' => 'Orario 07 15']) ?>

    <?= $form->field($model, 'orario_07_30')->textInput(['placeholder' => 'Orario 07 30']) ?>

    <?= $form->field($model, 'orario_07_45')->textInput(['placeholder' => 'Orario 07 45']) ?>

    <?= $form->field($model, 'orario_08_00')->textInput(['placeholder' => 'Orario 08 00']) ?>

    <?= $form->field($model, 'orario_08_15')->textInput(['placeholder' => 'Orario 08 15']) ?>

    <?= $form->field($model, 'orario_08_30')->textInput(['placeholder' => 'Orario 08 30']) ?>

    <?= $form->field($model, 'orario_08_45')->textInput(['placeholder' => 'Orario 08 45']) ?>

    <?= $form->field($model, 'orario_09_00')->textInput(['placeholder' => 'Orario 09 00']) ?>

    <?= $form->field($model, 'orario_09_15')->textInput(['placeholder' => 'Orario 09 15']) ?>

    <?= $form->field($model, 'orario_09_30')->textInput(['placeholder' => 'Orario 09 30']) ?>

    <?= $form->field($model, 'orario_09_45')->textInput(['placeholder' => 'Orario 09 45']) ?>

    <?= $form->field($model, 'orario_10_00')->textInput(['placeholder' => 'Orario 10 00']) ?>

    <?= $form->field($model, 'orario_10_15')->textInput(['placeholder' => 'Orario 10 15']) ?>

    <?= $form->field($model, 'orario_10_30')->textInput(['placeholder' => 'Orario 10 30']) ?>

    <?= $form->field($model, 'orario_10_45')->textInput(['placeholder' => 'Orario 10 45']) ?>

    <?= $form->field($model, 'orario_11_00')->textInput(['placeholder' => 'Orario 11 00']) ?>

    <?= $form->field($model, 'orario_11_15')->textInput(['placeholder' => 'Orario 11 15']) ?>

    <?= $form->field($model, 'orario_11_30')->textInput(['placeholder' => 'Orario 11 30']) ?>

    <?= $form->field($model, 'orario_11_45')->textInput(['placeholder' => 'Orario 11 45']) ?>

    <?= $form->field($model, 'orario_12_00')->textInput(['placeholder' => 'Orario 12 00']) ?>

    <?= $form->field($model, 'orario_12_15')->textInput(['placeholder' => 'Orario 12 15']) ?>

    <?= $form->field($model, 'orario_12_30')->textInput(['placeholder' => 'Orario 12 30']) ?>

    <?= $form->field($model, 'orario_12_45')->textInput(['placeholder' => 'Orario 12 45']) ?>

    <?= $form->field($model, 'orario_13_00')->textInput(['placeholder' => 'Orario 13 00']) ?>

    <?= $form->field($model, 'orario_13_15')->textInput(['placeholder' => 'Orario 13 15']) ?>

    <?= $form->field($model, 'orario_13_30')->textInput(['placeholder' => 'Orario 13 30']) ?>

    <?= $form->field($model, 'orario_13_45')->textInput(['placeholder' => 'Orario 13 45']) ?>

    <?= $form->field($model, 'orario_14_00')->textInput(['placeholder' => 'Orario 14 00']) ?>

    <?= $form->field($model, 'orario_14_15')->textInput(['placeholder' => 'Orario 14 15']) ?>

    <?= $form->field($model, 'orario_14_30')->textInput(['placeholder' => 'Orario 14 30']) ?>

    <?= $form->field($model, 'orario_14_45')->textInput(['placeholder' => 'Orario 14 45']) ?>

    <?= $form->field($model, 'orario_15_00')->textInput(['placeholder' => 'Orario 15 00']) ?>

    <?= $form->field($model, 'orario_15_15')->textInput(['placeholder' => 'Orario 15 15']) ?>

    <?= $form->field($model, 'orario_15_30')->textInput(['placeholder' => 'Orario 15 30']) ?>

    <?= $form->field($model, 'orario_15_45')->textInput(['placeholder' => 'Orario 15 45']) ?>

    <?= $form->field($model, 'orario_16_00')->textInput(['placeholder' => 'Orario 16 00']) ?>

    <?= $form->field($model, 'orario_16_15')->textInput(['placeholder' => 'Orario 16 15']) ?>

    <?= $form->field($model, 'orario_16_30')->textInput(['placeholder' => 'Orario 16 30']) ?>

    <?= $form->field($model, 'orario_16_45')->textInput(['placeholder' => 'Orario 16 45']) ?>

    <?= $form->field($model, 'orario_17_00')->textInput(['placeholder' => 'Orario 17 00']) ?>

    <?= $form->field($model, 'orario_17_15')->textInput(['placeholder' => 'Orario 17 15']) ?>

    <?= $form->field($model, 'orario_17_30')->textInput(['placeholder' => 'Orario 17 30']) ?>

    <?= $form->field($model, 'orario_17_45')->textInput(['placeholder' => 'Orario 17 45']) ?>

    <?= $form->field($model, 'orario_18_00')->textInput(['placeholder' => 'Orario 18 00']) ?>

    <?= $form->field($model, 'orario_18_15')->textInput(['placeholder' => 'Orario 18 15']) ?>

    <?= $form->field($model, 'orario_18_30')->textInput(['placeholder' => 'Orario 18 30']) ?>

    <?= $form->field($model, 'orario_18_45')->textInput(['placeholder' => 'Orario 18 45']) ?>

    <?= $form->field($model, 'orario_19_00')->textInput(['placeholder' => 'Orario 19 00']) ?>

    <?= $form->field($model, 'orario_19_15')->textInput(['placeholder' => 'Orario 19 15']) ?>

    <?= $form->field($model, 'orario_19_30')->textInput(['placeholder' => 'Orario 19 30']) ?>

    <?= $form->field($model, 'orario_19_45')->textInput(['placeholder' => 'Orario 19 45']) ?>

    <?= $form->field($model, 'orario_20_00')->textInput(['placeholder' => 'Orario 20 00']) ?>

    <?= $form->field($model, 'orario_20_15')->textInput(['placeholder' => 'Orario 20 15']) ?>

    <?= $form->field($model, 'orario_20_30')->textInput(['placeholder' => 'Orario 20 30']) ?>

    <?= $form->field($model, 'orario_20_45')->textInput(['placeholder' => 'Orario 20 45']) ?>

    <?= $form->field($model, 'orario_21_00')->textInput(['placeholder' => 'Orario 21 00']) ?>

    <?= $form->field($model, 'orario_21_15')->textInput(['placeholder' => 'Orario 21 15']) ?>

    <?= $form->field($model, 'orario_21_30')->textInput(['placeholder' => 'Orario 21 30']) ?>

    <?= $form->field($model, 'orario_21_45')->textInput(['placeholder' => 'Orario 21 45']) ?>

    <?= $form->field($model, 'orario_22_00')->textInput(['placeholder' => 'Orario 22 00']) ?>

    <?= $form->field($model, 'orario_22_15')->textInput(['placeholder' => 'Orario 22 15']) ?>

    <?= $form->field($model, 'orario_22_30')->textInput(['placeholder' => 'Orario 22 30']) ?>

    <?= $form->field($model, 'orario_22_45')->textInput(['placeholder' => 'Orario 22 45']) ?>

    <?= $form->field($model, 'orario_23_00')->textInput(['placeholder' => 'Orario 23 00']) ?>

    <?= $form->field($model, 'orario_23_15')->textInput(['placeholder' => 'Orario 23 15']) ?>

    <?= $form->field($model, 'orario_23_30')->textInput(['placeholder' => 'Orario 23 30']) ?>

    <?= $form->field($model, 'orario_23_45')->textInput(['placeholder' => 'Orario 23 45']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
