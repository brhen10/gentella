<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Documento_oficial */

$this->title = Yii::t('app', 'Alterar Documento Oficial: ' . $model->iddocumento_oficial, [
    'nameAttribute' => '' . $model->iddocumento_oficial,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documento Oficials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddocumento_oficial, 'url' => ['view', 'id' => $model->iddocumento_oficial]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="documento-oficial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
