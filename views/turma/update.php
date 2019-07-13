<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */

$this->title = Yii::t('app', 'Alterar {modelClass}: ', [
    'modelClass' => 'Turma',
]) . $model->nome;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turmas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->idturma]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="turma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mensagem' => $mensagem,
        'disciplinas' => $disciplinas,
    ]) ?>

</div>
