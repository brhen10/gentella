<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EditoraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="editora-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ideditora') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cidade') ?>

    <?= $form->field($model, 'endereco') ?>

    <?= $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'observação') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
