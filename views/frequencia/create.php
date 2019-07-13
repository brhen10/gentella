<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Frequencia */

$this->title = 'Cadastrar Aula';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frequencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayAlunos' => $arrayAlunos
    ]) ?>

</div>
