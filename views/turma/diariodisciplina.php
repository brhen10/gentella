<?php

use yii\helpers\Html;

$this->title = 'SIGAE - Diário';
$this->params['breadcrumbs'][] = ['label' => "Diário " . $modelTurma->nome, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br />
<div class="container">
	<div class="row">
		<table class="table table-striped">
	        <thead>
	          <tr>
	            <th>Série</th>
	            <th>Nome</th>
	            <th>Inicio 1º Bimestre</th>
	            <th>Inicio 2º Bimestre</th>
	            <th>Inicio 3º Bimestre</th>
	            <th>Inicio 4º Bimestre</th>
	            <th>Dias Letivos Cumpridos</th>
	            <th>Dias Letivos Previstos</th>
	          </tr>
	        </thead>
	        <tbody>
			  <tr>
			  	<th><?= $modelTurma->serie ?></th>
			  	<th><?= $modelTurma->nome ?></th>
			  	<th><?= $modelTurma->bimestre1inicio ?></th>
			  	<th><?= $modelTurma->bimestre2inicio ?></th>
			  	<th><?= $modelTurma->bimestre3inicio ?></th>
			  	<th><?= $modelTurma->bimestre4inicio ?></th>
			  	<th><?= $modelTurma->diasLetivosCumpridos ?></th>
			  	<th><?= $modelTurma->diasLetivosCumpridos ?></th>
			  </tr>
	        </tbody>
	    </table>
	</div>
	<?= Html::a(Yii::t('app', 'Cadastrar Aula'), ['/frequencia/create', 'idturma' => $modelTurma->idturma], ['class' => 'btn btn-success']) ?>
	<?= Html::a(Yii::t('app', 'Aulas Cadastradas'), ['/frequencia/index', 'idturma' => $modelTurma->idturma], ['class' => 'btn btn-info']) ?>
	<?= Html::a(Yii::t('app', 'Cadastrar Atividade Avaliativa'), ['/nota/create'], ['class' => 'btn btn-primary']) ?>
	<div class="row">
	    <table class="table table-striped">
	        <thead>
	          <tr>
	            <th>Nome</th>
	            <th>Frequência</th>
	            <th>Nota 1º Bimestre</th>
	            <th>Nota 2º Bimestre</th>
	            <th>Nota 3º Bimestre</th>
	            <th>Nota 4º Bimestre</th>
	          </tr>
	        </thead>
	        <tbody>
	        <?php foreach($listaAlunos as $aluno) { ?>
	          <tr>
	            <td><?= $aluno['nome'] ?></td>
	            <th>4</th>
	            <th></th>
	            <th></th>
	            <th></th>
	            <th></th>
	          </tr>
	        <?php } ?>
	        </tbody>
	    </table>
	</div>
</div>
