<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<!-- <div class="post">
    <h2>Disp</h2>
    <div class="row">
        <?php ''//foreach ($model as $key => $value) : ?>
            <?php''// if ('id' != $key) : ?>
                <div class='col-lg-2'>
                    <div class='well' style="background-color: <?= ''//($value ? '#33ff00' : '#ff0000') ?>">
                        <p><?='' //str_replace('_', ':', str_replace('orario_', '', $key)) ?></p>
                        <p><?=''// ($value ? 'X' : '-') ?></p>
                    </div>
                </div>
            <?php'' //endif ; ?>
        <?php''// endforeach ; ?>
    </div>
</div> -->


<div class="row">
    <table class="table">
        <?php for ($i=0; $i <=23 ; $i++) : ?>
            <?php foreach (['00', '15', '30', '45'] as $y) : ?>
                <?= $tmp = substr("0" . $i, -2) . ":" . $y; ?>
  <tbody>
   <tr>
     <th scope="row"> <?= $tmp ?> </th>
     <td>Mark</td>
     <td>Otto</td>
     <td>@mdo</td>
   </tr>
 </tbody>
</table>


            <div class="col-lg-2">

            </div>
        <?php endforeach ; ?>
        <?php endfor ; ?>
    </div>
