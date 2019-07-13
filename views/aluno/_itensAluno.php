<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Turma_itemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Aluno Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-item-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
     
        'columns' => [
            
             ['class' => 'yii\grid\SerialColumn'],
             [
             'header'=> '<h4 align="center">ANO LETIVO</h4>',
             'attribute' => 'anoLetivo',
             'value' => 'anoLetivo',
             ],
              [
             'header'=> '<h4 align="center">DATA DE NASCIMENTO</h4>',
             'attribute' => 'dataNascimento',
             'value' => 'dataNascimento',
             ],
             [
             'header'=> '<h4 align="center">DATA DE MATRÍCULA</h4>',
             'attribute' => 'dataMatricula',
             'value' => 'dataMatricula',
             ],
               [
             'header'=> '<h4 align="center">NOME DA MÃE</h4>',
             'attribute' => 'nomeMae',
             'value' => 'nomeMae',
             ],
               [
             'header'=> '<h4 align="center">NOME DO PAI</h4>',
             'attribute' => 'nomePai',
             'value' => 'nomePai',
             ],
            [
             'header'=> '<h4 align="center">SEXO</h4>',
             'attribute' => 'sexo',
             'value' => 'sexo',
             ],
            
                      
        ],
    ]); ?>

    
</div>