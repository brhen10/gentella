<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper;
use app\models\Turma;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Documento_oficial */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);

    echo FormGrid::widget([
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
        'rows'=>[
            [
                'contentBefore'=>'<legend class="text-info"><small>Documento Oficial</small></legend>',
                'attributes'=>[       // 2 column layout
                    'numero'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número de controle...']],
                    'data'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\date\DatePicker', 'hint'=>'(yyyy/mm/dd)'],
                    'destino'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Destino do documento - ORGÃO...'],
                   
                    ],
                ]
            ],
             [
                'attributes'=>[       // 2 column layout
                   'pessoa_destino'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Pessoa destina a receber o documento...']],
                   'tipo'=>[   // radio list
                        'type'=>Form::INPUT_RADIO_LIST, 
                        'items'=>['Ofício'=>'Ofício', 'Memorando'=>'Memorando', 'Requerimento'=>'Requerimento'], 
                        'options'=>['inline'=>true]]                   
                    ]
            ],
            [
                'attributes'=>[       // 2 column layout
                    'descrição'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Informe o assunto...']],
                   
                    ]
            ],
            [
                'attributes'=>[       // 2 column layout
                'documento_oficial'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Endereço Completo...']]                   
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
 
