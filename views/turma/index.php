<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TurmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'SIGAE - Turmas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

      
    <p>
        <?= Html::a(Yii::t('app', 'Create Turma'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     <?php
        Modal::begin([
            'header' => '<h4>Turmas</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    
     <?php Pjax::begin(); ?>    <?= GridView::widget([
         'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            [
           'class' => 'kartik\grid\ExpandRowColumn', 
            'value' => function($model, $key, $index, $column){
                return GridView::ROW_COLLAPSED;
            }, 
             'detail' => function ($model, $key, $index, $column){
                $searchModel = new app\models\TurmaSearch();
                $searchModel->idturma = $model->idturma;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                
                return Yii::$app->controller->renderPartial('_itensTurma',[
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
             }
             ],

            //'idturma',
            'serie',
            'nome',
            //'observacao:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>