<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Frequencia */

$this->title = 'Update Frequencia: ' . $model->idfrequencia;
$this->params['breadcrumbs'][] = ['label' => 'Frequencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfrequencia, 'url' => ['view', 'id' => $model->idfrequencia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frequencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
      
    ]) ?>

</div>
