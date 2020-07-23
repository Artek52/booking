<?php

namespace backend\models;

use Yii;
use \backend\models\base\Prenotazione as BasePrenotazione;

/**
 * This is the model class for table "prenotazione".
 */
class Prenotazione extends BasePrenotazione
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['risorsa_id', 'user_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['data_inizio', 'data_fine', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
