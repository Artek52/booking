<?php

namespace console\controllers;

use backend\models\Orario;
use backend\models\Prenotazione;
use backend\models\Risorsa;
use backend\models\Struttura;
use yii\console\Controller;
use yii\helpers\Console;


class PopulateController extends Controller {

    public function actionPopulate() {

        $faker = \Faker\Factory::create();
        for($i = 0 ; $i < 50 ; $i++)
        {
            $modelStruttura = new Struttura();
            $modelStruttura->nome = $faker->company;
            $modelStruttura->indirizzo = $faker->address;
            $modelStruttura->save();
            echo $i;
        }

        for($i=0 ; $i<50 ; $i++){
            $modelRisorsa = new Risorsa();
            $modelRisorsa->nome = $faker->name;
            $modelRisorsa->struttura_id = rand(1,50);
            $modelRisorsa->save();
            echo $i;
        }

        for($i=0 ; $i<50 ; $i++ ){
        $modelOrario = new Orario();
        $modelOrario->risorsa_id = rand(1,50);
        $modelOrario->struttura_id = rand(1,50);
        $modelOrario->giorno = rand(1,7);
        $modelOrario->inizio_orario = $faker->time("H:i",);
        $modelOrario->fine_orario = $faker->time("H:i");
        $modelOrario->data_inizio = $faker->date("Y-m-d",);
        $modelOrario->data_fine = $faker->date("Y-m-d");
        $modelOrario->save();
        echo $i;
        }

        for($i=0 ; $i<50 ; $i++ ){
            $modelPrenotazione = new Prenotazione();
            $modelPrenotazione->risorsa_id = rand(1,50);
            $modelPrenotazione->user_id = 1;
            $modelPrenotazione->data_inizio = $faker->date("Y-m-d");
            $modelPrenotazione->data_fine = $faker->date("Y-m-d");
            $modelPrenotazione->save();
            echo $i;
        }

    }
}
