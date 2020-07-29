<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;



class InitController extends Controller
{
    public function actionAll()
    {
        $faker = \Faker\Factory::create();
        $struttura = new \backend\models\Struttura();
        $risorsa = new \backend\models\Risorsa();

        for ( $i = 1; $i <= 20; $i++ )
        {
            $struttura->setIsNewRecord(true);
            $struttura->id = null;
            $struttura->indirizzo = $faker->address;
            $struttura->nome = $faker->company;
            $struttura->created_by = 1;
            $struttura->save();
            echo "sto creando la struttura: ". $struttura->nome . "\n";
            for ($j=0; $j <mt_rand(1,100) ; $j++) {
                $risorsa->setIsNewRecord(true);
                $risorsa->id = null;
                $risorsa->struttura_id = $struttura->id;
                $risorsa->nome = $faker->company;
                $risorsa->created_by = 1;
                $risorsa->save();
                echo "--sto creando la risorsa ". $j."\n";
            }

        }

    }
}
?>
