<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matricula_professor".
 *
 * @property integer $idmatricula_professor
 * @property integer $idprofessor
 * @property integer $disciplina_iddisciplina
 *
 * @property Disciplina $disciplinaIddisciplina
 * @property Professor $idprofessor0
 */
class MatriculaProfessor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matricula_professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idprofessor', 'disciplina_iddisciplina'], 'required'],
            [['idprofessor', 'disciplina_iddisciplina'], 'integer'],
            [['disciplina_iddisciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['disciplina_iddisciplina' => 'iddisciplina']],
            [['idprofessor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['idprofessor' => 'idprofessor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmatricula_professor' => 'Idmatricula Professor',
            'idprofessor' => 'Idprofessor',
            'disciplina_iddisciplina' => 'Disciplina Iddisciplina',
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
    public function getIdprofessor0()
    {
        return $this->hasOne(Professor::className(), ['idprofessor' => 'idprofessor']);
    }
}
