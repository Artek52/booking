<?php
use yii\widgets\ListView;
use yii\widgets\DetailView;
?>

<?php
 // DetailView::widget([
 //   'model' => $model,
 //   // 'attributes' => [
 //   //   'data',
 //   // ],
 // ]);
 // foreach ($model->y as $y) {
 //}
?>


<?=
ListView::widget([
    'dataProvider' => $disponibilitaProvider,
    'itemView' => '_disponibilitaDetails'
]);


?>
