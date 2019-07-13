<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Frequencia */

$this->title = 'Aula ' . $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Frequencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frequencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->idfrequencia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->idfrequencia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir essa aula?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idfrequencia',
            'data',
            //'presenca',
            'bimestre',
            'conteudo:ntext',
        ],
    ]) ?>

</div>

<div class="row">
    <table class="table table-striped">
        <h1>Alunos Presentes</h1>
        <thead>
            <tr>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($alunosPresentes as $aluno) { ?>
              <tr>
                <td><?= $aluno['nome'] ?></td>
              </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
