<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Livro */

$this->title = Yii::t('app', 'Update Livro: ' . $model->idlivro, [
    'nameAttribute' => '' . $model->idlivro,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Livros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idlivro, 'url' => ['view', 'id' => $model->idlivro]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="livro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listAutor' => $listAutor,
        'listEditora' => $listEditora,
    ]) ?>

</div>
