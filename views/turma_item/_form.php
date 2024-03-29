<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Turma_item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aluno_id')->textInput() ?>

    <?= $form->field($model, 'turma_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
