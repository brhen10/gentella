<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DiagnosticoInicial */

$this->title = Yii::t('app', 'Create Diagnostico Inicial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnostico Inicials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-inicial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
