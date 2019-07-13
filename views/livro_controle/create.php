<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Livro_controle */

$this->title = Yii::t('app', 'Create Livro Controle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Livro Controles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livro-controle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
