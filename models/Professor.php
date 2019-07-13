<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use \Imagine\Image;

/**
 * This is the model class for table "professor".
 *
 * @property integer $idprofessor
 * @property string $nome
 * @property string $formacao
 * @property string $endereco
 * @property string $bairro
 * @property string $cidade
 * @property string $email
 * @property string $turno
 * @property string $portaria
 * @property string $dataCadastro
 *
 * @property MatriculaProfessor[] $matriculaProfessors
 */
class Professor extends \yii\db\ActiveRecord
{
    public $disciplinasForm;
    public $flag;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['disciplinasForm'], 'safe'],
            [['nome', 'endereco', 'bairro', 'cidade'], 'required'],
            [['nome'], 'string', 'max' => 100],
            [['formacao'], 'string', 'max' => 60],
            [['endereco'], 'string', 'max' => 80],
            [['bairro', 'cidade'], 'string', 'max' => 50],
            [['email', 'turno', 'portaria'], 'string', 'max' => 45],
            [['dataCadastro'], 'string', 'max' => 20],
            [['flag'], 'file', 'skipOnEmpty'=>true, 'extensions' => 'png, jpg'], //2ºpasso criar uma regra de arquivo para a propriedade
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idprofessor' => 'Idprofessor',
            'nome' => 'Nome',
            'formacao' => 'Formacao',
            'endereco' => 'Endereco',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'email' => 'Email',
            'turno' => 'Turno',
            'portaria' => 'Portaria',
            'dataCadastro' => 'Data Cadastro',
            'disciplinasForm' => 'Disciplinas'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaProfessors()
    {
        return $this->hasMany(MatriculaProfessor::className(), ['idprofessor' => 'idprofessor']);
    }
 public function getFotoLink() {
        //return Yii::getAlias('@webroot/uploads/') . $this->idpolicial . '.png';
        return "uploads/" . $this->idprofessor . '.jpg';
    }
    
    public function getFotoPath() {
        return "uploads/" . $this->idprofessor . '.jpg';
    }

    public function upload() {
        if ($this->validate()) {
            $this->flag->saveAs($this->getFotoLink());
           \yii\imagine\Image::thumbnail($this->getFotoLink(), 100, 100, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($this->getFotoLink(), ['jpeg quality' => 100]);
            return true;
        } else {
            return false;
        }
    }
    
}

