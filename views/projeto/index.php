<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjetoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Projetos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-index">

    <h1><?= Html::encode($this->title) ?></h1>
  
  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
  <p>
        <?= Html::a(Yii::t('app', 'Cadastrar Projeto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   
     <?php
        Modal::begin([
            'header' => '<h4>Projetos</h4>',
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

//            'idprojeto',
            'nome',
            'tema',
           // 'data_projeto',
            //'justificativa:ntext',
            //'objetivo_geral',
            //'objetivo_especifico:ntext',
            //'desenvolvimento:ntext',
            //'culminancia',
            //'avaliacao',
            //'oberservacao:ntext',

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
                                    'data-confirm' => 'Deseja realmente excluir esse registro',
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

