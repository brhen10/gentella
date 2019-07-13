<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relatorio_item".
 *
 * @property int $idrelatorio_item
 * @property string $relatorio
 * @property string $tipo_relatorio
 * @property int $relatorio_id
 *
 * @property Relatorio $relatorio0
 */
class Relatorio_item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relatorio_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relatorio', 'tipo_relatorio'], 'required'],
            [['relatorio'], 'string'],
            [['relatorio_id'], 'integer'],
            [['tipo_relatorio'], 'string', 'max' => 45],
            [['relatorio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Relatorio::className(), 'targetAttribute' => ['relatorio_id' => 'idrelatorio']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrelatorio_item' => Yii::t('app', 'Idrelatorio Item'),
            'relatorio' => Yii::t('app', 'Relatorio'),
            'tipo_relatorio' => Yii::t('app', 'Tipo Relatorio'),
            'relatorio_id' => Yii::t('app', 'Relatorio ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatorio0()
    {
        return $this->hasOne(Relatorio::className(), ['idrelatorio' => 'relatorio_id']);
    }
}
