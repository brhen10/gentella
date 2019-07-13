<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserva;

/**
 * ReservaSearch represents the model behind the search form of `app\models\Reserva`.
 */
class ReservaSearch extends Reserva
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idreserva'], 'integer'],
            [['datahorareserva', 'aluno_id', 'livro_id'], 'safe'],
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
        $query = Reserva::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'idreserva' => $this->idreserva,
            'datahorareserva' => $this->datahorareserva,
        ]);

        $query->andFilterWhere(['like', 'aluno.nome', $this->aluno_id])
              ->andFilterWhere(['like', 'livro.titulo', $this->livro_id]);

        return $dataProvider;
    }
}
