<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'aluno_id')->widget(Select2::classname(), [
        //      'initValueText' => $countryDesc, // set the initial display text
        'data' => $listAlunos,
        'options' => ['placeholder' => 'Busque por um Aluno ...'],
        'pluginOptions' => [
            'allowClear' => false,
            'minimumInputLength' => 3, //só busca depois que digitar 3 caracteres
            'language' => 'pt-BR',
        ],
    ]);
    ?>

     <?= $form->field($model, 'livro_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Livro::find()->all(), 'idlivro', 'resumo'), ['prompt' => '...']) ?>
     <?= $form->field($model, 'reserva_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Reserva::find()->all(), 'idreserva', 'livro_id'), ['prompt' => '...']) ?>
         <?php
    echo "Data do Projeto" . DatePicker::widget([
        'model' => $model,
        'attribute' => 'datahoraDevolucao',
        'options' => ['placeholder' => 'data ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>
    <?= $form->field($model, 'observacao')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic',
    ]) ?>
   
 <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
