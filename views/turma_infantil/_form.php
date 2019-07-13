<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Turma_item;
use app\models\Model;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
/* @var $this yii\web\View */
/* @var $model app\models\Turma_infantil */
/* @var $form yii\widgets\ActiveForm */


$form = ActiveForm::begin(['id' => 'dynamic-form', 'type'=> kartik\form\ActiveForm::TYPE_VERTICAL]);

    echo FormGrid::widget([
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
        'rows'=>[
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações da Turma</small></legend>',
                'attributes'=>[       // 2 column layout
                    'serie'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Informe a Série...']],
                    'nome'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Informe a Série...']],                 
                    ],
                ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Outras Informações</small></legend>',
                'attributes'=>[       // 1 column layout
                    'observacao'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações adicionais...']],
                ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações Escolares</small></legend>',
                'attributes'=>[       // 2 column layout
                    
                    'bimestre1inicio'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\date\DatePicker', 
                        'hint'=>'(dd/mm/yyyy)'
                    ],
                   'bimestre2inicio'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\date\DatePicker', 
                        'hint'=>'(dd/mm/yyyy)'
                    ],
                    'bimestre3inicio'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\date\DatePicker', 
                        'hint'=>'(dd/mm/yyyy)'
                    ],
                    'bimestre4inicio'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\date\DatePicker', 
                        'hint'=>'(dd/mm/yyyy)'
                    ],
               ]
            ], 
            
            [
                'contentBefore'=>'<legend class="text-info"><small>Dias Letivos</small></legend>',
                'attributes'=>[       // 1 column layout
                    'diasLetivosPrevistos'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Previsão...']],
                    'diasLetivosCumpridos'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Cumpridos...']],

                    ]
            ],
           ]
    ]);
    ?>
    
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> Adicionar alunos na turma - Educação Infantil</h4></div>
            <div class="panel-body">
                <?php
                DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 30, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsTurma_item[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'aluno_id',
                    ],
                ]);
                ?>

                <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsTurma_item as $i => $modelTurma_item): ?>
                        <div class="item panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Alunos</h3>
                                <div class="pull-right">
                                    <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Adicionar Aluno</button>
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i>Excluir Aluno</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (!$modelTurma_item->isNewRecord) {
                                    echo Html::activeHiddenInput($modelTurma_item, "[{$i}]idturma_item");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <?= $form->field($modelTurma_item, "[{$i}]aluno_id")->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Aluno::find()->all(), 'idaluno', 'nome'), ['prompt' => 'Adicione o aluno...']) ?>
                                    </div>
                                </div><!-- .row -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
                <?php DynamicFormWidget::end(); ?>
            </div> 
        </div> 
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div>