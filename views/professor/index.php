<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfessorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Professors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-index">
 <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    
 <p>
        <?= Html::a(Yii::t('app', 'Create Professor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   
     <?php
     /*
        Modal::begin([
            'header' => '<h4>Professor</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
        */
    ?>
    
     <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'idprofessor',
            'nome',
            'formacao',
            'endereco',
            'bairro',
            //'cidade',
            //'email:email',
            //'turno',
            //'portaria',
            //'dataCadastro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
