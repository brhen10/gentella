<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlunoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'idaluno') ?>

    <?= $form->field($model, 'nome')->label('Nome') ?>

    <?php // $form->field($model, 'dataNascimento') ?>

    <?php // $form->field($model, 'nomeMae') ?>

    <?php // $form->field($model, 'nomePai') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'endereco') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'dataMatricula') ?>

    <?php //echo $form->field($model, 'periodoSerie') ?>

    <?php // echo $form->field($model, 'anoLetivo') ?>

    <?php // echo $form->field($model, 'observacao') ?>
    
    <?php // echo $form->field($model, 'naturalidade') ?>

    <?php // echo $form->field($model, 'nacionalidade') ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
