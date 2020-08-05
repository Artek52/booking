<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <table border="2px">
        <tr>
            <h2><?= Html::encode($model->giorno) ?></h2>
        </tr>
        <tr>
            <th>Data inizio</th><th>Data fine</th><th>Inizio orario</th><th>Fine orario</th>
        </tr>
        <tr>
            <td><h4><?= Html::encode($model->data_inizio) ?></h4></td>
            <td><h4><?= Html::encode($model->data_fine) ?></h4></td>
            <td><h4><?= Html::encode($model->inizio_orario) ?></h4></td>
            <td><h4><?= Html::encode($model->fine_orario) ?></h4></td>
        </tr>
    </table>


    <?= Html::a('<b>visualizza</b>', ['detail-risorse', 'id' => $model->id])?>
</div>
