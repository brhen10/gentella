<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "frequencia_aluno".
 *
 * @property integer $idmatricula
 * @property integer $idfrequencia
 *
 * @property Frequencia $idfrequencia0
 * @property Matricula $idmatricula0
 */
class FrequenciaAluno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frequencia_aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmatricula', 'idfrequencia'], 'required'],
            [['idmatricula', 'idfrequencia'], 'integer'],
            [['idfrequencia'], 'exist', 'skipOnError' => true, 'targetClass' => Frequencia::className(), 'targetAttribute' => ['idfrequencia' => 'idfrequencia']],
            [['idmatricula'], 'exist', 'skipOnError' => true, 'targetClass' => Matricula::className(), 'targetAttribute' => ['idmatricula' => 'idmatricula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmatricula' => 'Idmatricula',
            'idfrequencia' => 'Idfrequencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdfrequencia0()
    {
        return $this->hasOne(Frequencia::className(), ['idfrequencia' => 'idfrequencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdmatricula0()
    {
        return $this->hasOne(Matricula::className(), ['idmatricula' => 'idmatricula']);
    }
}
