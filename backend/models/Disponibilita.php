<?php

namespace backend\models;

use Yii;
use \backend\models\base\Disponibilita as BaseDisponibilita;

/**
 * This is the model class for table "disponibilita".
 */
class Disponibilita extends BaseDisponibilita
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['risorsa_id', 'orario_00_00', 'orario_00_15', 'orario_00_30', 'orario_00_45', 'orario_01_00', 'orario_01_15', 'orario_01_30', 'orario_01_45', 'orario_02_00', 'orario_02_15', 'orario_02_30', 'orario_02_45', 'orario_03_00', 'orario_03_15', 'orario_03_30', 'orario_03_45', 'orario_04_00', 'orario_04_15', 'orario_04_30', 'orario_04_45', 'orario_05_00', 'orario_05_15', 'orario_05_30', 'orario_05_45', 'orario_06_00', 'orario_06_15', 'orario_06_30', 'orario_06_45', 'orario_07_00', 'orario_07_15', 'orario_07_30', 'orario_07_45', 'orario_08_00', 'orario_08_15', 'orario_08_30', 'orario_08_45', 'orario_09_00', 'orario_09_15', 'orario_09_30', 'orario_09_45', 'orario_10_00', 'orario_10_15', 'orario_10_30', 'orario_10_45', 'orario_11_00', 'orario_11_15', 'orario_11_30', 'orario_11_45', 'orario_12_00', 'orario_12_15', 'orario_12_30', 'orario_12_45', 'orario_13_00', 'orario_13_15', 'orario_13_30', 'orario_13_45', 'orario_14_00', 'orario_14_15', 'orario_14_30', 'orario_14_45', 'orario_15_00', 'orario_15_15', 'orario_15_30', 'orario_15_45', 'orario_16_00', 'orario_16_15', 'orario_16_30', 'orario_16_45', 'orario_17_00', 'orario_17_15', 'orario_17_30', 'orario_17_45', 'orario_18_00', 'orario_18_15', 'orario_18_30', 'orario_18_45', 'orario_19_00', 'orario_19_15', 'orario_19_30', 'orario_19_45', 'orario_20_00', 'orario_20_15', 'orario_20_30', 'orario_20_45', 'orario_21_00', 'orario_21_15', 'orario_21_30', 'orario_21_45', 'orario_22_00', 'orario_22_15', 'orario_22_30', 'orario_22_45', 'orario_23_00', 'orario_23_15', 'orario_23_30', 'orario_23_45', 'orario_24_00', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['data', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
