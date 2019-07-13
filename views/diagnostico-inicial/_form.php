<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiagnosticoInicial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnostico-inicial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'turma_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Turma_infantil::find()->all(), 'idturmainfantil', 'serie'), ['prompt' => 'Informe a turma...']) ?>
    
    <?= $form->field($model, 'professor_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Professor::find()->all(), 'idprofessor', 'nome'), ['prompt' => 'Identifique-se professor...']) ?>

    <?= $form->field($model, 'anoLetivo')->textInput() ?>

    <?= $form->field($model, 'diagnostico')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
