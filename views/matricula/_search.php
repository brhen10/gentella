<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatriculaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matricula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idmatricula') ?>

    <?= $form->field($model, 'bimestre1Inicio') ?>

    <?= $form->field($model, 'bimestre2Inicio') ?>

    <?= $form->field($model, 'bimestre3Inicio') ?>

    <?= $form->field($model, 'bimestre4Inicio') ?>

    <?php // echo $form->field($model, 'diasLetivosPrevistos') ?>

    <?php // echo $form->field($model, 'diasLetivosCumpridos') ?>

    <?php // echo $form->field($model, 'nota1') ?>

    <?php // echo $form->field($model, 'nota2') ?>

    <?php // echo $form->field($model, 'nota3') ?>

    <?php // echo $form->field($model, 'nota4') ?>

    <?php // echo $form->field($model, 'media') ?>

    <?php // echo $form->field($model, 'faltas') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'observacao') ?>

    <?php // echo $form->field($model, 'idaluno') ?>

    <?php // echo $form->field($model, 'idturma') ?>

    <?php // echo $form->field($model, 'iddisciplina') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
