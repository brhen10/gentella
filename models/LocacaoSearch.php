<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Locacao;

/**
 * LocacaoSearch represents the model behind the search form of `app\models\Locacao`.
 */
class LocacaoSearch extends Locacao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idlocacao'], 'integer'],
            [['datahoraDevolucao', 'observacao', 'aluno_id', 'livro_id', 'reserva_id'], 'safe'],
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
        $query = Locacao::find();

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

        $query->joinWith('aluno');
        $query->joinWith('livro');
        $query->joinWith('reserva');

        // grid filtering conditions
        $query->andFilterWhere([
            'idlocacao' => $this->idlocacao,
            'datahoraDevolucao' => $this->datahoraDevolucao,
        ]);

        $query->andFilterWhere(['like', 'observacao', $this->observacao])
        ->andFilterWhere(['like', 'aluno.nome', $this->aluno_id])
        ->andFilterWhere(['like', 'livro.titulo', $this->livro_id])
        ->andFilterWhere(['like', 'aluno.nome', $this->reserva_id]);

        return $dataProvider;
    }
}
