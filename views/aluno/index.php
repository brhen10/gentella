<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlunoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alunos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

   <p>
        <?= Html::a(Yii::t('app', 'Create Aluno'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php
    /*
 <p>

        <?= Html::button('Cadastrar Aluno', ['value' => Url::to('index.php?r=aluno/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>
    */
  /*  

    Modal::begin([
        'header' => '<h4>Alunos</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";
    Modal::end();
    */
    ?>

    <?php Pjax::begin(); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new app\models\AlunoSearch();
                    $searchModel->idaluno = $model->idaluno;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_itensAluno', [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                    ]);
                }
            ],
            'nome',

                ['label' => 'fotoLink',
                     'attribute' => 'fotoLink',
                     'format' => 'html',
                     'value' => function($model){
                        return yii\bootstrap\Html::img($model->fotoLink, ['width'=>'50', 'class'=>'img-circle']);
                    }
                ],
            'periodoSerie',
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
                        return Html::a('<span class="fa fa-wrench"></span>Alterar', $url, [
                                    'title' => Yii::t('app', 'Update'),
                                    'class' => 'btn btn-info btn-xs',
                                    'data-confirm' => 'Deseja realmente alterar alguma informação',
                                    'data-method' => 'post'
                                   
                ]);
            },
                            'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-wrench"></span>Excluir', $url, [
                                    'title' => Yii::t('app', 'Remove'),
                                    'class' => 'btn btn-danger btn-xs',
                                    'data-method' => 'post'
                                   
                ]);
            },
        ],
                        ],
                            
                            
                    ],
                
            ]);
            ?>
<?php Pjax::end(); ?></div>
</div>
