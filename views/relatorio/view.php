<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Relatorio */

$this->title = $model->idrelatorio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relatorios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relatorio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idrelatorio], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idrelatorio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>
<?=
   DetailView::widget([
        'model' => $model,
        'attributes' => [
           'idrelatorio',
            'aluno.nome',
            'turma_infantil.serie'
                   ],
    ])
    ?>
    <div>
        <h2 align="center" >Relatórios do Aluno</h2>
        <?=
        GridView::widget([
            'dataProvider' => $provider1,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                  [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '|| ___AÇÃO___ ||',
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>  Visualizar', Url::to(['relatorio_item/view', 'id' => $key]));
                        }
                    ]
                ],
                //'idrelatorio_item',
                'tipo_relatorio',
                'relatorio:ntext',
                //'relatorio_id',
              
               ]
        ]);
        ?>
    </div>


</div>
