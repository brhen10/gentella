<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);

    echo FormGrid::widget([
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
        'rows'=>[
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações do Projeto</small></legend>',
                'attributes'=>[       // 2 column layout
                    'nome'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome Completo...']],
                    'data_projeto'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\date\DatePicker', 'hint'=>'(dd/mm/yyyy)'],                ]
            ],
            [
                'attributes'=>[       // 2 column layout
                    'tema'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
                    ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Justificativa</small></legend>',
                'attributes'=>[       // 1 column layout
                    'justificativa'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações adicionais...']],
                    
                ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Objetivos</small></legend>',
                'attributes'=>[       // 1 column layout
                    'objetivo_geral'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações adicionais...']],
                    'objetivo_especifico'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'...']],
                    
                ]
            ],
             [
                'contentBefore'=>'<legend class="text-info"><small>Desenvolvimento</small></legend>',
                'attributes'=>[       // 1 column layout
                    'desenvolvimento'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações...']],
                ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Outras Informações</small></legend>',
                'attributes'=>[       // 2 column layout
                    'culminancia'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
                    'avaliacao'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
                                 ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações Adicionais</small></legend>',
                'attributes'=>[       // 1 column layout
                    'oberservacao'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações adicionais...']],
                ]
            ],
             [
                'contentBefore'=>'<legend class="text-info"><small>Foto da Capa</small></legend>',
                'attributes'=>[       // 1 column layout
                    'flag'=>['type'=>Form::INPUT_FILE, 'options'=>['placeholder'=>'Informações adicionais...']],
                ]
            ],
            [
                'attributes'=>[       // 3 column layout
                    'actions'=>[    // embed raw HTML content
                        'type'=>Form::INPUT_RAW, 
                        'value'=>  '<div style="text-align: right; margin-top: 20px">' . 
                            Html::resetButton('Limpar', ['class'=>'btn btn-default']) . ' ' .
                            Html::submitButton('Cadastrar', ['class'=>'btn btn-primary']) . 
                            '</div>'
                    ],
                ],
            ],
        ]
    ]);
ActiveForm::end();

?>
