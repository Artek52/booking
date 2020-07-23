<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Struttura */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Struttura', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struttura-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Struttura'.' '. Html::encode($this->title) ?></h2>
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
        'nome',
        'indirizzo',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>

    <div class="row">
<?php
if($providerRisorsa->totalCount){
    $gridColumnRisorsa = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'nome',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerRisorsa,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-risorsa']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Risorsa'),
        ],
        'export' => false,
        'columns' => $gridColumnRisorsa
    ]);
}
?>

    </div>
</div>
