<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aluno;

/**
 * AlunoSearch represents the model behind the search form about `\app\models\Aluno`.
 */
class AlunoSearch extends Aluno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idaluno'], 'integer'],
            [['nome', 'dataNascimento', 'nomeMae', 'nomePai', 'sexo', 'endereco', 'telefone', 'dataMatricula', 'periodoSerie', 'anoLetivo', 'observacao', 'naturalidade', 'nacionalidade'], 'safe'],
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
        $query = Aluno::find();

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
            'idaluno' => $this->idaluno,
            'dataNascimento' => $this->dataNascimento,
            'dataMatricula' => $this->dataMatricula,
            'anoLetivo' => $this->anoLetivo,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'nomeMae', $this->nomeMae])
            ->andFilterWhere(['like', 'nomePai', $this->nomePai])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'telefone', $this->telefone])
            ->andFilterWhere(['like', 'periodoSerie', $this->periodoSerie])
            ->andFilterWhere(['like', 'observacao', $this->observacao])
            ->andFilterWhere(['like', 'naturalidade', $this->naturalidade])
            ->andFilterWhere(['like', 'nacionalidade', $this->nacionalidade]);

        return $dataProvider;
    }
}
