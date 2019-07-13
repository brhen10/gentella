<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matricula".
 *
 * @property integer $idmatricula
 * @property double $nota1
 * @property double $nota2
 * @property double $nota3
 * @property double $nota4
 * @property double $media
 * @property integer $faltas
 * @property integer $status
 * @property string $observacao
 * @property integer $idaluno
 * @property integer $idturma
 *
 * @property FrequenciaAluno[] $frequenciaAlunos
 * @property Frequencia[] $idfrequencias
 * @property Aluno $idaluno0
 * @property Turma $idturma0
 * @property Nota[] $notas
 */
class Matricula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const MATRICULADO = 1;
    const MATRICULA_CANCELADA = 2;
    const APROVADO = 3;
    const REPROVADO = 4;

    public $alunosForm;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matricula';
    }
    
    public function rules()
    {
        return [
            [['alunosForm'], 'safe'],
            [['nota1', 'nota2', 'nota3', 'nota4', 'media'], 'number'],
            [['faltas', 'status', 'idaluno', 'idturma'], 'integer'],
            [['observacao'], 'string'],
            [['idturma'], 'required'],
            [['idaluno'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['idaluno' => 'idaluno']],
            [['idturma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['idturma' => 'idturma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmatricula' => 'Idmatricula',
            'nota1' => 'Nota1',
            'nota2' => 'Nota2',
            'nota3' => 'Nota3',
            'nota4' => 'Nota4',
            'media' => 'Media',
            'faltas' => 'Faltas',
            'status' => 'Status',
            'observacao' => 'Observacao',
            'idaluno' => 'Idaluno',
            'idturma' => 'Idturma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrequenciaAlunos()
    {
        return $this->hasMany(FrequenciaAluno::className(), ['idmatricula' => 'idmatricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdfrequencias()
    {
        return $this->hasMany(Frequencia::className(), ['idfrequencia' => 'idfrequencia'])->viaTable('frequencia_aluno', ['idmatricula' => 'idmatricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdaluno0()
    {
        return $this->hasOne(Aluno::className(), ['idaluno' => 'idaluno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdturma0()
    {
        return $this->hasOne(Turma::className(), ['idturma' => 'idturma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Nota::className(), ['idmatricula' => 'idmatricula']);
    }
}
