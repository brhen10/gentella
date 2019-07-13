<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Turma_item */

$this->title = Yii::t('app', 'Update Turma Item: {nameAttribute}', [
    'nameAttribute' => $model->idturma_item,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turma Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idturma_item, 'url' => ['view', 'id' => $model->idturma_item]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="turma-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
