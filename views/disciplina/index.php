<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Disciplinas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

     <p>
        <?= Html::a(Yii::t('app', 'Create Disciplina'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     <?php
     /* // esse paragrafo é fora desse php caso use o modal 
     <p>

        <?= Html::button('Cadastrar Disciplina', ['value'=>Url::to('index.php?r=disciplina/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>
        Modal::begin([
            'header' => '<h4>Disciplinas</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
    */
    ?>
    
     <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'iddisciplina',
            'nome',
            'cargaHoraria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
