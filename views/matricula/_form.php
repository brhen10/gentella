<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Matricula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matricula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idturma')->hiddenInput()->label(false); ?>

    <?php
          echo $form->field($model, 'alunosForm')->widget(Select2::classname(), [
            'data' => $alunos,
            'options' => ['placeholder' => 'Selecione os alunos ...', 'multiple' => true],
            'pluginOptions' => [
                'tags' => true,
                'tokenSeparators' => [',', ' ']
            ],
            ])->label('Lista de Alunos');  
       
    ?>

    
    <?php 
         if (!$model->isNewRecord) { 
    ?>

    <?= $form->field($model, 'nota1')->textInput() ?>

    <?= $form->field($model, 'nota2')->textInput() ?>

    <?= $form->field($model, 'nota3')->textInput() ?>

    <?= $form->field($model, 'nota4')->textInput() ?>

    <?= $form->field($model, 'media')->textInput() ?>

    <?= $form->field($model, 'faltas')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observacao')->textarea(['rows' => 6]) ?>

    <?php } ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
