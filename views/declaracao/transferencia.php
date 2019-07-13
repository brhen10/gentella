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
			<img src="img/transferencia.png"/>
		</div>
		<div class="conteudo">
			<p>Declaramos para os devidos fins que, <?= $modelAluno['nome'] ?>, filho de, <?= $modelAluno['nomePai']  ?> e <?= $modelAluno['nomeMae']  ?>, está devidamente matriculado nesta Unidade de Ensino.</p>
		</div>
		<div class="rodape">
			<img src="img/rodape.png"/>
		</div>
	</div>
        
</div>