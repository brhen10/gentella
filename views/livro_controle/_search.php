<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Livro_controleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livro-controle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idlivro_controle') ?>

    <?= $form->field($model, 'nome_aluno') ?>

    <?= $form->field($model, 'nivel_ano') ?>

    <?= $form->field($model, 'data_transferencia') ?>

    <?= $form->field($model, 'destino') ?>

    <?php // echo $form->field($model, 'responsavel_transferencia') ?>

    <?php // echo $form->field($model, 'pais_responsavel') ?>

    <?php // echo $form->field($model, 'observacao') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
