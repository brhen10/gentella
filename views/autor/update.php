<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Autor */

$this->title = Yii::t('app', 'Alterar Autor: ' . $model->idautor, [
    'nameAttribute' => '' . $model->idautor,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Autors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idautor, 'url' => ['view', 'id' => $model->idautor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="autor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
