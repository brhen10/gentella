<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Relatorio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relatorio-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($modelRelatorio, 'turma_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Turma_infantil::find()->all(), 'idturmainfantil', 'serie'), ['prompt' => 'Informe a Turma']) ?>

    <?= $form->field($modelRelatorio, 'aluno_id')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Aluno::find()->all(), 'idaluno', 'nome'),['prompt' => 'Informe o aluno']) ?>

    <div class="row">
        
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Relatórios</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsRelatorio_item[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'tipo_relatorio',
                    'relatorio',
                    
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsRelatorio_item as $i => $modelRelatorio_item): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Relatório</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelRelatorio_item->isNewRecord) {
                                echo Html::activeHiddenInput($modelRelatorio_item, "[{$i}]idrelatorio_item");
                            }
                        ?>
                        <div class="row">
                                                        <div class="col-sm-12">
                                <?= $form->field($modelRelatorio_item, "[{$i}]tipo_relatorio")->dropDownList(['Parcial'=>'Relatório Parcial','Conclusivo'=>'Relatório Anual Conclusivo'], ['prompt' => 'Informe o tipo do relatório']) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($modelRelatorio_item, "[{$i}]relatorio")->textarea(['maxlength' => true]) ?>
                            </div>
                           
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  
</div>




