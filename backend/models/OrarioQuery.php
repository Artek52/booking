<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Orario]].
 *
 * @see Orario
 */
class OrarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Orario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Orario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
