<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Relatorio_item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relatorio-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'relatorio')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tipo_relatorio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relatorio_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
