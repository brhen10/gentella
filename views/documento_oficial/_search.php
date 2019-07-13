<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Documento_oficialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-oficial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'iddocumento_oficial') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'destino') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'descrição') ?>

    <?php // echo $form->field($model, 'documento_oficial') ?>

    <?php // echo $form->field($model, 'pessoa_destino') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
