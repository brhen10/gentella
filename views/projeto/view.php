<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Projeto */

$this->title = $model->idprojeto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projetos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idprojeto], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idprojeto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
        <?= Html::a(Yii::t('app', '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Imprimir Projeto - PDF'), ['creatempdf', 'id' => $model->idprojeto], ['class' => 'btn btn-info']) ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idprojeto',
            'nome',
            'tema',
            'data_projeto',
            'justificativa:ntext',
            'objetivo_geral',
            'objetivo_especifico:ntext',
            'desenvolvimento:ntext',
            'culminancia',
            'avaliacao',
            'oberservacao:ntext',
            [
                'attribute' => 'fotoLink',
                'format' => 'image',
                'value' => $model->getFotoPath(),
            ],
        ],
    ]) ?>

</div>
