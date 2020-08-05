<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h2><?= Html::encode($model->nome) ?></h2>

    <?= Html::a('<b>visualizza Orari</b>', ['detail-risorse', 'id' => $model->id]) ?>
    <?= Html::a('<b>controlla disponibilita</b>', ['detail-disponibilita', 'id' => $model->id]) ?>
</div>
