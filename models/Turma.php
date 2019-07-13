<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turma".
 *
 * @property integer $idturma
 * @property string $serie
 * @property string $nome
 * @property string $observacao
 * @property string $bimestre1inicio
 * @property string $bimestre2inicio
 * @property string $bimestre3inicio
 * @property string $bimestre4inicio
 * @property integer $diasLetivosPrevistos
 * @property integer $diasLetivosCumpridos
 *
 * @property DisciplinaHasTurma[] $disciplinaHasTurmas
 * @property Disciplina[] $disciplinaIddisciplinas
 * @property Matricula[] $matriculas
 */
class Turma extends \yii\db\ActiveRecord
{

    public $disciplinasForm;


    public static function tableName()
    {
        return 'turma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['disciplinasForm'], 'safe'],
            [['serie', 'nome'], 'required'],
            [['observacao'], 'string'],
            [['diasLetivosPrevistos', 'diasLetivosCumpridos'], 'integer'],
            [['serie', 'nome'], 'string', 'max' => 45],
            [['bimestre1inicio', 'bimestre2inicio', 'bimestre3inicio', 'bimestre4inicio'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idturma' => 'Idturma',
            'serie' => 'Série',
            'nome' => 'Nome',
            'observacao' => 'Observações',
            'bimestre1inicio' => 'Inicio 1º Bimestre',
            'bimestre2inicio' => 'Inicio 2º Bimestre',
            'bimestre3inicio' => 'Inicio 3º Bimestre',
            'bimestre4inicio' => 'Inicio 4º Bimestre',
            'diasLetivosPrevistos' => 'Dias Letivos Previstos',
            'diasLetivosCumpridos' => 'Dias Letivos Cumpridos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaHasTurmas()
    {
        return $this->hasMany(DisciplinaHasTurma::className(), ['turma_idturma' => 'idturma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinaIddisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['iddisciplina' => 'disciplina_iddisciplina'])->viaTable('disciplina_has_turma', ['turma_idturma' => 'idturma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['idturma' => 'idturma']);
    }
}
