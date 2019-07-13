<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Documento_oficial */

$this->title = Yii::t('app', 'Create Documento Oficial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documento Oficials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-oficial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
