<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Professor;

/**
 * ProfessorSearch represents the model behind the search form of `app\models\Professor`.
 */
class ProfessorSearch extends Professor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idprofessor'], 'integer'],
            [['nome', 'formacao', 'endereco', 'bairro', 'cidade', 'email', 'turno', 'portaria', 'dataCadastro'], 'safe'],
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
        $query = Professor::find();

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
            'idprofessor' => $this->idprofessor,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'formacao', $this->formacao])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'turno', $this->turno])
            ->andFilterWhere(['like', 'portaria', $this->portaria])
            ->andFilterWhere(['like', 'dataCadastro', $this->dataCadastro]);

        return $dataProvider;
    }
}
