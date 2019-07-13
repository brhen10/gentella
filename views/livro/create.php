<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Livro */

$this->title = Yii::t('app', 'Create Livro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Livros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listAutor' => $listAutor,
        'listEditora' => $listEditora,
    ]) ?>

</div>
