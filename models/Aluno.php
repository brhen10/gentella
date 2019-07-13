<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $idaluno
 * @property string $nome
 * @property string $dataNascimento
 * @property string $nomeMae
 * @property string $nomePai
 * @property string $sexo
 * @property string $endereco
 * @property string $telefone
 * @property string $dataMatricula
 * @property string $periodoSerie
 * @property string $anoLetivo
 * @property string $observacao
 * @property string $naturalidade
 * @property string $nacionalidade
 *
 * @property Matricula[] $matriculas
 */
class Aluno extends \yii\db\ActiveRecord
{
    public $flag;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'dataNascimento', 'nomeMae', 'sexo', 'endereco', 'dataMatricula', 'periodoSerie', 'anoLetivo'], 'required'],
            [['idaluno'], 'integer'],
            [['dataNascimento', 'dataMatricula', 'anoLetivo'], 'safe'],
            [['observacao', 'naturalidade', 'nacionalidade'], 'string'],
            [['nome', 'nomeMae', 'nomePai'], 'string', 'max' => 100],
            [['sexo', 'telefone', 'periodoSerie'], 'string', 'max' => 20],
            [['endereco'], 'string', 'max' => 150],
             [['flag'], 'file', 'skipOnEmpty'=>true, 'extensions' => 'jpg, png'],
        ];
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idaluno' => 'Idaluno',
            'nome' => 'Nome Completo',
            'dataNascimento' => 'Data de Nascimento',
            'nomeMae' => 'Nome da Mae',
            'nomePai' => 'Nome do Pai',
            'sexo' => 'Sexo',
            'endereco' => 'Endereço',
            'telefone' => 'Telefone',
            'dataMatricula' => 'Data da Matricula',
            'periodoSerie' => 'Periodo/Série',
            'anoLetivo' => 'Ano Letivo',
            'observacao' => 'Observações',
            'naturalidade' => 'Naturalidade',
            'nacionalidade' => 'Nacionalidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['idaluno' => 'idaluno']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatorio()
    {
        return $this->hasMany(Relatorio::className(), ['idrelatorio' => 'aluno_id']);
    }
    public function getFotoLink() {
      
   return "uploadAluno/" . $this->idaluno . '.jpg, .png';
   $arquivo = "uploadAluno/" . $this->idaluno . '.jpg, .png';
        if (file_exists($arquivo)) {
            return $arquivo;
        } else return null;
    }
    
    public function getFotoPath() {
        return "uploadAluno/" . $this->idaluno . '.jpg, .png';
    }

    public function uploadAluno() {
        if ($this->validate()) {
            $this->flag->saveAs($this->getFotoLink());
           \yii\imagine\Image::thumbnail($this->getFotoLink(), 100, 100, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($this->getFotoLink(), ['jpg quality' => 100, 'png quality' => 100]);
            return true;
        } else {
            return false;
        }
    }
 
}
