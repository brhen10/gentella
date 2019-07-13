<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Turma_itemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Turma Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-item-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idturma_item',
          [
             'header'=> '<h4 align="center">ALUNOS MATRICULADOS</h4>', 
             'attribute' => 'aluno_id',
             'value' => 'aluno.nome'
                        ],
           // 'turma_id',
        ],
    ]); ?>
    
</div>