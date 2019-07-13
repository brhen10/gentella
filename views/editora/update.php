<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Editora */

$this->title = Yii::t('app', 'Alterar Editora: ' . $model->ideditora, [
    'nameAttribute' => '' . $model->ideditora,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Editoras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ideditora, 'url' => ['view', 'id' => $model->ideditora]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="editora-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
