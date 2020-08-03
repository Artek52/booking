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
        <div class="clo-md-12">
          <?= $this->render('_formCheck', [
              'modelStruttura' => $model,
              'model' => $modelOrario,
          ]) ?>
        </div>
      </div>

</div>
