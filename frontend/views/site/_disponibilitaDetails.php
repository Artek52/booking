<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="post">

    <h2><?php
    echo "<table>";
    foreach ($model as $key => $value) {
        echo "
            <tr>
            <td>" .$key."</td>

            <td>" .$value."</td>
            </tr>";

    }
    echo "</table";
     // Html::encode($model['data'])
     ?> </h2>

</div>
