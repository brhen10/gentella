<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property integer $iddisciplina
 * @property string $nome
 * @property string $cargaHoraria
 *
 * @property DisciplinaHasTurma[] $disciplinaHasTurmas
 * @property Turma[] $turmaIdturmas
 * @property MatriculaProfessor[] $matriculaProfessors
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome', 'cargaHoraria'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddisciplina' => 'Iddisciplina',
            'nome' => 'Nome',
            'cargaHoraria' => 'Carga Horaria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaHasTurmas()
    {
        return $this->hasMany(DisciplinaHasTurma::className(), ['disciplina_iddisciplina' => 'iddisciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmaIdturmas()
    {
        return $this->hasMany(Turma::className(), ['idturma' => 'turma_idturma'])->viaTable('disciplina_has_turma', ['disciplina_iddisciplina' => 'iddisciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaProfessors()
    {
        return $this->hasMany(MatriculaProfessor::className(), ['disciplina_iddisciplina' => 'iddisciplina']);
    }
}
