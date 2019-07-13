<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DisciplinaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'iddisciplina') ?>

    <?= $form->field($model, 'nome') ?>

    <?php // $form->field($model, 'cargaHoraria') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Procurar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Limpar'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
