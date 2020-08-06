<?php
use yii\widgets\ListView;
use yii\widgets\DetailView;
?>

<?=
ListView::widget([
    'dataProvider' => $disponibilitaProvider,
    'itemView' => '_disponibilitaDetails'
]);

?>
