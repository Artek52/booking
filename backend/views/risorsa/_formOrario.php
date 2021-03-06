<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Orario */
/* @var $form yii\widgets\ActiveForm */

?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->errorSummary($model); ?>
<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

<div class="row">
  <div class="col-md-2">

    <?= $form->field($model, 'giorno')->dropdownList([
      'lunedi' => 'lunedi',
      'martedi' => 'martedi',
      'mercoledi' => 'mercoledi',
      'giovedi' => 'giovedi',
      'venerdi' => 'venerdi',
      'sabato' => 'sabato',
      'domenica' => 'domenica'
    ]);
    ?>
  </div>

  <div class="col-md-2">
    <?= $form->field($model, 'inizio_orario')->widget(TimePicker::classname(),
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
        ])->label("alle"); ?>
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
          ])->label("Orario in vigore da:"); ?>
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
            ])->label("a:"); ?>
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
