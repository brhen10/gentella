<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Turma;

/**
 * TurmaSearch represents the model behind the search form about `app\models\Turma`.
 */
class TurmaSearch extends Turma
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idturma'], 'integer'],
            [['serie', 'nome', 'observacao'], 'safe'],
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
        $query = Turma::find();

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
            'idturma' => $this->idturma,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'observacao', $this->observacao]);

        return $dataProvider;
    }
}
