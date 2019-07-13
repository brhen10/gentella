<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfessorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="professor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idprofessor') ?>

    <?= $form->field($model, 'nome') ?>

    <?php // $form->field($model, 'formacao') ?>

    <?php // $form->field($model, 'endereco') ?>

    <?php // $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'cidade') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'turno') ?>

    <?php // echo $form->field($model, 'portaria') ?>

    <?php // echo $form->field($model, 'dataCadastro') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
