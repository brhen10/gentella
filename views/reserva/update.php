<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reserva */

$this->title = Yii::t('app', 'Update Reserva: ' . $model->idreserva, [
    'nameAttribute' => '' . $model->idreserva,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idreserva, 'url' => ['view', 'id' => $model->idreserva]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="reserva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
          'listLivros' => $listLivros,
          'listAlunos' => $listAlunos,
    ]) ?>

</div>
