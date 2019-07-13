<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TurmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'SIGAE - Turmas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-index">

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idturma',
          //  'serie',
            //'nome',
             [
             'header'=> '<h4 align="center">OBSERVAÇÕES</h4>', 
             'attribute' => 'observacao',
             'value' => 'observacao'
                        ],
         //   'observacao:ntext',

           
        ],
    ]); ?>
</div>
