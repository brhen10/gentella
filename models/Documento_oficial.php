<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documento_oficial".
 *
 * @property int $iddocumento_oficial
 * @property int $numero
 * @property string $destino
 * @property string $data
 * @property string $descrição
 * @property string $documento_oficial
 * @property string $pessoa_destino
 * @property string $tipo
 */
class Documento_oficial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documento_oficial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero', 'destino', 'data', 'descrição', 'documento_oficial', 'pessoa_destino', 'tipo'], 'required'],
            [['numero'], 'integer'],
            [['data'], 'safe'],
            [['documento_oficial'], 'string'],
            [['destino', 'descrição', 'tipo'], 'string', 'max' => 45],
            [['pessoa_destino'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddocumento_oficial' => Yii::t('app', 'Iddocumento Oficial'),
            'numero' => Yii::t('app', 'Numero'),
            'destino' => Yii::t('app', 'Destino'),
            'data' => Yii::t('app', 'Data'),
            'descrição' => Yii::t('app', 'Descrição'),
            'documento_oficial' => Yii::t('app', 'Documento Oficial'),
            'pessoa_destino' => Yii::t('app', 'Pessoa Destino'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }
}
