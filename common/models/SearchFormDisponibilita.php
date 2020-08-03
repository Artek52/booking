<?php

namespace backend\controllers;

class SearchFormDisponibilita extends Model{
    public $risorsa_id;
    public $data;
    public $data_inizio;
    public $data_fine;

    public function rules(){
        return[
            [['risorsaId','data','data_inizio','data_fine'],'required']
        ];
    }
}
