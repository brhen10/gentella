<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */
/* @var $form yii\widgets\ActiveForm */

if (isset($mensagem) && !empty($mensagem)) {

    ?>

    <div class="alert alert-danger">
        <?= $mensagem ?>
    </div>
    <?php

}
?>
<div class="turma-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]) ?>

    <?= $form->field($model, 'serie')->dropDownList([
        '6º' => '6º',
        '7º' => '7º',
        '8º' => '8º',
        '9º' => '9º',]); ?>

    <?php
          echo $form->field($model, 'disciplinasForm')->widget(Select2::classname(), [
            'data' => $disciplinas,
            'options' => [
                'id'=>'disciplinaslista',
                'placeholder' => 'Selecione as Disciplinas ...'
            ],
            'pluginOptions' => [
                //'tags' => true
                'multiple' => true,
            ],
            ])->label('Lista de Disciplinas');  
    ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diasLetivosPrevistos')->textInput() ?>

    <?= $form->field($model, 'diasLetivosCumpridos')->textInput() ?>

    <?= $form->field($model, 'bimestre1inicio')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'ajaxConversion'=>false,
        'options' => [

        'pluginOptions' => [
        'autoclose' => true
        ]
        ],
        'displayFormat' => 'dd/MM/yyyy',
        'language'=>'pt',
    ]); ?>

    <?= $form->field($model, 'bimestre2inicio')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'ajaxConversion'=>false,
        'options' => [

        'pluginOptions' => [
        'autoclose' => true
        ]
        ],
        'displayFormat' => 'dd/MM/yyyy',
        'language'=>'pt',
    ]); ?>

    <?= $form->field($model, 'bimestre3inicio')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'ajaxConversion'=>false,
        'options' => [

        'pluginOptions' => [
        'autoclose' => true
        ]
        ],
        'displayFormat' => 'dd/MM/yyyy',
        'language'=>'pt',
    ]); ?>

    <?= $form->field($model, 'bimestre4inicio')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'ajaxConversion'=>false,
        'options' => [

        'pluginOptions' => [
        'autoclose' => true
        ]
        ],
        'displayFormat' => 'dd/MM/yyyy',
        'language'=>'pt',
    ]); ?>


    <?= $form->field($model, 'observacao')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Cadastrar') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
