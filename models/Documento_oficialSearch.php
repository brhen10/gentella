<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Documento_oficial;

/**
 * Documento_oficialSearch represents the model behind the search form of `app\models\Documento_oficial`.
 */
class Documento_oficialSearch extends Documento_oficial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddocumento_oficial', 'numero'], 'integer'],
            [['destino', 'data', 'descrição', 'documento_oficial', 'pessoa_destino', 'tipo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Documento_oficial::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'iddocumento_oficial' => $this->iddocumento_oficial,
            'numero' => $this->numero,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'destino', $this->destino])
            ->andFilterWhere(['like', 'descrição', $this->descrição])
            ->andFilterWhere(['like', 'documento_oficial', $this->documento_oficial])
            ->andFilterWhere(['like', 'pessoa_destino', $this->pessoa_destino])
            ->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
