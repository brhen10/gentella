<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnosticoInicial".
 *
 * @property int $iddiagnosticoInicial
 * @property int $turma_id
 * @property int $professor_id
 * @property string $diagnostico
 * @property int $anoLetivo
 *
 * @property Professor $professor
 */
class DiagnosticoInicial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnosticoInicial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['turma_id', 'professor_id', 'diagnostico', 'anoLetivo'], 'required'],
            [['turma_id', 'professor_id', 'anoLetivo'], 'integer'],
            [['diagnostico'], 'string'],
            [['professor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['professor_id' => 'idprofessor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddiagnosticoInicial' => Yii::t('app', 'Iddiagnostico Inicial'),
            'turma_id' => Yii::t('app', 'Turma ID'),
            'professor_id' => Yii::t('app', 'Professor ID'),
            'diagnostico' => Yii::t('app', 'Diagnostico'),
            'anoLetivo' => Yii::t('app', 'Ano Letivo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['idprofessor' => 'professor_id']);
    }
     public function getTurma()
    {
        return $this->hasOne(Turma_infantil::className(), ['idturmainfantil' => 'turma_id']);
    }
}
