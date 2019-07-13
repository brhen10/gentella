<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Turma_infantil */

$this->title = $model->idturmainfantil;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turma Infantils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-infantil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idturmainfantil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idturmainfantil], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
         
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idturmainfantil',
            'serie',
            'nome',
            'observacao:ntext',
            'bimestre1inicio',
            'bimestre2inicio',
            'bimestre3inicio',
            'bimestre4inicio',
            'diasLetivosPrevistos',
            'diasLetivosCumpridos',
        ],
    ]) ?>
 
 <h2 align="center" >Alunos matriculados na turma de educação infantil</h2>
      <p align="right"> 
       <?php $img3 = '@web/img/addAluno.png';?>
       <?= Html::a(Html::img($img3), ['update', 'id' => $model['idturmainfantil']]);
       ?>
          </p>
        <?= GridView::widget([
        'dataProvider' => $provider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idturma_item',
            [
             'attribute' => 'aluno_id',
             'value' => 'aluno.nome'
            ],

            
        ],
    ]); ?>
<div>
         <h2 align="center" >Diagnóstico Inicial da Turma</h2>
         <p align="right"><?php $img1 = '@web/img/diagnostico_1.png';
                $turma = $model->idturmainfantil;?> 
        <?= Html::a(Html::img($img1), ['diagnostico-inicial/create', 'id' => $turma['idturmainfantil']]);
       ?>
             </p>
        <?= GridView::widget([
        'dataProvider' => $provider1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idturma_item',
         [
             'attribute' => 'turma_id',
             'value' => 'turma.serie'
            ],
            [
             'attribute' => 'professor_id',
             'value' => 'professor.nome'
            ],
      
        'anoLetivo',
             [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '||-------AÇÃO-------||',
                        'template' => '{view}',
                        'buttons' => [
                            
                            'view' => function($url, $model, $key) {
                                return Html::a('<span class="fa fa-search"></span>Ver o Diagnóstico Inicial', Url::to(['diagnostico-inicial/view', 'id' => $key]));
                            }
                                ]
                            ],
                        ],
                    ]);
                    ?>
    </div>
</div>