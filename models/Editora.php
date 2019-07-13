<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "editora".
 *
 * @property int $ideditora
 * @property string $nome
 * @property string $cidade
 * @property string $endereco
 * @property string $bairro
 * @property string $telefone
 * @property string $email
 * @property string $observação
 *
 * @property Livro[] $livros
 */
class Editora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'editora';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cidade', 'endereco', 'bairro', 'telefone', 'email', 'observação'], 'required'],
            [['nome', 'cidade', 'bairro', 'email'], 'string', 'max' => 45],
            [['endereco'], 'string', 'max' => 100],
            [['telefone'], 'string', 'max' => 11],
            [['observação'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ideditora' => Yii::t('app', 'Ideditora'),
            'nome' => Yii::t('app', 'Nome'),
            'cidade' => Yii::t('app', 'Cidade'),
            'endereco' => Yii::t('app', 'Endereco'),
            'bairro' => Yii::t('app', 'Bairro'),
            'telefone' => Yii::t('app', 'Telefone'),
            'email' => Yii::t('app', 'Email'),
            'observação' => Yii::t('app', 'Observação'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLivros()
    {
        return $this->hasMany(Livro::className(), ['editora_id' => 'ideditora']);
    }
}
