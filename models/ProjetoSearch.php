<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projeto;

/**
 * ProjetoSearch represents the model behind the search form of `app\models\Projeto`.
 */
class ProjetoSearch extends Projeto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idprojeto'], 'integer'],
            [['nome', 'tema', 'data_projeto', 'justificativa', 'objetivo_geral', 'objetivo_especifico', 'desenvolvimento', 'culminancia', 'avaliacao', 'oberservacao'], 'safe'],
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
        $query = Projeto::find();

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
            'idprojeto' => $this->idprojeto,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'tema', $this->tema])
            ->andFilterWhere(['like', 'data_projeto', $this->data_projeto])
            ->andFilterWhere(['like', 'justificativa', $this->justificativa])
            ->andFilterWhere(['like', 'objetivo_geral', $this->objetivo_geral])
            ->andFilterWhere(['like', 'objetivo_especifico', $this->objetivo_especifico])
            ->andFilterWhere(['like', 'desenvolvimento', $this->desenvolvimento])
            ->andFilterWhere(['like', 'culminancia', $this->culminancia])
            ->andFilterWhere(['like', 'avaliacao', $this->avaliacao])
            ->andFilterWhere(['like', 'oberservacao', $this->oberservacao]);

        return $dataProvider;
    }
}
