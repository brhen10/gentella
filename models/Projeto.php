<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use \Imagine\Image;

/**
 * This is the model class for table "projeto".
 *
 * @property int $idprojeto
 * @property string $nome
 * @property string $tema
 * @property string $data_projeto
 * @property string $justificativa
 * @property string $objetivo_geral
 * @property string $objetivo_especifico
 * @property string $desenvolvimento
 * @property string $culminancia
 * @property string $avaliacao
 * @property string $oberservacao
 */
class Projeto extends \yii\db\ActiveRecord
{
    public $flag;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projeto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'tema', 'data_projeto', 'justificativa', 'objetivo_geral', 'objetivo_especifico', 'desenvolvimento', 'culminancia', 'avaliacao', 'oberservacao'], 'required'],
            [['justificativa', 'objetivo_especifico', 'desenvolvimento', 'oberservacao'], 'string'],
            [['nome', 'tema'], 'string', 'max' => 150],
            [['data_projeto'], 'string', 'max' => 45],
            [['objetivo_geral'], 'string', 'max' => 400],
            [['culminancia'], 'string', 'max' => 300],
            [['avaliacao'], 'string', 'max' => 600],
            [['flag'], 'file', 'skipOnEmpty'=>true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idprojeto' => Yii::t('app', 'Idprojeto'),
            'nome' => Yii::t('app', 'Nome'),
            'tema' => Yii::t('app', 'Tema'),
            'data_projeto' => Yii::t('app', 'Data Projeto'),
            'justificativa' => Yii::t('app', 'Justificativa'),
            'objetivo_geral' => Yii::t('app', 'Objetivo Geral'),
            'objetivo_especifico' => Yii::t('app', 'Objetivo Especifico'),
            'desenvolvimento' => Yii::t('app', 'Desenvolvimento'),
            'culminancia' => Yii::t('app', 'Culminancia'),
            'avaliacao' => Yii::t('app', 'Avaliacao'),
            'oberservacao' => Yii::t('app', 'Oberservacao'),
            //'projetoImagem' => Yii::t('app', 'Imagem salva em'),
        ];
    }
     public function getFotoLink() {
      
        return "uploadProjeto/" . $this->idprojeto . '.jpg';
    }
    
    public function getFotoPath() {
        return "uploadProjeto/" . $this->idprojeto . '.jpg';
    }

    public function uploadProjeto() {
        if ($this->validate()) {
            $this->flag->saveAs($this->getFotoLink());
           \yii\imagine\Image::thumbnail($this->getFotoLink(), 100, 100, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($this->getFotoLink(), ['jpg quality' => 100]);
            return true;
        } else {
            return false;
        }
    }
 
}
