<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocacaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locacao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idlocacao') ?>

    <?= $form->field($model, 'aluno_id') ?>

    <?= $form->field($model, 'livro_id') ?>

    <?= $form->field($model, 'reserva_id') ?>

    <?= $form->field($model, 'datahoraDevolucao') ?>

    <?php // echo $form->field($model, 'observacao') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
