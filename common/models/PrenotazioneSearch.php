<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Prenotazione;

/**
 * common\models\PrenotazioneSearch represents the model behind the search form about `common\models\Prenotazione`.
 */
 class PrenotazioneSearch extends Prenotazione
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'risorsa_id', 'user_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['data_inizio', 'data_fine', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Prenotazione::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'risorsa_id' => $this->risorsa_id,
            'user_id' => $this->user_id,
            'data_inizio' => $this->data_inizio,
            'data_fine' => $this->data_fine,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'deleted_at' => $this->deleted_at,
        ]);

        return $dataProvider;
    }
}
