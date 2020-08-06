<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use backend\models\Struttura;
use backend\models\Risorsa;

use yii\widgets\ListView;
use yii\widgets\DetailView;

$this->title = 'Risorse';

?>

<?=''
 // ListView::widget([
 //          'strutturaProvider' => $strutturaProvider,
 //          'itemView' => '_writeStrutturaDetails.php',
 //           ]);
?>

<?= DetailView::widget([
  'model' => $model,
  'attributes' => [
    'nome',
    'indirizzo',
  ],
]);
?>

<?= ListView::widget([
    'dataProvider' => $risorsaProvider,
    'itemView' => '_writeRisorsaDetails.php',
]);
?>
