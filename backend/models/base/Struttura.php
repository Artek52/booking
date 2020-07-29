<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "{{%struttura}}".
 *
 * @property integer $id
 * @property string $nome
 * @property string $indirizzo
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $deleted_at
 * @property integer $lock
 *
 * @property \backend\models\Risorsa[] $risorsas
 */
class Struttura extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

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
            'risorse',
            'orari'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'indirizzo'] , 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by', 'lock'], 'integer'],
            // [['nome', 'indirizzo'], 'string', 'max' => 255],
            [['lock','deleted_by'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%struttura}}';
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
            'nome' => 'Nome',
            'indirizzo' => 'Indirizzo',
            'lock' => 'Lock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRisorse()
    {
        return $this->hasMany(\backend\models\Risorsa::className(), ['struttura_id' => 'id']);
    }


    public function getOrari()
    {
        return $this->hasMany(\backend\models\Orario::className(), ['struttura_id' => 'id']);
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
     * @return \backend\models\StrutturaQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \backend\models\StrutturaQuery(get_called_class());
        return $query->where(['struttura.deleted_by' => 0]);
    }
}
