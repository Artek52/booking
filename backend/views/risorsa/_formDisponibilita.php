<div class="form-group" id="add-disponibilita">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Disponibilita',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'data' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Data',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'orario_00_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_00_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_00_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_00_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_01_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_01_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_01_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_01_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_02_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_02_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_02_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_02_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_03_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_03_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_03_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_03_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_04_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_04_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_04_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_04_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_05_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_05_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_05_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_05_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_06_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_06_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_06_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_06_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_07_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_07_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_07_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_07_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_08_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_08_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_08_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_08_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_09_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_09_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_09_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_09_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_10_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_10_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_10_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_10_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_11_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_11_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_11_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_11_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_12_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_12_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_12_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_12_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_13_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_13_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_13_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_13_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_14_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_14_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_14_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_14_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_15_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_15_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_15_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_15_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_16_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_16_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_16_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_16_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_17_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_17_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_17_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_17_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_18_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_18_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_18_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_18_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_19_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_19_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_19_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_19_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_20_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_20_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_20_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_20_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_21_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_21_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_21_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_21_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_22_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_22_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_22_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_22_45' => ['type' => TabularForm::INPUT_TEXT],
        'orario_23_00' => ['type' => TabularForm::INPUT_TEXT],
        'orario_23_15' => ['type' => TabularForm::INPUT_TEXT],
        'orario_23_30' => ['type' => TabularForm::INPUT_TEXT],
        'orario_23_45' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowDisponibilita(' . $key . '); return false;', 'id' => 'disponibilita-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Disponibilita', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowDisponibilita()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>
