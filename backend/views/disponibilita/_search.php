<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DisponibilitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-disponibilita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

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

    <?php /* echo $form->field($model, 'orario_00_30')->textInput(['placeholder' => 'Orario 00 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_00_45')->textInput(['placeholder' => 'Orario 00 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_01_00')->textInput(['placeholder' => 'Orario 01 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_01_15')->textInput(['placeholder' => 'Orario 01 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_01_30')->textInput(['placeholder' => 'Orario 01 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_01_45')->textInput(['placeholder' => 'Orario 01 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_02_00')->textInput(['placeholder' => 'Orario 02 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_02_15')->textInput(['placeholder' => 'Orario 02 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_02_30')->textInput(['placeholder' => 'Orario 02 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_02_45')->textInput(['placeholder' => 'Orario 02 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_03_00')->textInput(['placeholder' => 'Orario 03 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_03_15')->textInput(['placeholder' => 'Orario 03 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_03_30')->textInput(['placeholder' => 'Orario 03 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_03_45')->textInput(['placeholder' => 'Orario 03 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_04_00')->textInput(['placeholder' => 'Orario 04 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_04_15')->textInput(['placeholder' => 'Orario 04 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_04_30')->textInput(['placeholder' => 'Orario 04 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_04_45')->textInput(['placeholder' => 'Orario 04 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_05_00')->textInput(['placeholder' => 'Orario 05 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_05_15')->textInput(['placeholder' => 'Orario 05 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_05_30')->textInput(['placeholder' => 'Orario 05 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_05_45')->textInput(['placeholder' => 'Orario 05 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_06_00')->textInput(['placeholder' => 'Orario 06 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_06_15')->textInput(['placeholder' => 'Orario 06 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_06_30')->textInput(['placeholder' => 'Orario 06 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_06_45')->textInput(['placeholder' => 'Orario 06 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_07_00')->textInput(['placeholder' => 'Orario 07 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_07_15')->textInput(['placeholder' => 'Orario 07 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_07_30')->textInput(['placeholder' => 'Orario 07 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_07_45')->textInput(['placeholder' => 'Orario 07 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_08_00')->textInput(['placeholder' => 'Orario 08 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_08_15')->textInput(['placeholder' => 'Orario 08 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_08_30')->textInput(['placeholder' => 'Orario 08 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_08_45')->textInput(['placeholder' => 'Orario 08 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_09_00')->textInput(['placeholder' => 'Orario 09 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_09_15')->textInput(['placeholder' => 'Orario 09 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_09_30')->textInput(['placeholder' => 'Orario 09 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_09_45')->textInput(['placeholder' => 'Orario 09 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_10_00')->textInput(['placeholder' => 'Orario 10 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_10_15')->textInput(['placeholder' => 'Orario 10 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_10_30')->textInput(['placeholder' => 'Orario 10 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_10_45')->textInput(['placeholder' => 'Orario 10 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_11_00')->textInput(['placeholder' => 'Orario 11 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_11_15')->textInput(['placeholder' => 'Orario 11 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_11_30')->textInput(['placeholder' => 'Orario 11 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_11_45')->textInput(['placeholder' => 'Orario 11 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_12_00')->textInput(['placeholder' => 'Orario 12 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_12_15')->textInput(['placeholder' => 'Orario 12 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_12_30')->textInput(['placeholder' => 'Orario 12 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_12_45')->textInput(['placeholder' => 'Orario 12 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_13_00')->textInput(['placeholder' => 'Orario 13 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_13_15')->textInput(['placeholder' => 'Orario 13 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_13_30')->textInput(['placeholder' => 'Orario 13 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_13_45')->textInput(['placeholder' => 'Orario 13 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_14_00')->textInput(['placeholder' => 'Orario 14 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_14_15')->textInput(['placeholder' => 'Orario 14 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_14_30')->textInput(['placeholder' => 'Orario 14 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_14_45')->textInput(['placeholder' => 'Orario 14 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_15_00')->textInput(['placeholder' => 'Orario 15 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_15_15')->textInput(['placeholder' => 'Orario 15 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_15_30')->textInput(['placeholder' => 'Orario 15 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_15_45')->textInput(['placeholder' => 'Orario 15 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_16_00')->textInput(['placeholder' => 'Orario 16 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_16_15')->textInput(['placeholder' => 'Orario 16 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_16_30')->textInput(['placeholder' => 'Orario 16 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_16_45')->textInput(['placeholder' => 'Orario 16 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_17_00')->textInput(['placeholder' => 'Orario 17 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_17_15')->textInput(['placeholder' => 'Orario 17 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_17_30')->textInput(['placeholder' => 'Orario 17 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_17_45')->textInput(['placeholder' => 'Orario 17 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_18_00')->textInput(['placeholder' => 'Orario 18 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_18_15')->textInput(['placeholder' => 'Orario 18 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_18_30')->textInput(['placeholder' => 'Orario 18 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_18_45')->textInput(['placeholder' => 'Orario 18 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_19_00')->textInput(['placeholder' => 'Orario 19 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_19_15')->textInput(['placeholder' => 'Orario 19 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_19_30')->textInput(['placeholder' => 'Orario 19 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_19_45')->textInput(['placeholder' => 'Orario 19 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_20_00')->textInput(['placeholder' => 'Orario 20 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_20_15')->textInput(['placeholder' => 'Orario 20 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_20_30')->textInput(['placeholder' => 'Orario 20 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_20_45')->textInput(['placeholder' => 'Orario 20 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_21_00')->textInput(['placeholder' => 'Orario 21 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_21_15')->textInput(['placeholder' => 'Orario 21 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_21_30')->textInput(['placeholder' => 'Orario 21 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_21_45')->textInput(['placeholder' => 'Orario 21 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_22_00')->textInput(['placeholder' => 'Orario 22 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_22_15')->textInput(['placeholder' => 'Orario 22 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_22_30')->textInput(['placeholder' => 'Orario 22 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_22_45')->textInput(['placeholder' => 'Orario 22 45']) */ ?>

    <?php /* echo $form->field($model, 'orario_23_00')->textInput(['placeholder' => 'Orario 23 00']) */ ?>

    <?php /* echo $form->field($model, 'orario_23_15')->textInput(['placeholder' => 'Orario 23 15']) */ ?>

    <?php /* echo $form->field($model, 'orario_23_30')->textInput(['placeholder' => 'Orario 23 30']) */ ?>

    <?php /* echo $form->field($model, 'orario_23_45')->textInput(['placeholder' => 'Orario 23 45']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
