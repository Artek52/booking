<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\RisorsaSearch */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Risorsa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risorsa-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?=  'Risorsa'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">

            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'struttura.nome',
            'label' => 'Struttura',
        ],
        'nome',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>

    <div class="row">
      <div class="clo-md-12">
        <?= $this->render('_formOrario', [
            'modelStruttura' => $model,
            'model' => $modelOrario,
        ]) ?>
      </div>
    </div>

    <div class="row">
      <div class="clo-md-1">
    <?php
    $gridColumnOrario = [
        ['attribute' => 'id', 'visible' => false],
        'giorno',
        'inizio_orario',
        'fine_orario',
        'data_inizio',
        'data_fine',
    ];

    echo GridView::widget([
        'dataProvider' => $providerOrario,
        'columns' => $gridColumnOrario,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-orario']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
    ]);
    ?>
      </div>
  </div>

    <div class="row">
<?php
// if($providerDisponibilita->totalCount){
//     $gridColumnDisponibilita = [
//         ['class' => 'yii\grid\SerialColumn'],
//             ['attribute' => 'id', 'visible' => false],
//                         'data',
//             'orario_00_00',
//             'orario_00_15',
//             'orario_00_30',
//             'orario_00_45',
//             'orario_01_00',
//             'orario_01_15',
//             'orario_01_30',
//             'orario_01_45',
//             'orario_02_00',
//             'orario_02_15',
//             'orario_02_30',
//             'orario_02_45',
//             'orario_03_00',
//             'orario_03_15',
//             'orario_03_30',
//             'orario_03_45',
//             'orario_04_00',
//             'orario_04_15',
//             'orario_04_30',
//             'orario_04_45',
//             'orario_05_00',
//             'orario_05_15',
//             'orario_05_30',
//             'orario_05_45',
//             'orario_06_00',
//             'orario_06_15',
//             'orario_06_30',
//             'orario_06_45',
//             'orario_07_00',
//             'orario_07_15',
//             'orario_07_30',
//             'orario_07_45',
//             'orario_08_00',
//             'orario_08_15',
//             'orario_08_30',
//             'orario_08_45',
//             'orario_09_00',
//             'orario_09_15',
//             'orario_09_30',
//             'orario_09_45',
//             'orario_10_00',
//             'orario_10_15',
//             'orario_10_30',
//             'orario_10_45',
//             'orario_11_00',
//             'orario_11_15',
//             'orario_11_30',
//             'orario_11_45',
//             'orario_12_00',
//             'orario_12_15',
//             'orario_12_30',
//             'orario_12_45',
//             'orario_13_00',
//             'orario_13_15',
//             'orario_13_30',
//             'orario_13_45',
//             'orario_14_00',
//             'orario_14_15',
//             'orario_14_30',
//             'orario_14_45',
//             'orario_15_00',
//             'orario_15_15',
//             'orario_15_30',
//             'orario_15_45',
//             'orario_16_00',
//             'orario_16_15',
//             'orario_16_30',
//             'orario_16_45',
//             'orario_17_00',
//             'orario_17_15',
//             'orario_17_30',
//             'orario_17_45',
//             'orario_18_00',
//             'orario_18_15',
//             'orario_18_30',
//             'orario_18_45',
//             'orario_19_00',
//             'orario_19_15',
//             'orario_19_30',
//             'orario_19_45',
//             'orario_20_00',
//             'orario_20_15',
//             'orario_20_30',
//             'orario_20_45',
//             'orario_21_00',
//             'orario_21_15',
//             'orario_21_30',
//             'orario_21_45',
//             'orario_22_00',
//             'orario_22_15',
//             'orario_22_30',
//             'orario_22_45',
//             'orario_23_00',
//             'orario_23_15',
//             'orario_23_30',
//             'orario_23_45',
//             'orario_24_00',
//     ];
//     echo Gridview::widget([
//         'dataProvider' => $providerDisponibilita,
//         'pjax' => true,
//         'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-disponibilita']],
//         'panel' => [
//             'type' => GridView::TYPE_PRIMARY,
//             'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Disponibilita'),
//         ],
//         'export' => false,
//         'columns' => $gridColumnDisponibilita
//     ]);
// }
// ?>

      </div>

      <div class="row">
        <?php
// if($providerPrenotazione->totalCount){
//     $gridColumnPrenotazione = [
//         ['class' => 'yii\grid\SerialColumn'],
//             ['attribute' => 'id', 'visible' => false],
//                         [
//                 'attribute' => 'user.username',
//                 'label' => 'User'
//             ],
//             'data_inizio',
//             'data_fine',
//     ];
//     echo Gridview::widget([
//         'dataProvider' => $providerPrenotazione,
//         'pjax' => true,
//         'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prenotazione']],
//         'panel' => [
//             'type' => GridView::TYPE_PRIMARY,
//             'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Prenotazione'),
//         ],
//         'export' => false,
//         'columns' => $gridColumnPrenotazione
//     ]);
// }
?>

    </div>

</div>
