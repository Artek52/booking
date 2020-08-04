<?php

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Cerca Strutture</h1>

        <p class="lead">digita struttura</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Invia</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
              <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_post',
                         ]);
              ?>

            </div>
        </div>

    </div>
</div>
