<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Turma_infantil */

$this->title = Yii::t('app', 'Create Turma Infantil');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turma Infantils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-infantil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsTurma_item' => $modelsTurma_item,
    ]) ?>

</div>
