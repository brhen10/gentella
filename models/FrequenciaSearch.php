<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Frequencia;

/**
 * FrequenciaSearch represents the model behind the search form about `\app\models\Frequencia`.
 */
class FrequenciaSearch extends Frequencia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfrequencia', 'presenca'], 'integer'],
            [['data', 'bimestre', 'conteudo'], 'safe'],
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
        $query = Frequencia::find();

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
            'idfrequencia' => $this->idfrequencia,
            'data' => $this->data,
            'presenca' => $this->presenca,
        ]);

        $query->andFilterWhere(['like', 'bimestre', $this->bimestre])
            ->andFilterWhere(['like', 'conteudo', $this->conteudo]);

        return $dataProvider;
    }
}
