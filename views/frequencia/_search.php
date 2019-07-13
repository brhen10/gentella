<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FrequenciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frequencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idfrequencia') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'presenca') ?>

    <?= $form->field($model, 'bimestre') ?>

    <?= $form->field($model, 'conteudo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
