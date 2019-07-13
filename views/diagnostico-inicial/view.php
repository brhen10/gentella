<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiagnosticoInicial */

$this->title = $model->iddiagnosticoInicial;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnostico Inicials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-inicial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->iddiagnosticoInicial], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->iddiagnosticoInicial], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Ver Diagnóstico'), ['creatempdf', 'id' => $model->iddiagnosticoInicial], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'iddiagnosticoInicial',
            //'turma_id',
            //'professor_id',
            'diagnostico:ntext',
           // 'anoLetivo',
        ],
    ]) ?>

</div>
