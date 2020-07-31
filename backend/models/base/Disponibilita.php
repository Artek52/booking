<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "disponibilita".
 *
 * @property integer $id
 * @property integer $risorsa_id
 * @property string $data
 * @property integer $orario_00_00
 * @property integer $orario_00_15
 * @property integer $orario_00_30
 * @property integer $orario_00_45
 * @property integer $orario_01_00
 * @property integer $orario_01_15
 * @property integer $orario_01_30
 * @property integer $orario_01_45
 * @property integer $orario_02_00
 * @property integer $orario_02_15
 * @property integer $orario_02_30
 * @property integer $orario_02_45
 * @property integer $orario_03_00
 * @property integer $orario_03_15
 * @property integer $orario_03_30
 * @property integer $orario_03_45
 * @property integer $orario_04_00
 * @property integer $orario_04_15
 * @property integer $orario_04_30
 * @property integer $orario_04_45
 * @property integer $orario_05_00
 * @property integer $orario_05_15
 * @property integer $orario_05_30
 * @property integer $orario_05_45
 * @property integer $orario_06_00
 * @property integer $orario_06_15
 * @property integer $orario_06_30
 * @property integer $orario_06_45
 * @property integer $orario_07_00
 * @property integer $orario_07_15
 * @property integer $orario_07_30
 * @property integer $orario_07_45
 * @property integer $orario_08_00
 * @property integer $orario_08_15
 * @property integer $orario_08_30
 * @property integer $orario_08_45
 * @property integer $orario_09_00
 * @property integer $orario_09_15
 * @property integer $orario_09_30
 * @property integer $orario_09_45
 * @property integer $orario_10_00
 * @property integer $orario_10_15
 * @property integer $orario_10_30
 * @property integer $orario_10_45
 * @property integer $orario_11_00
 * @property integer $orario_11_15
 * @property integer $orario_11_30
 * @property integer $orario_11_45
 * @property integer $orario_12_00
 * @property integer $orario_12_15
 * @property integer $orario_12_30
 * @property integer $orario_12_45
 * @property integer $orario_13_00
 * @property integer $orario_13_15
 * @property integer $orario_13_30
 * @property integer $orario_13_45
 * @property integer $orario_14_00
 * @property integer $orario_14_15
 * @property integer $orario_14_30
 * @property integer $orario_14_45
 * @property integer $orario_15_00
 * @property integer $orario_15_15
 * @property integer $orario_15_30
 * @property integer $orario_15_45
 * @property integer $orario_16_00
 * @property integer $orario_16_15
 * @property integer $orario_16_30
 * @property integer $orario_16_45
 * @property integer $orario_17_00
 * @property integer $orario_17_15
 * @property integer $orario_17_30
 * @property integer $orario_17_45
 * @property integer $orario_18_00
 * @property integer $orario_18_15
 * @property integer $orario_18_30
 * @property integer $orario_18_45
 * @property integer $orario_19_00
 * @property integer $orario_19_15
 * @property integer $orario_19_30
 * @property integer $orario_19_45
 * @property integer $orario_20_00
 * @property integer $orario_20_15
 * @property integer $orario_20_30
 * @property integer $orario_20_45
 * @property integer $orario_21_00
 * @property integer $orario_21_15
 * @property integer $orario_21_30
 * @property integer $orario_21_45
 * @property integer $orario_22_00
 * @property integer $orario_22_15
 * @property integer $orario_22_30
 * @property integer $orario_22_45
 * @property integer $orario_23_00
 * @property integer $orario_23_15
 * @property integer $orario_23_30
 * @property integer $orario_23_45
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $deleted_at
 *
 * @property \backend\models\Risorsa $risorsa
 */
