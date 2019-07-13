<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper;
use app\models\Turma;
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
                'contentBefore'=>'<legend class="text-info"><small>Informações do Aluno</small></legend>',
                'attributes'=>[       // 2 column layout
                    'nome'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome Completo...']],
                    'dataNascimento'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\date\DatePicker', 'hint'=>'(dd/mm/yyyy)'],
                    'sexo'=>[   // radio list
                        'type'=>Form::INPUT_RADIO_LIST, 
                        'items'=>['Masculino'=>'Masculino', 'Feminino'=>'Feminino'], 
                        'options'=>['inline'=>true]
                    ],
                ]
            ],
            [
                'attributes'=>[       // 2 column layout
                    'telefone'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Telefone...']],
                    'endereco'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Endereço Completo...']],
                    'naturalidade'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Informe a local de nascimento...']],
                    'nacionalidade'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'País...']],
                    
                    ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações dos Pais</small></legend>',
                'attributes'=>[       // 2 column layout
                    'nomeMae'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome da Mãe...']],
                    'nomePai'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nome do Pai...']],
                ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações Escolares</small></legend>',
                'attributes'=>[       // 2 column layout
                    'dataMatricula'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\date\DatePicker', 
                        'hint'=>'(dd/mm/yyyy)'
                    ],
                    'periodoSerie'=>[
                        'type' => Form::INPUT_DROPDOWN_LIST, 
                        'items'=>ArrayHelper::map(Turma::find()->orderBy('nome')->asArray()->all(), 'idturma', 'nome')
                    ],
                    'anoLetivo'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Ano Letivo...']],
                ]
            ], 
            
            [
                'contentBefore'=>'<legend class="text-info"><small>Outras Informações</small></legend>',
                'attributes'=>[       // 1 column layout
                    'observacao'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações adicionais...']],
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
