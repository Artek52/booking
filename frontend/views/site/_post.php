<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h2><?= Html::encode($model->nome) ?></h2>

    <?= HtmlPurifier::process($model->indirizzo) ?>

    <?= Html::a('<b>visualizza</b>', ['detail-struttura', 'id' => $model->id]) ?>

</div>
