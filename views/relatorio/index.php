<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RelatorioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Relatorios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relatorio-index">

    <h1><?= Html::encode($this->title) ?></h1>
   <p>
        <?= Html::button('Cadastrar Relatório', ['value'=>Url::to('index.php?r=relatorio/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>
     <?php
        Modal::begin([
            'header' => '<h4>Relatórios</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    
     <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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

              ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:260px;'],
                'header' => '||--------------------AÇÃO--------------------||',
                'template' => '{view} {update} {delete}',
                'buttons' => [

                    //view button
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-search"></span>Relatório', $url, [
                                    'title' => Yii::t('app', 'View'),
                                    'class' => 'btn btn-primary btn-xs',
                        ]);
                    },
                            
                              'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-wrench"></span>Alterar', $url, [
                                    'title' => Yii::t('app', 'Update'),
                                    'class' => 'btn btn-primary btn-xs',
                                   
                ]);
            },
        ],
                        ],
                            
                            
                    ],
                
            ]);
            ?>
    <?php Pjax::end(); ?>
</div>
