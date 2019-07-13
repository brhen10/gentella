<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Turma_item */

$this->title = Yii::t('app', 'Create Turma Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turma Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
