<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Struttura]].
 *
 * @see Struttura
 */
class StrutturaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Struttura[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Struttura|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
