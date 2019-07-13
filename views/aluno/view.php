<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Aluno */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="aluno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idaluno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Declaração Escolaridade', ['declaracao/escolaridade', 'id' => $model->idaluno], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Declaração Transferência', ['declaracao/transferencia', 'id' => $model->idaluno], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Declaração Bolsa Familia', ['declaracao/bolsafamilia', 'id' => $model->idaluno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Declaração Carteira de Estudante', ['declaracao/carteiraestudante', 'id' => $model->idaluno], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->idaluno], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idaluno',
            'nome',
            'dataNascimento',
            'nomeMae',
            'nomePai',
            'sexo',
            
            'endereco',
            'telefone',
            'dataMatricula',
            'periodoSerie',
            'anoLetivo',
            'observacao:ntext',
            'naturalidade',
            'nacionalidade',
            //'fotoLink',
            [
                'attribute' => 'fotoLink',
                'format' => 'image',
                'value' => $model->getFotoPath(),
            ],
        ],
    ]) ?>
    <div>
         <h2 align="center" >Acompanhamento Individualizado - Turma da Educação Infantil</h2>
        <?= GridView::widget([
        'dataProvider' => $provider1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idturma_item',
             [
             'header' => 'Nome do Aluno',
             'attribute' => 'aluno_id',
             'value' => 'aluno.nome'
            ],
             [
             'header' => 'Turma Pertencente',
             'attribute' => 'turma_id',
             'value' => 'turma.serie'
            ],
          
            ],        
    ]); ?>
    </div>
     <div>
         <h2 align="center" >Acompanhamento Individualizado - Relatório emitido para o Aluno</h2>
        <?= GridView::widget([
        'dataProvider' => $aluno,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idrelatorio',
           [
                'attribute' => 'aluno_id',
                'value' => 'aluno.nome'
            ],
            [
                'attribute' => 'turma_id',
                'value' => 'turma_infantil.serie'
            ],

              [
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => '||-------AÇÃO-------||',
                                                'template' => '{view}',
                                                'buttons' => [
                                                    'view' => function($url, $modelRelatorio, $key) {
                                                        return Html::a('<span class="glyphicon glyphicon-list-alt"></span>  Ver Relatórios', Url::to(['relatorio/view', 'id' => $key]));
                                                    }
                                                        ]
                                            ],
                                        ],
                                    ]);
                                    ?>
    </div>
<div>
     <h2 align="center" >Acompanhamento Individualizado - Livros Locado pelo Aluno</h2>

      <?= GridView::widget([
        'dataProvider' => $livro,
       // 'searchModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
             [
                'attribute' => 'livro_id',
                'value' => 'livro.titulo'
            ],
            
              [
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => '||-------AÇÃO-------||',
                                                'template' => '{view}',
                                                'buttons' => [
                                                    'view' => function($url, $modelLivro, $key) {
                                                        return Html::a('<type="button" class="btn btn-info btn-xs"> Ver Livro', Url::to(['livro/view', 'id' => $key]));
                                                    }
                                                        ]
                                            ],
                                        ],
                                    ]);
                                    ?>