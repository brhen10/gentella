<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatriculaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matriculas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Matricula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idmatricula',
            // 'nota1',
            // 'nota2',
            // 'nota3',
            // 'nota4',
             'media',
            // 'faltas',
             'status',
            // 'observacao:ntext',
            'idaluno',
            'idturma',
            // 'iddisciplina',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
