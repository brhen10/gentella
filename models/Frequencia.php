<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "frequencia".
 *
 * @property integer $idfrequencia
 * @property string $data
 * @property integer $presenca
 * @property string $bimestre
 * @property string $conteudo
 *
 * @property FrequenciaAluno[] $frequenciaAlunos
 * @property Matricula[] $idmatriculas
 */
class Frequencia extends \yii\db\ActiveRecord
{
    public $alunosForm;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frequencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data'], 'required'],
            [['data', 'alunos'], 'safe'],
            [['presenca'], 'integer'],
            [['conteudo'], 'string'],
            [['bimestre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfrequencia' => 'Idfrequencia',
            'data' => 'Data',
            'presenca' => 'Presenca',
            'bimestre' => 'Bimestre',
            'conteudo' => 'Conteúdo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrequenciaAlunos()
    {
        return $this->hasMany(FrequenciaAluno::className(), ['idfrequencia' => 'idfrequencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdmatriculas()
    {
        return $this->hasMany(Matricula::className(), ['idmatricula' => 'idmatricula'])->viaTable('frequencia_aluno', ['idfrequencia' => 'idfrequencia']);
    }
}
