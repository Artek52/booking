<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Prenotazione]].
 *
 * @see Prenotazione
 */
class PrenotazioneQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Prenotazione[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Prenotazione|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
