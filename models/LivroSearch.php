<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Livro;

/**
 * LivroSearch represents the model behind the search form of `app\models\Livro`.
 */
class LivroSearch extends Livro
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idlivro', 'ano', 'status'], 'integer'],
            [['titulo', 'resumo', 'observação', 'autor_id', 'editora_id', 'classificacao_id'], 'safe'],
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
        $query = Livro::find();

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

        $query->joinWith('autor');
        $query->joinWith('classificacao');
         $query->joinWith('editora');

        // grid filtering conditions
        $query->andFilterWhere([
            'idlivro' => $this->idlivro,
            'ano' => $this->ano,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'resumo', $this->resumo])
            ->andFilterWhere(['like', 'observação', $this->observação])
            ->andFilterWhere(['like', 'autor.nome', $this->autor_id])
            ->andFilterWhere(['like', 'editora.nome', $this->editora_id])
            ->andFilterWhere(['like', 'classificacao.classificacao', $this->classificacao_id]);

        return $dataProvider;
    }
}
