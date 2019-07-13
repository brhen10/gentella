<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matricula */

$this->title = 'Update Matricula: ' . $model->idmatricula;
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmatricula, 'url' => ['view', 'id' => $model->idmatricula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matricula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
