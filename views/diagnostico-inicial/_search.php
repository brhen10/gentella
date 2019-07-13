<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiagnosticoInicialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnostico-inicial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'iddiagnosticoInicial') ?>

    <?= $form->field($model, 'turma_id') ?>

    <?= $form->field($model, 'professor_id') ?>

    <?= $form->field($model, 'diagnostico') ?>

    <?= $form->field($model, 'anoLetivo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
