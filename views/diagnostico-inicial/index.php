<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DiagnosticoInicialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Diagnostico Inicials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-inicial-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Diagnostico Inicial'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'iddiagnosticoInicial',
         //   'turma_id',
            [
                'attribute' => 'turma_id',
             'value' => 'turma.serie'
            ],
            [
             'attribute' => 'professor_id',
             'value' => 'professor.nome'
            ],
            'diagnostico:ntext',
            'anoLetivo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
