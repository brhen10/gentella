<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $ideventos
 * @property string $titulo
 * @property string $descricao
 * @property string $dataEvento
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'descricao'], 'required'],
            [['dataEvento'], 'safe'],
            [['titulo'], 'string', 'max' => 100],
            [['descricao'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ideventos' => Yii::t('app', 'Ideventos'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descricao' => Yii::t('app', 'Descricao'),
            'dataEvento' => Yii::t('app', 'Data Evento'),
        ];
    }
}
