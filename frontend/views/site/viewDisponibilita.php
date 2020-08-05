<?php
use yii\widgets\ListView;
use yii\widgets\DetailView;
?>

<?=
 // DetailView::widget([
 //   'model' => $model,
 //   // 'attributes' => [
 //   //   'data',
 //   // ],
 // ]);
 foreach ($model->y as $y) {
     echo $model->data;
 }
?>


<?=
ListView::widget([
    'dataProvider' => $disponibilitaProvider,
    'itemView' => '_disponibilitaDetails'
]);
?>
