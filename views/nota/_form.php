<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Nota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nota-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'ajaxConversion'=>false,
        'options' => [

        'pluginOptions' => [
        'autoclose' => true
        ]
        ],
        'displayFormat' => 'dd/MM/yyyy',
        'language'=>'pt',
    ]); ?>

    <?= $form->field($model, 'nota')->textInput() ?>

    <?= $form->field($model, 'bimestre')->dropDownList([
        '1º Bimestre' => '1º Bimestre',
        '2º Bimestre' => '2º Bimestre',
        '3º Bimestre' => '3º Bimestre',
        '4º Bimestre' => '4º Bimestre',]); ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?php
          echo $form->field($model, 'idmatricula')->widget(Select2::classname(), [
            'data' => $arrayAlunos,
            'options' => [
                'placeholder' => 'Selecione o aluno...'
            ],
            ])->label('Lista de Alunos');  
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
