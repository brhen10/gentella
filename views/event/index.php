<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Event');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>  

     <p>
        <?= Html::button('Cadastrar Eventos', ['value'=>Url::to('index.php?r=event/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>    
     <?php
        Modal::begin([
            'header' => '<h4>Eventos</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
    
     <?php// Pjax::begin(); ?>
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'searchModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'titulo',
            'dataEvento',
            
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
<?php // Pjax::end(); ?></div>