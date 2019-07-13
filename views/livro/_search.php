<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LivroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idlivro') ?>

    <?= $form->field($model, 'autor_id') ?>

    <?= $form->field($model, 'editora_id') ?>

    <?= $form->field($model, 'classificacao_id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?php // echo $form->field($model, 'ano') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'resumo') ?>

    <?php // echo $form->field($model, 'observação') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
