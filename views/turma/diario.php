<?php

use yii\helpers\Html;

$this->title = 'SIGAE - Turmas';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professores'), 'url' => ['index']];
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
			  	<th><?= $model->serie ?></th>
			  	<th><?= $model->nome ?></th>
			  	<th><?= $model->bimestre1inicio ?></th>
			  	<th><?= $model->bimestre2inicio ?></th>
			  	<th><?= $model->bimestre3inicio ?></th>
			  	<th><?= $model->bimestre4inicio ?></th>
			  	<th><?= $model->diasLetivosCumpridos ?></th>
			  	<th><?= $model->diasLetivosCumpridos ?></th>
			  </tr>
	        </tbody>
	    </table>
	</div>
	<div class="row">
		<?php 
			foreach ($listaDisciplinas as $disciplina) {
		?>
			<div class="col-lg-6 item-disciplina">
				<?php
					//var_dump($disciplina); die();
					$img = '@web/img/logo-disciplina.png' ;
                    echo Html::a(Html::img($img), ['turma/diariodisciplina', 
                    	'iddisciplina' => $disciplina[0]['iddisciplina'],
                    	'idturma' => $model->idturma
                    ]);
                    echo $disciplina[0]['nome'];
                ?>
			</div>
		<?php
			}
		?>
	</div>
</div>
