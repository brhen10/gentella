<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turma_infantil".
 *
 * @property int $idturmainfantil
 * @property string $serie
 * @property string $nome
 * @property string $observacao
 * @property string $bimestre1inicio
 * @property string $bimestre2inicio
 * @property string $bimestre3inicio
 * @property string $bimestre4inicio
 * @property int $diasLetivosPrevistos
 * @property int $diasLetivosCumpridos
 * 
 * @property TurmaItem[] $turmaItems
 */
class Turma_infantil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turma_infantil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serie', 'nome'], 'required'],
            [['observacao'], 'string'],
            [['bimestre1inicio', 'bimestre2inicio', 'bimestre3inicio', 'bimestre4inicio'], 'safe'],
            [['diasLetivosPrevistos', 'diasLetivosCumpridos'], 'integer'],
            [['serie', 'nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idturmainfantil' => Yii::t('app', 'Idturmainfantil'),
            'serie' => Yii::t('app', 'Serie'),
            'nome' => Yii::t('app', 'Nome'),
            'observacao' => Yii::t('app', 'Observacão'),
            'bimestre1inicio' => Yii::t('app', 'Inicio do 1º Bimestre'),
            'bimestre2inicio' => Yii::t('app', 'Inicio do 2º Bimestre'),
            'bimestre3inicio' => Yii::t('app', 'Inicio do 3º Bimestre'),
            'bimestre4inicio' => Yii::t('app', 'Inicio do 4º Bimestre'),
            'diasLetivosPrevistos' => Yii::t('app', 'Dias Letivos Previstos'),
            'diasLetivosCumpridos' => Yii::t('app', 'Dias Letivos Cumpridos'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmaItems()
    {
        return $this->hasMany(Turma_item::className(), ['turma_id' => 'idturmainfantil']);
    }
}
