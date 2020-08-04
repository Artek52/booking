<?php

namespace common\models;

use yii\base\Model;

class SearchFormPrenotazione extends Model{
    public $risorsa_id;
    public $data_corrente;
    public $data_inizio;
    public $data_fine;

    public function rules(){
        return[
            [['risorsaId','data_corrente','data_inizio','data_fine'],'required']
        ];
    }
}
