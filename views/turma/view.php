<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turmas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Matricular Aluno(s)'), ['/matricula/create', 'id' => $model->idturma], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idturma], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idturma], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Tem certeza que gostaria de excluir essa turma?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idturma',
            'serie',
            'nome',
            'bimestre1inicio',
            'bimestre2inicio',
            'bimestre3inicio',
            'bimestre4inicio',
            'diasLetivosPrevistos',
            'diasLetivosCumpridos',
            'observacao:ntext',
        ],
    ]) ?>

    <h3>Disciplinas dessa turma:</h3>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Disciplina</th>
            <th>Carga Horária</th>
          </tr>
        </thead>
        <tbody>
        <?php 

        //var_dump($listaDisciplinas); die();

        for ($i=0; $i < count($listaDisciplinas); $i++) { 
            //for($j=0; $j < count($listaDisciplinas[$i]); $j++) { ?>
          <tr>
            <td><?= $listaDisciplinas[$i][0]['nome'] ?></td>
            <td><?= $listaDisciplinas[$i][0]['cargaHoraria'] ?></td>
            <td>
            <?= Html::a('Remover', ['disciplina/delete', 'id' => $listaDisciplinas[$i][0]['iddisciplina']], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Tem certeza que gostaria de apagar essa disciplina?'),
                    'method' => 'post',
                ],
            ]) ?>
            </td>
          </tr>
        <?php 
        //} 
        }?>    
        
        </tbody>
    </table>

    <h3>Alunos dessa turma:</h3>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Série</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($listaAlunos as $aluno) { ?>
          <tr>
            <td><?= $aluno['nome'] ?></td>
            <td><?= $aluno['periodoSerie'] ?></td>
            <td>
            <?= Html::a('Cancelar Matricula', ['matricula/cancelar', 'id' => $aluno['idaluno']], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Tem certeza que gostaria de cancelar a matricula desse aluno?'),
                    'method' => 'post',
                ],
            ]) ?>
            </td>
          </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
