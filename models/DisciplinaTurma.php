<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina_has_turma".
 *
 * @property integer $disciplina_iddisciplina
 * @property integer $turma_idturma
 *
 * @property Disciplina $disciplinaIddisciplina
 * @property Turma $turmaIdturma
 */
class DisciplinaTurma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disciplina_has_turma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['disciplina_iddisciplina', 'turma_idturma'], 'required'],
            [['disciplina_iddisciplina', 'turma_idturma'], 'integer'],
            [['disciplina_iddisciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['disciplina_iddisciplina' => 'iddisciplina']],
            [['turma_idturma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['turma_idturma' => 'idturma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'disciplina_iddisciplina' => 'Disciplina Iddisciplina',
            'turma_idturma' => 'Turma Idturma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaIddisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['iddisciplina' => 'disciplina_iddisciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmaIdturma()
    {
        return $this->hasOne(Turma::className(), ['idturma' => 'turma_idturma']);
    }
}
