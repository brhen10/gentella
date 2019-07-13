<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Relatorio_item */

$this->title = Yii::t('app', 'Update Relatorio Item: {nameAttribute}', [
    'nameAttribute' => $model->idrelatorio_item,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relatorio Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idrelatorio_item, 'url' => ['view', 'id' => $model->idrelatorio_item]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="relatorio-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
