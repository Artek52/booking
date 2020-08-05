<?php
use yii\widgets\ListView;
use yii\widgets\DetailView;
?>

<?= DetailView::widget([
  'model' => $model,
  'attributes' => [
    'data1',
  ],
]);
?>

<?=
ListView::widget([
    'dataProvider' => $disponibilitaProvider,
    'itemView' => '_orariDetails'
]);
?>
