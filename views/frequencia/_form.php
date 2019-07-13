<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Frequencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frequencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
          echo $form->field($model, 'alunosForm')->widget(Select2::classname(), [
            'data' => $arrayAlunos,
            'options' => [
                'placeholder' => 'Selecione os alunos que faltaram ...'
            ],
            'pluginOptions' => [
                //'tags' => true
                'multiple' => true,
            ],
            ])->label('Lista de Alunos');  
    ?>

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

    <?= $form->field($model, 'bimestre')->dropDownList([
        '1º Bimestre' => '1º Bimestre',
        '2º Bimestre' => '2º Bimestre',
        '3º Bimestre' => '3º Bimestre',
        '4º Bimestre' => '4º Bimestre',]); ?>

    <?= $form->field($model, 'conteudo')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
