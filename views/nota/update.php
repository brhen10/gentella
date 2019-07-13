<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nota */

$this->title = 'Alterar Atividade Avaliativa';
$this->params['breadcrumbs'][] = ['label' => 'Notas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idnota, 'url' => ['view', 'id' => $model->idnota]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayAlunos' => $arrayAlunos
    ]) ?>

</div>
