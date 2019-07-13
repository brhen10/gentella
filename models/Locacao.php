<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locacao".
 *
 * @property int $idlocacao
 * @property int $aluno_id
 * @property int $livro_id
 * @property int $reserva_id
 * @property string $datahoraDevolucao
 * @property string $observacao
 *
 * @property Aluno $aluno
 * @property Livro $livro
 * @property Reserva $reserva
 */
class Locacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aluno_id', 'livro_id', 'datahoraDevolucao', 'observacao'], 'required'],
            [['aluno_id', 'livro_id', 'reserva_id'], 'integer'],
            [['datahoraDevolucao'], 'safe'],
            [['observacao'], 'string', 'max' => 500],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id' => 'idaluno']],
            [['livro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Livro::className(), 'targetAttribute' => ['livro_id' => 'idlivro']],
            [['reserva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['reserva_id' => 'idreserva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idlocacao' => Yii::t('app', 'Idlocacao'),
            'aluno_id' => Yii::t('app', 'Aluno ID'),
            'livro_id' => Yii::t('app', 'Livro ID'),
            'reserva_id' => Yii::t('app', 'Reserva ID'),
            'datahoraDevolucao' => Yii::t('app', 'Datahora Devolucao'),
            'observacao' => Yii::t('app', 'Observacao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['idaluno' => 'aluno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLivro()
    {
        return $this->hasOne(Livro::className(), ['idlivro' => 'livro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['idreserva' => 'reserva_id']);
    }
}
