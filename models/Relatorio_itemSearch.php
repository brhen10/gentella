<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Relatorio_item;

/**
 * Relatorio_itemSearch represents the model behind the search form of `app\models\Relatorio_item`.
 */
class Relatorio_itemSearch extends Relatorio_item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrelatorio_item', 'relatorio_id'], 'integer'],
            [['relatorio', 'tipo_relatorio'], 'safe'],
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
        $query = Relatorio_item::find();

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
            'idrelatorio_item' => $this->idrelatorio_item,
            'relatorio_id' => $this->relatorio_id,
        ]);

        $query->andFilterWhere(['like', 'relatorio', $this->relatorio])
            ->andFilterWhere(['like', 'tipo_relatorio', $this->tipo_relatorio]);

        return $dataProvider;
    }
}
