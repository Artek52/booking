<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "{{%orario}}".
 *
 * @property integer $id
 * @property integer $risorsa_id
 * @property integer $struttura_id
 * @property string $giorno
 * @property string $inizio_orario
 * @property string $fine_orario
 * @property string $data_inizio
 * @property string $data_fine
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $deleted_at
 * @property integer $lock
 *
 * @property \backend\models\RisorsaSearch $risorsa
 * @property \backend\models\Struttura $struttura
 */
class Orario extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;
    public $scedule;

    public function __construct(){
        parent::__construct();
        if (Yii::$app->id == 'basic') {
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
            'risorsa',
            'struttura'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'struttura_id', 'giorno', 'inizio_orario', 'fine_orario', 'data_inizio', 'data_fine'], 'required'],
            [['risorsa_id', 'struttura_id', 'created_by', 'updated_by', 'deleted_by', 'lock'], 'integer'],
            [['inizio_orario', 'fine_orario', 'data_inizio', 'data_fine', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orario}}';
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
            'struttura_id' => 'Struttura ID',
            'giorno' => 'Giorno',
            'inizio_orario' => 'Inizio Orario',
            'fine_orario' => 'Fine Orario',
            'data_inizio' => 'Data Inizio',
            'data_fine' => 'Data Fine',
            'lock' => 'Lock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRisorsa()
    {
        return $this->hasOne(\backend\models\RisorsaSearch::className(), ['id' => 'risorsa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStruttura()
    {
        return $this->hasOne(\backend\models\Struttura::className(), ['id' => 'struttura_id']);
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
     * @return \backend\models\OrarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \backend\models\OrarioQuery(get_called_class());
        return $query->where(['orario.deleted_by' => 0]);
    }
}
