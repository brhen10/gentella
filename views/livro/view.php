<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use \app\models\Reserva;

/* @var $this yii\web\View */
/* @var $model app\models\Livro */

$this->title = $model->idlivro;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Livros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idlivro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idlivro], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
           <?= Html::a('Reservar Livro', ['reserva/create', 'id' => $model->idlivro], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Locar Livro', ['locacao/create', 'id' => $model->idlivro], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idlivro',
            'autor.nome',
            'editora.nome',
            'classificacao.classificacao',
            'titulo',
            'ano',
            'status',
            'resumo',
            'observação',
           // 'fotoLink',
            [
                'attribute' => 'fotoLink',
                'format' => 'image',
                'value' => $model->getFotoPath(),
            ],
        ],
    ])
    ?>
     
</div>

</div>
