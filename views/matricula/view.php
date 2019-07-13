<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Matricula */

$this->title = $model->idmatricula;
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idmatricula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idmatricula], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que gostaria de excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idmatricula',
            'nota1',
            'nota2',
            'nota3',
            'nota4',
            'media',
            'faltas',
            'status',
            'observacao:ntext',
            'idaluno',
            'idturma',
            'iddisciplina',
        ],
    ]) ?>

</div>
