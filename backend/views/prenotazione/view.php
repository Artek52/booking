<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Prenotazione */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prenotazione', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prenotazione-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Prenotazione'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'risorsa.id',
            'label' => 'Risorsa',
        ],
        [
            'attribute' => 'user.username',
            'label' => 'User',
        ],
        'data_inizio',
        'data_fine',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Risorsa<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php
    $gridColumnRisorsa = [
        ['attribute' => 'id', 'visible' => false],
        'struttura_id',
        'nome',
    ];
    echo DetailView::widget([
        'model' => $model->risorsa,
        'attributes' => $gridColumnRisorsa    ]);
    ?>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email',
        'status',
        'verification_token',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
</div>
