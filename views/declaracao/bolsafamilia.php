<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "DECLARAÇÃO";
?>

<div class="escolaridade-index">
	<div class="container">
		<div class="col-lg-4">
			<img src="img/cabecalho.png"/>
			<img src="img/declaracao.png"/>
		</div>
		<div class="conteudo">
			<p>Declaramos para os devidos fins que, <strong> <?= $modelAluno['nome'] ?> </strong>, filho de,<strong> <?= $modelAluno['nomeMae']  ?> </strong>, residente em <?= $modelAluno['endereco'] ?>, está regularmente matriculado no <?= $modelAluno['periodoSerie'] ?> do Ensino Fundamental nesta instituição de ensino.</p>
		</div>
		<div class="rodape">
			<img src="img/rodape.png"/>
		</div>
	</div>
        
</div>