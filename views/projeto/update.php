<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Projeto */

$this->title = Yii::t('app', 'Update Projeto: {nameAttribute}', [
    'nameAttribute' => $model->idprojeto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projetos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprojeto, 'url' => ['view', 'id' => $model->idprojeto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="projeto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
