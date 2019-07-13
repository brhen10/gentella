<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */

$this->title = Yii::t('app', 'Update Professor: {nameAttribute}', [
    'nameAttribute' => $model->idprofessor,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprofessor, 'url' => ['view', 'id' => $model->idprofessor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="professor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
