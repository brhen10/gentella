<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LocacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Locacaos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locacao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idlocacao',
             [
                'attribute' => 'aluno_id',
                'value' => 'aluno.nome'
            ],
            [
                'attribute' => 'livro_id',
                'value' => 'livro.titulo'
            ],
            [
                'attribute' => 'reserva_id',
                'value' => 'aluno.nome'
            ],
           
       //     'datahoraDevolucao',
            'observacao',

            [
             'class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:260px;'],
                'header' => '||---------------------AÇÃO--------------------||',
                'template' => '{view} {update} {delete}',
                'buttons' => [

                    //view button
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-search"></span> Visualizar', $url, [
                                    'title' => Yii::t('app', 'View'),
                                    'class' => 'btn btn-warning btn-xs',
                        ]);
                    },
                            
                              'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-wrench"></span>Devolução', $url, [
                                    'title' => Yii::t('app', 'Update'),
                                    'class' => 'btn btn-info btn-xs',
                                    'data-method' => 'post'
                                   
                ]);
            },
                            'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-wrench"></span>Excluir', $url, [
                                    'title' => Yii::t('app', 'Remove'),
                                    'class' => 'btn btn-danger btn-xs',
                                    'data-confirm' => 'Deseja Realmente excluir esse registro!!!',
                                    'data-method' => 'post'
                                   
                ]);
            },
        ],
                        ],
                            
                            
                    ],
                
            ]);
            ?>
<?php Pjax::end(); ?></div>