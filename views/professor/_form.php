<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Professor */
/* @var $form yii\widgets\ActiveForm */
$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);

    echo FormGrid::widget([
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
        'rows'=>[
            [
                'contentBefore'=>'<legend class="text-info"><small>Dados do Professor</small></legend>',
                'attributes'=>[       // 2 column layout
                    'nome'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome Completo...']],
                    'dataCadastro'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\date\DatePicker', 'hint'=>'(dd/mm/yyyy)'],
                   'formacao'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nível do Professor...']],
                ]
            ],
            [
                'attributes'=>[       // 2 column layout
                   
                    'endereco'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Endereço Completo...']],
                    'bairro'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
                    'cidade'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
                    
                    ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações complementares</small></legend>',
                'attributes'=>[       // 2 column layout
                    'email'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'email pra contato...']],
                    'portaria'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome do Pai...']],
                     'turno'=>[   // radio list
                        'type'=>Form::INPUT_RADIO_LIST, 
                        'items'=>['Matutino'=>'Matutino', 'Vespertino'=>'Vespertino', 'Noturno'=>'Noturno'], 
                        'options'=>['inline'=>true]
                    ],
                ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Foto do Aluno</small></legend>',
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
