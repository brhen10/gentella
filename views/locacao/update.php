<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locacao */

$this->title = Yii::t('app', 'Update Locacao: ' . $model->idlocacao, [
    'nameAttribute' => '' . $model->idlocacao,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idlocacao, 'url' => ['view', 'id' => $model->idlocacao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="locacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'listLivros' => $listLivros,
          'listAlunos' => $listAlunos,
           'listReserva' => $listReserva,
    ]) ?>

</div>
