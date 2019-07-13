<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * This is the model class for table "livro".
 *
 * @property int $idlivro
 * @property int $autor_id
 * @property int $editora_id
 * @property int $classificacao_id
 * @property string $titulo
 * @property int $ano
 * @property int $status
 * @property string $resumo
 * @property string $observação
 *
 * @property Autor $autor
 * @property Editora $editora
 * @property Classificacao $classificacao
 * @property Locacao[] $locacaos
 * @property Reserva[] $reservas
 */
class Livro extends \yii\db\ActiveRecord
{
    public $flag;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'livro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor_id', 'editora_id', 'classificacao_id', 'titulo', 'ano', 'status', 'resumo', 'observação'], 'required'],
            [['autor_id', 'editora_id', 'classificacao_id', 'ano'], 'integer'],
            [['titulo', 'status'], 'string', 'max' => 45],
            [['resumo', 'observação'], 'string', 'max' => 500],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autor_id' => 'idautor']],
            [['editora_id'], 'exist', 'skipOnError' => true, 'targetClass' => Editora::className(), 'targetAttribute' => ['editora_id' => 'ideditora']],
            [['classificacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classificacao::className(), 'targetAttribute' => ['classificacao_id' => 'idclassificacao']],
             [['flag'], 'file', 'skipOnEmpty'=>true, 'extensions' => 'jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idlivro' => Yii::t('app', 'Idlivro'),
            'autor_id' => Yii::t('app', 'Autor ID'),
            'editora_id' => Yii::t('app', 'Editora ID'),
            'classificacao_id' => Yii::t('app', 'Classificacao ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'ano' => Yii::t('app', 'Ano'),
            'status' => Yii::t('app', 'Status'),
            'resumo' => Yii::t('app', 'Resumo'),
            'observação' => Yii::t('app', 'Observação'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Autor::className(), ['idautor' => 'autor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEditora()
    {
        return $this->hasOne(Editora::className(), ['ideditora' => 'editora_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificacao()
    {
        return $this->hasOne(Classificacao::className(), ['idclassificacao' => 'classificacao_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocacaos()
    {
        return $this->hasMany(Locacao::className(), ['livro_id' => 'idlivro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['livro_id' => 'idlivro']);
    }
    public function getLivros()
    {
        return $this->hasMany(Alunos::className(), ['alunos_id' => 'idalunos']);
    }
    
    public function getFotoLink() {
      
        return "upload/" . $this->idlivro . '.jpg';
    }
    
    public function getFotoPath() {
        return "upload/" . $this->idlivro . '.jpg';
    }

    public function upload() {
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
