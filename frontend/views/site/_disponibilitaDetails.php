<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>


    <table class="table">


        <thead>
            <tr>
             <?= "<th scope='row'> # </th>" ?>
             <?= "<th scope='row'> risorsa1 </th>" ?>
             <?= "<th scope='row'> risorsa2 </th>" ?>
            </tr>
         </thead>
          <?php for ($i=0; $i <=23 ; $i++) :
              foreach (['00', '15', '30', '45'] as $y) :
              $tmp = substr("0" . $i, -2) . ":" . $y; ?>
  <tbody>
   <tr>
       <?= "<th scope='row'> $tmp </th>" ?>
   </tr>
    </tbody>
<?php endforeach ; ?>
<?php endfor ; ?>
</table>
