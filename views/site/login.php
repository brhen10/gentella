<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';

?>

<div class="login-box">
    
        <h1 align="center"><a><b>ACESSAR O SIGAE</b></a></h1>
        
        <div class="login-box-body">
       
        <p align="center"><img src="img/logonova.png" alt="..." class="img-circle" width="300" height="300"></p>
         <?php $form = ActiveForm::begin([
             'id' => 'login-form',
             'options' => ['method' => 'post']
         ]); ?>

        <?= $form->field($model, 'username', [
            "template"=>"<span class=\"glyphicon glyphicon-user form-control-feedback\"></span>\n{input}",
            'options'=>['class'=>'form-group has-feedback']])
            ->textInput(['placeholder'=>Yii::t('app', $model->getAttributeLabel('login'))]);
        ?>

        <?= $form->field($model, 'password', [
            "template"=>"<span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>\n{input}",
            'options'=>['class'=>'form-group has-feedback']])
            ->passwordInput(['placeholder'=>Yii::t('app', $model->getAttributeLabel('senha'))]);
        ?>


         <div class="row">
             <div class="col-xs-8">
                
            </div><!-- /.col -->
             <div class="col-xs-4">
                 <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
             </div>
            
         </div>
        

          <?php ActiveForm::end(); ?>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->