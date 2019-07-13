<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Matricula;

/**
 * MatriculaSearch represents the model behind the search form about `\app\models\Matricula`.
 */
class MatriculaSearch extends Matricula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmatricula', 'faltas', 'idaluno', 'idturma'], 'integer'],
            [['status', 'observacao'], 'safe'],
            [['nota1', 'nota2', 'nota3', 'nota4', 'media'], 'number'],
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
        $query = Matricula::find();

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
            'idmatricula' => $this->idmatricula,
            'nota1' => $this->nota1,
            'nota2' => $this->nota2,
            'nota3' => $this->nota3,
            'nota4' => $this->nota4,
            'media' => $this->media,
            'faltas' => $this->faltas,
            'idaluno' => $this->idaluno,
            'idturma' => $this->idturma,
            
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'observacao', $this->observacao]);

        return $dataProvider;
    }
}
