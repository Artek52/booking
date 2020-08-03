<?php

namespace common\models;

use yii\base\Model;

class SearchForm extends Model{
    public $risorsa_id;
    public $data;
    public $inizio_orario;
    public $fine_orario;

    public function rules(){
        return[
            [['risorsaId','data','inizio_orario','fine_orario'],'required']
        ];
    }
}
