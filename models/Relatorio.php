<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relatorio".
 *
 * @property int $idrelatorio
 * @property int $turma_id
 * @property int $aluno_id
 *
 * @property Aluno $aluno
 * @property TurmaInfantil $turma
 * @property RelatorioItem[] $relatorioItems
 */
class Relatorio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relatorio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['turma_id', 'aluno_id'], 'required'],
            [['turma_id', 'aluno_id'], 'integer'],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::className(), 'targetAttribute' => ['aluno_id' => 'idaluno']],
            [['turma_id'], 'exist', 'skipOnError' => true, 'targetClass' => Turma_infantil::className(), 'targetAttribute' => ['turma_id' => 'idturmainfantil']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrelatorio' => Yii::t('app', 'Idrelatorio'),
            'turma_id' => Yii::t('app', 'Turma'),
            'aluno_id' => Yii::t('app', 'Aluno'),
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
    public function getTurma_infantil()
    {
        return $this->hasOne(Turma_infantil::className(), ['idturmainfantil' => 'turma_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatorioItems()
    {
        return $this->hasMany(Relatorio_item::className(), ['relatorio_id' => 'idrelatorio']);
    }
}
