<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TurmaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'idturma') ?>

    <?= $form->field($model, 'serie') ?>

    <?php // $form->field($model, 'nome') ?>

    <?php // $form->field($model, 'observacao') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Pesquisar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Limpar'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
