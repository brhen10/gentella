<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php //$form->field($model, 'idprojeto') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'tema') ?>

    <?php // $form->field($model, 'data_projeto') ?>

    <?php //$form->field($model, 'justificativa') ?>

    <?php // echo $form->field($model, 'objetivo_geral') ?>

    <?php // echo $form->field($model, 'objetivo_especifico') ?>

    <?php // echo $form->field($model, 'desenvolvimento') ?>

    <?php // echo $form->field($model, 'culminancia') ?>

    <?php // echo $form->field($model, 'avaliacao') ?>

    <?php // echo $form->field($model, 'oberservacao') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
