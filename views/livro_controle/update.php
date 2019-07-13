<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Livro_controle */

$this->title = Yii::t('app', 'Update Livro Controle: {nameAttribute}', [
    'nameAttribute' => $model->idlivro_controle,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Livro Controles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idlivro_controle, 'url' => ['view', 'id' => $model->idlivro_controle]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="livro-controle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
