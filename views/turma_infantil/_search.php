<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Turma_infantilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-infantil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

   

    <?= $form->field($model, 'serie') ?>

    

    <?php // echo $form->field($model, 'bimestre2inicio') ?>

    <?php // echo $form->field($model, 'bimestre3inicio') ?>

    <?php // echo $form->field($model, 'bimestre4inicio') ?>

    <?php // echo $form->field($model, 'diasLetivosPrevistos') ?>

    <?php // echo $form->field($model, 'diasLetivosCumpridos') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
