<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper;
use app\models\Editora;
use app\models\Autor;
use app\models\Classificacao;
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
                'contentBefore'=>'<legend class="text-info"><small>Livros</small></legend>',
                'attributes'=>[       // 2 column layout
                    'autor_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 'items'=>ArrayHelper::map(Autor::find()->orderBy('nome')->asArray()->all(), 'idautor', 'nome')],
                    'editora_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 'items'=>ArrayHelper::map(Editora::find()->orderBy('nome')->asArray()->all(), 'ideditora', 'nome')],
                    ],
            ],
            [
                'attributes'=>[       // 2 column layout
                    'classificacao_id'=>['type'=>Form::INPUT_DROPDOWN_LIST, 'items'=>ArrayHelper::map(Classificacao::find()->orderBy('classificacao')->asArray()->all(), 'idclassificacao', 'classificacao')],
                    'titulo'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Informe o título...']],
                    'ano'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Ano de lançamento...']],
                    ]
            ],
            [
                'attributes'=>[       // 2 column layout
                    'resumo'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Breve resumo do livro...']],
                    
                ]
            ],
               [
                'contentBefore'=>'<legend class="text-info"><small>Outras Informações</small></legend>',
                'attributes'=>[       // 1 column layout
                    'observação'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Informações adicionais...']],
                ]
            ],
             [
                'attributes'=>[       // 2 column layout
                      'status'=>[   // radio list
                        'type'=>Form::INPUT_RADIO_LIST, 
                        'items'=>['Disponível'=>'Disponível', 'Alocado'=>'Alocado', 'Reservado' => 'Reservado'], 
                        'options'=>['inline'=>true]
                    ],
                    
                ]
            ],
            [
                'contentBefore'=>'<legend class="text-info"><small>Foto do livro</small></legend>',
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
