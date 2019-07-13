<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Classificacao */

$this->title = Yii::t('app', 'Create Classificacao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Classificacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classificacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
