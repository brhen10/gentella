<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */

$this->title = Yii::t('app', 'Alterar {modelClass}: ', [
    'modelClass' => 'Disciplina',
]) . $model->nome;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disciplinas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->iddisciplina]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="disciplina-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
