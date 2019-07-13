<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Documento_oficial */

$this->title = $model->iddocumento_oficial;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documento Oficials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-oficial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->iddocumento_oficial], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->iddocumento_oficial], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a(Yii::t('app', '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Documento Oficial - PDF'), ['creatempdf', 'id' => $model->iddocumento_oficial], ['class' => 'btn btn-info']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddocumento_oficial',
            'numero',
            'destino',
            'data',
            'descrição',
            'documento_oficial:ntext',
            'pessoa_destino',
            'tipo',
        ],
    ]) ?>

</div>
