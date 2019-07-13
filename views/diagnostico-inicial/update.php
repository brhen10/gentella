<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiagnosticoInicial */

$this->title = Yii::t('app', 'Alterar Diagnostico Inicial: {nameAttribute}', [
    'nameAttribute' => $model->iddiagnosticoInicial,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnostico Inicials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddiagnosticoInicial, 'url' => ['view', 'id' => $model->iddiagnosticoInicial]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="diagnostico-inicial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
