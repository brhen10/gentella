<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */

$this->title = $model->idprofessor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idprofessor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idprofessor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idprofessor',
            'nome',
            'formacao',
            'endereco',
            'bairro',
            'cidade',
            'email:email',
            'turno',
            'portaria',
            'dataCadastro',
            'fotoLink',
            [
                'attribute' => 'fotoLink',
                'format' => 'image',
                'value' => $model->getFotoPath(),
            ],
            
        ],
    ]) ?>

</div>