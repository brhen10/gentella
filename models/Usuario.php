<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idusuario
 * @property string $login
 * @property string $senha
 * @property string $acess_token
 * @property string $auth_key
 * @property string $nomeusuario
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    /**
     * @inheritdoc
     */
    public $senha_repeat;
    
    public static $papeis = [
        'admin'=>'Administrador',
        'professor'=>'Professor',
        'funcionario'=>'Funcionário',
        'diretor'=>'Diretor',
    ];

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_LOGIN = 'login';

    public static function tableName() {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        if (!empty($this->senha)) {
            $this->senha = sha1($this->senha);
        } else {
            $this->senha = $this->oldAttributes['senha'];
        }
        if ($insert) {
            $this->acess_token = \Yii::$app->security->generateRandomString(80);
            $this->auth_key = \Yii::$app->security->generateRandomString(80);
        }
        return parent::beforeSave($insert);
    }

    public function rules() {
        return [
            [['login', 'senha', 'papel'], 'required', 'on' => self::SCENARIO_CREATE],
            [['login', 'papel'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['senha_repeat'], 'safe'],
            [['login', 'senha', 'papel', 'nomeusuario'], 'string', 'max' => 45],
            [['acess_token', 'auth_key'], 'string', 'max' => 80],
            ['senha_repeat', 'compare', 'compareAttribute' => 'senha'],
            [['login'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'idusuario' => Yii::t('app', 'Idusuario'),
            'papel' => Yii::t('app', 'Papel'),
            'login' => Yii::t('app', 'Login'),
            'senha' => Yii::t('app', 'Senha'),
            'senha_repeat' => Yii::t('app', 'Repetição de Senha'),
            'acess_token' => Yii::t('app', 'Acess Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'nomeusuario' => Yii::t('app', 'Nome Usuario'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        $user = self::find()->where(['idusuario' => $id])->one();
        if (!is_null($user)) {
            return $user;
        }
        /*
          foreach (self::$users as $user) {
          if ($user['accessToken'] === $token) {
          return new static($user);
          }
          }
         */
        return null;
    }

//return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        $user = self::find()->where(['acess_token' => $token])->one();
        if (!is_null($user)) {
            return $user;
        }
        /*
          foreach (self::$users as $user) {
          if ($user['accessToken'] === $token) {
          return new static($user);
          }
          }
         */
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        $user = self::find()->where(['login' => $username])->one();
        if (!is_null($user)) {
            return $user;
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->idusuario;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($auth_Key) {
        return $this->auth_key === $auth_Key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($senha) {
        return $this->senha === sha1($senha);
    }

}
