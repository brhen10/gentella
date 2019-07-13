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
                'contentBefore'=>'<legend class="text-info"><small>Informações Gerais</small></legend>',
                'attributes'=>[       // 2 column layout
                    'nome_aluno'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome Completo do Aluno...']],
                    'data_transferencia'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\date\DatePicker', 'hint'=>'(dd/mm/yyyy)'],
                    'nivel_ano'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escolaridade do Aluno...']],

                ]
            ],
           
            [
                'contentBefore'=>'<legend class="text-info"><small>Local de Destino da Transferência</small></legend>',
                'attributes'=>[       // 2 column layout
                    'destino'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Escola de Destino...']],
                    'responsavel_transferencia'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome do Profissional Responsável...']],
                ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Responsável</small></legend>',
                'attributes'=>[       // 2 column layout
                    'pais_responsavel'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome do Responsável do Aluno...']],
                ]
            ], 
            
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações Adicionais</small></legend>',
                'attributes'=>[       // 1 column layout
                    'observacao'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações adicionais...']],
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

