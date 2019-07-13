<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Livro_controle;

/**
 * Livro_controleSearch represents the model behind the search form of `app\models\Livro_controle`.
 */
class Livro_controleSearch extends Livro_controle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idlivro_controle'], 'integer'],
            [['nome_aluno', 'nivel_ano', 'data_transferencia', 'destino', 'responsavel_transferencia', 'pais_responsavel', 'observacao'], 'safe'],
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
        $query = Livro_controle::find();

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
            'idlivro_controle' => $this->idlivro_controle,
        ]);

        $query->andFilterWhere(['like', 'nome_aluno', $this->nome_aluno])
            ->andFilterWhere(['like', 'nivel_ano', $this->nivel_ano])
            ->andFilterWhere(['like', 'data_transferencia', $this->data_transferencia])
            ->andFilterWhere(['like', 'destino', $this->destino])
            ->andFilterWhere(['like', 'responsavel_transferencia', $this->responsavel_transferencia])
            ->andFilterWhere(['like', 'pais_responsavel', $this->pais_responsavel])
            ->andFilterWhere(['like', 'observacao', $this->observacao]);

        return $dataProvider;
    }
}
