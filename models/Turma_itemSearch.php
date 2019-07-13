<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Turma_item;

/**
 * Turma_itemSearch represents the model behind the search form of `app\models\Turma_item`.
 */
class Turma_itemSearch extends Turma_item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idturma_item', 'aluno_id', 'turma_id'], 'integer'],
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
        $query = Turma_item::find();

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
            'idturma_item' => $this->idturma_item,
            'aluno_id' => $this->aluno_id,
            'turma_id' => $this->turma_id,
        ]);

        return $dataProvider;
    }
}
