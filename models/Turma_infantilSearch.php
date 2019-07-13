<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Turma_infantil;

/**
 * Turma_infantilSearch represents the model behind the search form of `app\models\Turma_infantil`.
 */
class Turma_infantilSearch extends Turma_infantil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idturmainfantil', 'diasLetivosPrevistos', 'diasLetivosCumpridos'], 'integer'],
            [['serie', 'nome', 'observacao', 'bimestre1inicio', 'bimestre2inicio', 'bimestre3inicio', 'bimestre4inicio'], 'safe'],
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
        $query = Turma_infantil::find();

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
            'idturmainfantil' => $this->idturmainfantil,
            'bimestre1inicio' => $this->bimestre1inicio,
            'bimestre2inicio' => $this->bimestre2inicio,
            'bimestre3inicio' => $this->bimestre3inicio,
            'bimestre4inicio' => $this->bimestre4inicio,
            'diasLetivosPrevistos' => $this->diasLetivosPrevistos,
            'diasLetivosCumpridos' => $this->diasLetivosCumpridos,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'observacao', $this->observacao]);

        return $dataProvider;
    }
}
