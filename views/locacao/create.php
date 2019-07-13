<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Locacao */

$this->title = Yii::t('app', 'Create Locacao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listLivros' => $listLivros,
          'listAlunos' => $listAlunos,
           'listReserva' => $listReserva,
    ]) ?>

</div>
