<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Usuario',
]) . $model->idusuario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idusuario, 'url' => ['view', 'id' => $model->idusuario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listaPapeis'=>$listaPapeis
    ]) ?>

</div>
