<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $idreserva
 * @property int $aluno_id
 * @property int $livro_id
 * @property string $datahorareserva
 *
 * @property Locacao[] $locacaos
 * @property Aluno $aluno
 * @property Livro $livro
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aluno_id', 'livro_id', 'datahorareserva'], 'required'],
            [['aluno_id', 'livro_id'], 'integer'],
            [['datahorareserva'], 'safe'],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id' => 'idaluno']],
            [['livro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Livro::className(), 'targetAttribute' => ['livro_id' => 'idlivro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idreserva' => Yii::t('app', 'Idreserva'),
            'aluno_id' => Yii::t('app', 'Aluno ID'),
            'livro_id' => Yii::t('app', 'Livro ID'),
            'datahorareserva' => Yii::t('app', 'Datahorareserva'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocacaos()
    {
        return $this->hasMany(Locacao::className(), ['reserva_id' => 'idreserva']);
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
}
