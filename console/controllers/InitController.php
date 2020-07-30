<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;



class InitController extends Controller
{
    public function actionAll()
    {
        $faker = \Faker\Factory::create('it_IT');
        $struttura = new \backend\models\Struttura();
        $risorsa = new \backend\models\Risorsa();
        $orario = new \backend\models\Orario();
        $disponibilita = new \backend\models\Disponibilita();

        //creazione struttura
        for ( $i = 1; $i <= 20; $i++ )
        {
            $struttura->setIsNewRecord(true);
            $struttura->id = null;
            $struttura->indirizzo = $faker->address;
            $struttura->nome = $faker->company;
            $struttura->created_by = 1;
            $struttura->save();
            echo "sto creando la struttura: ". $struttura->nome . "\n";

            //creazione risorsa
            for ($j=0; $j<mt_rand(1,100); $j++) {
                $risorsa->setIsNewRecord(true);
                $risorsa->id = null;
                $risorsa->struttura_id = $struttura->id;
                $risorsa->nome = $faker->company;
                $risorsa->created_by = 1;
                $risorsa->save();
                echo "--sto creando la risorsa ". $j."\n";

              //creazione orario e data per risorsa
              for ($k=0; $k <10; $k++) {
                $orario->setIsNewRecord(true);
                $orario->id = null;
                $orario->risorsa_id = $risorsa->id;
                $orario->struttura_id = $struttura->id;
                $orario->giorno = $faker->dayOfWeek;

                $data1=$faker->date("Y-m-d");
                $data2=$faker->date("Y-m-d");
                if($data1<$data2){
                  $orario->data_inizio = $data1;
                  $orario->data_fine = $data2;
                }
                else{
                  $orario->data_inizio = $data2;
                  $orario->data_fine = $data1;
                }
                $orario1=$faker->time($format = 'H:i');
                $orario2=$faker->time($format = 'H:i');
                if($orario1<$orario2){
                  $orario->inizio_orario = $orario1;
                  $orario->fine_orario = $orario2;
                }
                else{
                  $orario->inizio_orario = $orario2;
                  $orario->fine_orario = $orario1;
                }
                $orario->created_by = 1;

                //controllo conflitto data e orario
                $modelOrario = new \backend\models\Orario();
                $modelOrario->struttura_id = $orario->struttura_id;
                $modelOrario->risorsa_id = $risorsa->id;

                if( ! $this->isOrarioInConflitto($modelOrario))
                {
                echo "------sto creando orario ". $k."\n";
                echo $orario->data_inizio;
                echo $orario->data_fine;
                $data = \DateTime::createFromFormat ('Y-m-d', $orario->data_inizio);
                $dataFine = \DateTime::createFromFormat ('Y-m-d', $orario->data_fine);

                $ora_inizio = (integer) str_replace(":", "", $orario->inizio_orario);
                $ora_fine = (integer) str_replace(":", "", $orario->fine_orario);
                echo $ora_inizio;
                echo $ora_fine;

                    //creazione disponibilita
                    while ($data->diff($dataFine)->format('%r%a') > 0) {
                      $disponibilita->setIsNewRecord(true);
                      $disponibilita->id = null;
                      $disponibilita->risorsa_id = $risorsa->id;
                      $disponibilita->data = $data->format("Y-m-d");

                      for ($l=0; $l<=23 ; $l++) {
                          foreach (['00', '15', '30', '45'] as $y) {
                              $field = 'orario_' . substr('0' . $l, -2) . '_' . $y;
                              $tmp = substr("0" . $l, -2) . ":" . $y;
                              $ora_attuale = (integer) str_replace(":", "", $tmp);
                              if(($ora_inizio<$ora_attuale)&&($ora_attuale<$ora_fine))
                                  $disponibilita->$field = mt_rand(0,1);
                              else
                                  $disponibilita->$field = -1;
                          }
                      }
                      $orario->save();
                      $disponibilita->save();
                    echo "---------sto creando disponibilita " . $l . "\n";
                    $data->add(new \DateInterval('P7D'));
                   }
                  }
                }

              }
            }
        }


        private function isOrarioInConflitto($orario) {

            $conflitti= \backend\models\Orario::find()
                ->andWhere(['giorno' => $orario->giorno])
                ->andWhere(['struttura_id' => $orario->struttura_id])
                ->andWhere(['risorsa_id' => $orario->risorsa_id])
                ->andWhere(['OR',
                    ['AND',
                      ['>=','data_inizio',$orario->data_inizio],
                      ['<=','data_inizio',$orario->data_fine]
                    ],
                    ['AND',
                      ['>=','data_fine',$orario->data_inizio],
                      ['<=','data_fine',$orario->data_fine]
                    ],
                    ['AND',
                      ['>=','data_inizio',$orario->data_inizio],
                      ['<=','data_fine',$orario->data_fine]
                    ],
                    ['AND',
                      ['<=','data_inizio',$orario->data_inizio],
                      ['>=','data_fine',$orario->data_fine]
                    ],
                  ])
                    ->andWhere(['OR',
                    ['AND',
                      ['>=','inizio_orario',$orario->inizio_orario],
                      ['<=','inizio_orario',$orario->fine_orario]
                    ],
                    ['AND',
                      ['>=','fine_orario',$orario->inizio_orario],
                      ['<=','fine_orario',$orario->fine_orario]
                    ],
                    ['AND',
                      ['>=','inizio_orario',$orario->inizio_orario],
                      ['<=','fine_orario',$orario->fine_orario]
                    ],
                    ['AND',
                      ['<=','inizio_orario',$orario->inizio_orario],
                      ['>=','fine_orario',$orario->fine_orario]
                    ],
                  ]);

            if ($orario->risorsa_id!=null)
                $conflitti->andWhere(['risorsa_id'=>$orario->risorsa_id]);

            if ($orario->id!=null)
                $conflitti->andWhere(['<>','id',$orario->id]);


            if ($conflitti->count() >0)
                return true;

            return false;
        }



    }
?>
