<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Classificacao */

$this->title = Yii::t('app', 'Alterar Classificacao: ' . $model->idclassificacao, [
    'nameAttribute' => '' . $model->idclassificacao,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Classificacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idclassificacao, 'url' => ['view', 'id' => $model->idclassificacao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="classificacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
