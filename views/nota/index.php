<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atividades Avaliativas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idnota',
            'data',
            'nota',
            'bimestre',
            'tipo',
            // 'idmatricula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
