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
                'contentBefore'=>'<legend class="text-info"><small>Informações da Editoras</small></legend>',
                'attributes'=>[       // 2 column layout
                    'nome'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome da Editora...']],
                    'telefone'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Informe o número do telefone...']],
                     'email'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'informe o email...']],
                   
                    ],
            ],
            [
                'attributes'=>[       // 2 column layout
                    'endereco'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Informe o endereço...']],
                    'bairro'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Informe o bairro...']],
                     'cidade'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'informe a cidade...']],
                    ]
            ],
           
               [
                'contentBefore'=>'<legend class="text-info"><small>Outras Informações</small></legend>',
                'attributes'=>[       // 1 column layout
                    'observação'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações adicionais...']],
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
