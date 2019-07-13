<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classificacao".
 *
 * @property int $idclassificacao
 * @property int $classificacao
 *
 * @property Livro[] $livros
 */
class Classificacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classificacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classificacao'], 'required'],
            [['classificacao'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idclassificacao' => Yii::t('app', 'Idclassificacao'),
            'classificacao' => Yii::t('app', 'Classificacao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLivros()
    {
        return $this->hasMany(Livro::className(), ['classificacao_id' => 'idclassificacao']);
    }
}
