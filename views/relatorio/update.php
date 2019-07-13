<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelRelatorio app\models\Relatorio */

$this->title = Yii::t('app', 'Update Relatorio: {nameAttribute}', [
    'nameAttribute' => $modelRelatorio->idrelatorio,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relatorios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelRelatorio->idrelatorio, 'url' => ['view', 'id' => $modelRelatorio->idrelatorio]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="relatorio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
       'modelRelatorio' => $modelRelatorio,
        'modelsRelatorio_item' => $modelsRelatorio_item,
         'listarAlunos' => $listarAlunos,
        'listarTurmas' => $listarTurmas_infantil,
    ]) ?>

</div>
