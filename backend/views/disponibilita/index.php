<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DisponibilitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Disponibilita';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="disponibilita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Disponibilita', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'risorsa_id',
                'label' => 'Risorsa',
                'value' => function($model){
                    if ($model->risorsa)
                    {return $model->risorsa->id;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Risorsa::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Risorsa', 'id' => 'grid-disponibilita-search-risorsa_id']
            ],
        'data',
        'orario_00_00',
        'orario_00_15',
        'orario_00_30',
        'orario_00_45',
        'orario_01_00',
        'orario_01_15',
        'orario_01_30',
        'orario_01_45',
        'orario_02_00',
        'orario_02_15',
        'orario_02_30',
        'orario_02_45',
        'orario_03_00',
        'orario_03_15',
        'orario_03_30',
        'orario_03_45',
        'orario_04_00',
        'orario_04_15',
        'orario_04_30',
        'orario_04_45',
        'orario_05_00',
        'orario_05_15',
        'orario_05_30',
        'orario_05_45',
        'orario_06_00',
        'orario_06_15',
        'orario_06_30',
        'orario_06_45',
        'orario_07_00',
        'orario_07_15',
        'orario_07_30',
        'orario_07_45',
        'orario_08_00',
        'orario_08_15',
        'orario_08_30',
        'orario_08_45',
        'orario_09_00',
        'orario_09_15',
        'orario_09_30',
        'orario_09_45',
        'orario_10_00',
        'orario_10_15',
        'orario_10_30',
        'orario_10_45',
        'orario_11_00',
        'orario_11_15',
        'orario_11_30',
        'orario_11_45',
        'orario_12_00',
        'orario_12_15',
        'orario_12_30',
        'orario_12_45',
        'orario_13_00',
        'orario_13_15',
        'orario_13_30',
        'orario_13_45',
        'orario_14_00',
        'orario_14_15',
        'orario_14_30',
        'orario_14_45',
        'orario_15_00',
        'orario_15_15',
        'orario_15_30',
        'orario_15_45',
        'orario_16_00',
        'orario_16_15',
        'orario_16_30',
        'orario_16_45',
        'orario_17_00',
        'orario_17_15',
        'orario_17_30',
        'orario_17_45',
        'orario_18_00',
        'orario_18_15',
        'orario_18_30',
        'orario_18_45',
        'orario_19_00',
        'orario_19_15',
        'orario_19_30',
        'orario_19_45',
        'orario_20_00',
        'orario_20_15',
        'orario_20_30',
        'orario_20_45',
        'orario_21_00',
        'orario_21_15',
        'orario_21_30',
        'orario_21_45',
        'orario_22_00',
        'orario_22_15',
        'orario_22_30',
        'orario_22_45',
        'orario_23_00',
        'orario_23_15',
        'orario_23_30',
        'orario_23_45',
        'orario_24_00',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-disponibilita']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
