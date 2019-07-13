<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turma_item".
 *
 * @property int $idturma_item
 * @property int $aluno_id
 * @property int $turma_id
 *
 * @property TurmaInfantil $turma
 * @property Aluno $aluno
 */
class Turma_item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turma_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aluno_id'], 'required'],
            [['aluno_id', 'turma_id'], 'integer'],
            [['turma_id'], 'exist', 'skipOnError' => true, 'targetClass' => Turma_infantil::className(), 'targetAttribute' => ['turma_id' => 'idturmainfantil']],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id' => 'idaluno']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idturma_item' => Yii::t('app', 'Idturma Item'),
            'aluno_id' => Yii::t('app', 'Aluno ID'),
            'turma_id' => Yii::t('app', 'Turma ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma_infantil::className(), ['idturmainfantil' => 'turma_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::className(), ['idaluno' => 'aluno_id']);
    }
}
