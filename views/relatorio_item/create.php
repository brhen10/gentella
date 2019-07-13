<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Relatorio_item */

$this->title = Yii::t('app', 'Create Relatorio Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relatorio Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relatorio-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
