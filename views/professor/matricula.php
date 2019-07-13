<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'SIGAE - Matricula Professor';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="matricula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
          echo $form->field($model, 'disciplinasForm')->widget(Select2::classname(), [
            'data' => $disciplinas,
            'options' => ['placeholder' => 'Selecione as disciplinas ...', 'multiple' => true],
            'pluginOptions' => [
                'tags' => true,
                'tokenSeparators' => [',', ' ']
            ],
            ])->label('Lista de Disciplinas');  
       
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Matricular' : 'Atualizar Matricula', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