class Disponibilita extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
      if (Yii::$app->id == 'basic') {
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => \Yii::$app->user->id,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
    }
  }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'risorsa'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['risorsa_id', 'orario_00_00', 'orario_00_15', 'orario_00_30', 'orario_00_45', 'orario_01_00', 'orario_01_15', 'orario_01_30', 'orario_01_45', 'orario_02_00', 'orario_02_15', 'orario_02_30', 'orario_02_45', 'orario_03_00', 'orario_03_15', 'orario_03_30', 'orario_03_45', 'orario_04_00', 'orario_04_15', 'orario_04_30', 'orario_04_45', 'orario_05_00', 'orario_05_15', 'orario_05_30', 'orario_05_45', 'orario_06_00', 'orario_06_15', 'orario_06_30', 'orario_06_45', 'orario_07_00', 'orario_07_15', 'orario_07_30', 'orario_07_45', 'orario_08_00', 'orario_08_15', 'orario_08_30', 'orario_08_45', 'orario_09_00', 'orario_09_15', 'orario_09_30', 'orario_09_45', 'orario_10_00', 'orario_10_15', 'orario_10_30', 'orario_10_45', 'orario_11_00', 'orario_11_15', 'orario_11_30', 'orario_11_45', 'orario_12_00', 'orario_12_15', 'orario_12_30', 'orario_12_45', 'orario_13_00', 'orario_13_15', 'orario_13_30', 'orario_13_45', 'orario_14_00', 'orario_14_15', 'orario_14_30', 'orario_14_45', 'orario_15_00', 'orario_15_15', 'orario_15_30', 'orario_15_45', 'orario_16_00', 'orario_16_15', 'orario_16_30', 'orario_16_45', 'orario_17_00', 'orario_17_15', 'orario_17_30', 'orario_17_45', 'orario_18_00', 'orario_18_15', 'orario_18_30', 'orario_18_45', 'orario_19_00', 'orario_19_15', 'orario_19_30', 'orario_19_45', 'orario_20_00', 'orario_20_15', 'orario_20_30', 'orario_20_45', 'orario_21_00', 'orario_21_15', 'orario_21_30', 'orario_21_45', 'orario_22_00', 'orario_22_15', 'orario_22_30', 'orario_22_45', 'orario_23_00', 'orario_23_15', 'orario_23_30', 'orario_23_45', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['data', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock','deleted_by'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disponibilita';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'risorsa_id' => 'Risorsa ID',
            'data' => 'Data',
            'orario_00_00' => 'Orario 00 00',
            'orario_00_15' => 'Orario 00 15',
            'orario_00_30' => 'Orario 00 30',
            'orario_00_45' => 'Orario 00 45',
            'orario_01_00' => 'Orario 01 00',
            'orario_01_15' => 'Orario 01 15',
            'orario_01_30' => 'Orario 01 30',
            'orario_01_45' => 'Orario 01 45',
            'orario_02_00' => 'Orario 02 00',
            'orario_02_15' => 'Orario 02 15',
            'orario_02_30' => 'Orario 02 30',
            'orario_02_45' => 'Orario 02 45',
            'orario_03_00' => 'Orario 03 00',
            'orario_03_15' => 'Orario 03 15',
            'orario_03_30' => 'Orario 03 30',
            'orario_03_45' => 'Orario 03 45',
            'orario_04_00' => 'Orario 04 00',
            'orario_04_15' => 'Orario 04 15',
            'orario_04_30' => 'Orario 04 30',
            'orario_04_45' => 'Orario 04 45',
            'orario_05_00' => 'Orario 05 00',
            'orario_05_15' => 'Orario 05 15',
            'orario_05_30' => 'Orario 05 30',
            'orario_05_45' => 'Orario 05 45',
            'orario_06_00' => 'Orario 06 00',
            'orario_06_15' => 'Orario 06 15',
            'orario_06_30' => 'Orario 06 30',
            'orario_06_45' => 'Orario 06 45',
            'orario_07_00' => 'Orario 07 00',
            'orario_07_15' => 'Orario 07 15',
            'orario_07_30' => 'Orario 07 30',
            'orario_07_45' => 'Orario 07 45',
            'orario_08_00' => 'Orario 08 00',
            'orario_08_15' => 'Orario 08 15',
            'orario_08_30' => 'Orario 08 30',
            'orario_08_45' => 'Orario 08 45',
            'orario_09_00' => 'Orario 09 00',
            'orario_09_15' => 'Orario 09 15',
            'orario_09_30' => 'Orario 09 30',
            'orario_09_45' => 'Orario 09 45',
            'orario_10_00' => 'Orario 10 00',
            'orario_10_15' => 'Orario 10 15',
            'orario_10_30' => 'Orario 10 30',
            'orario_10_45' => 'Orario 10 45',
            'orario_11_00' => 'Orario 11 00',
            'orario_11_15' => 'Orario 11 15',
            'orario_11_30' => 'Orario 11 30',
            'orario_11_45' => 'Orario 11 45',
            'orario_12_00' => 'Orario 12 00',
            'orario_12_15' => 'Orario 12 15',
            'orario_12_30' => 'Orario 12 30',
            'orario_12_45' => 'Orario 12 45',
            'orario_13_00' => 'Orario 13 00',
            'orario_13_15' => 'Orario 13 15',
            'orario_13_30' => 'Orario 13 30',
            'orario_13_45' => 'Orario 13 45',
            'orario_14_00' => 'Orario 14 00',
            'orario_14_15' => 'Orario 14 15',
            'orario_14_30' => 'Orario 14 30',
            'orario_14_45' => 'Orario 14 45',
            'orario_15_00' => 'Orario 15 00',
            'orario_15_15' => 'Orario 15 15',
            'orario_15_30' => 'Orario 15 30',
            'orario_15_45' => 'Orario 15 45',
            'orario_16_00' => 'Orario 16 00',
            'orario_16_15' => 'Orario 16 15',
            'orario_16_30' => 'Orario 16 30',
            'orario_16_45' => 'Orario 16 45',
            'orario_17_00' => 'Orario 17 00',
            'orario_17_15' => 'Orario 17 15',
            'orario_17_30' => 'Orario 17 30',
            'orario_17_45' => 'Orario 17 45',
            'orario_18_00' => 'Orario 18 00',
            'orario_18_15' => 'Orario 18 15',
            'orario_18_30' => 'Orario 18 30',
            'orario_18_45' => 'Orario 18 45',
            'orario_19_00' => 'Orario 19 00',
            'orario_19_15' => 'Orario 19 15',
            'orario_19_30' => 'Orario 19 30',
            'orario_19_45' => 'Orario 19 45',
            'orario_20_00' => 'Orario 20 00',
            'orario_20_15' => 'Orario 20 15',
            'orario_20_30' => 'Orario 20 30',
            'orario_20_45' => 'Orario 20 45',
            'orario_21_00' => 'Orario 21 00',
            'orario_21_15' => 'Orario 21 15',
            'orario_21_30' => 'Orario 21 30',
            'orario_21_45' => 'Orario 21 45',
            'orario_22_00' => 'Orario 22 00',
            'orario_22_15' => 'Orario 22 15',
            'orario_22_30' => 'Orario 22 30',
            'orario_22_45' => 'Orario 22 45',
            'orario_23_00' => 'Orario 23 00',
            'orario_23_15' => 'Orario 23 15',
            'orario_23_30' => 'Orario 23 30',
            'orario_23_45' => 'Orario 23 45',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRisorsa()
    {
        return $this->hasOne(\backend\models\Risorsa::className(), ['id' => 'risorsa_id']);
    }

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->where(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->where('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return \common\models\DisponibilitaQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \common\models\DisponibilitaQuery(get_called_class());
        return $query->where(['disponibilita.deleted_by' => 0]);
    }
}
