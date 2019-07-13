<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nota".
 *
 * @property integer $idnota
 * @property string $data
 * @property double $nota
 * @property string $bimestre
 * @property string $tipo
 * @property integer $idmatricula
 *
 * @property Matricula $idmatricula0
 */
class Nota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data', 'nota', 'idmatricula'], 'required'],
            [['data'], 'safe'],
            [['nota'], 'number'],
            [['idmatricula'], 'integer'],
            [['bimestre', 'tipo'], 'string', 'max' => 45],
            [['idmatricula'], 'exist', 'skipOnError' => true, 'targetClass' => Matricula::className(), 'targetAttribute' => ['idmatricula' => 'idmatricula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnota' => 'Idnota',
            'data' => 'Data',
            'nota' => 'Nota',
            'bimestre' => 'Bimestre',
            'tipo' => 'Tipo',
            'idmatricula' => 'Idmatricula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdmatricula0()
    {
        return $this->hasOne(Matricula::className(), ['idmatricula' => 'idmatricula']);
    }
}
