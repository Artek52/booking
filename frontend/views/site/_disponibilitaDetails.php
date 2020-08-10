<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<style>

#checkbox input[type=checkbox]{

}

#checkbox input[type=checkbox]:checked{
    background-color: blue;
}

</style>

<table class="table">
    <thead>
        <tr>
            <?= "<th scope='row'> # </th>" ?>
            <?php $y = count($model);
            for($i = 0; $i<$y; $i++):
                $risorsa = $model[$i]->risorsa;?>
            <?= "<th scope='row'><div class='sticky-top'>".$risorsa['nome']."</div></th>" ?>
            <?php endfor; ?>
        </tr>
    </thead>
    <?php
     $form = ActiveForm::begin([
        'action' => Url::to(['site/crea-prenotazione', 'id' => $id])
     ]);
    ?>
        <?php for ($i=0; $i <=23 ; $i++) :
                foreach (['00', '15', '30', '45'] as $y) :
                $tmp = substr("0" . $i, -2) . ":" . $y;
                $tmp1 = "orario_" . substr('0' . $i, -2) . '_' . $y;
                ?>
          <tbody>
           <tr>

               <?= "<th scope='row'>". $tmp ."</th>" ?>
               <?php foreach ($model as $key => $value) : ?>
               <?php if($model[$key]->$tmp1 ==0)
                    echo "<th>
                    <div class='well' style='background-color: #33ff00' >
                     <input type= 'checkbox' name = $key id = 'check'/>
                     <label for = 'check'>

                    </div></label> </th>";
               else
                    echo "<th> <div class='well' style='background-color: #ff0000'> </th>";
               ?>
               <?php endforeach; ?>
           </tr>
            </tbody>
        <?php endforeach ; ?>
    <?php endfor ; ?>
     <?= Html::submitButton('site', ['model' => $model]) ?>
     <?php $form = ActiveForm::end(); ?>
    </form>
</table>
