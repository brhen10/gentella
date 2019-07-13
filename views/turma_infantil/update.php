<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Turma_infantil */

$this->title = Yii::t('app', 'Update Turma Infantil: {nameAttribute}', [
    'nameAttribute' => $model->idturmainfantil,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turma Infantils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idturmainfantil, 'url' => ['view', 'id' => $model->idturmainfantil]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="turma-infantil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsTurma_item' => $modelsTurma_item,
    ]) ?>

</div>
