<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Livro_controleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Livro Controles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livro-controle-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <p>
        <?= Html::button('Cadastrar Transferência', ['value'=>Url::to('index.php?r=livro_controle/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>
     <?php
        Modal::begin([
            'header' => '<h4>Transferências</h4>',
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

            'idlivro_controle',
            'nome_aluno',
            'nivel_ano',
            'data_transferencia',
            'destino',
            //'responsavel_transferencia',
            //'pais_responsavel',
            //'observacao:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
