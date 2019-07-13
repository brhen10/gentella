<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "livro_controle".
 *
 * @property int $idlivro_controle
 * @property string $nome_aluno
 * @property string $nivel_ano
 * @property string $data_transferencia
 * @property string $destino
 * @property string $responsavel_transferencia
 * @property string $pais_responsavel
 * @property string $observacao
 */
class Livro_controle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'livro_controle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_aluno', 'nivel_ano', 'data_transferencia', 'destino', 'responsavel_transferencia', 'pais_responsavel', 'observacao'], 'required'],
            [['observacao'], 'string'],
            [['nome_aluno', 'destino', 'responsavel_transferencia', 'pais_responsavel'], 'string', 'max' => 100],
            [['nivel_ano'], 'string', 'max' => 45],
            [['data_transferencia'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idlivro_controle' => Yii::t('app', 'Idlivro Controle'),
            'nome_aluno' => Yii::t('app', 'Nome Aluno'),
            'nivel_ano' => Yii::t('app', 'Nivel Ano'),
            'data_transferencia' => Yii::t('app', 'Data Transferencia'),
            'destino' => Yii::t('app', 'Destino'),
            'responsavel_transferencia' => Yii::t('app', 'Responsavel Transferencia'),
            'pais_responsavel' => Yii::t('app', 'Pais Responsavel'),
            'observacao' => Yii::t('app', 'Observacao'),
        ];
    }
}
