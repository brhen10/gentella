<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TurmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Turmas Infantils');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-index">

     <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

   <p>
        <?= Html::a(Yii::t('app', 'Create Turma Infantil'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        Modal::begin([
            'header' => '<h4>Turmas Infantis</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    
     <?php Pjax::begin(); ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            [
           'class' => 'kartik\grid\ExpandRowColumn', 
            'value' => function($model, $key, $index, $column){
                return GridView::ROW_COLLAPSED;
            }, 
             'detail' => function ($model, $key, $index, $column){
                $searchModel = new app\models\Turma_itemSearch();
                $searchModel->turma_id = $model->idturmainfantil;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                
                return Yii::$app->controller->renderPartial('_itensTurma',[
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
             }
             ],
                    

          //  'idturma',
                       [
                      'header' => 'Série',
                      'attribute' => 'serie'
             
            ],
          
            'nome',
                       [
                      'header' => 'Observação',
                      'attribute' =>  'observacao'
             
            ],
        //    'bimestre1inicio',
            //'bimestre2inicio',
            //'bimestre3inicio',
            //'bimestre4inicio',
            //'diasLetivosPrevistos',
            //'diasLetivosCumpridos',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:260px;'],
                'header' => '||-------AÇÃO-------||',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    //view button
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-search"></span>Ver Alunos', $url, [
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