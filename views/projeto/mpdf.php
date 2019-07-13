<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Projeto;
use yii\grid\GridView;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Título da página</title>
    <meta charset="utf-8">
  </head>
  <body>
   <div>
   <p style="text-align:center;"><img src="img/TIMBRE.png" alt="..." class="img-circle profile_img"></p>
        <br />
   </div>
    	
   <br />
   <div align="center"> 
   		<h1 style="letter-spacing: 4px;"><b><u><?php echo $model->tema?></u></b></h1>
   </div>
   <br />
   <div>
   		<p>Declaro para os devidos fins, que, AQUI O PHP COMO O NOME DO ALUNO nascido(a) em AQUI O PHP COM A DATA DE NASCIMENTO DO ALUNO, natural de AQUI O PHP COM LOCAL DE NASCIMENTO DO ALUNO, filho(a) de PHP COM O NOME DO PAI E PHP COM O NOME DA MAE.</p>
   		<br />
   		<p>DENTRO DOS PARENTESES COLOCAR O PHP COM O MOTIVO DA TRANSEFERENCIA</p>
   		<p>(   ) É aluno (a) regularmente matriculado na Educação Infantil – Pré –Escolar NÍVEL IV no ano de 2017.</p>
   		<p>(   ) É aluno (a) regularmente matriculado (a) na educação Infantil – Pré Escolar e solicitou transferência com direito a matricular-se no NÍVEL V em 2017.</p>
   		<p>(   ) É aluno (a) regularmente matriculado (a) e está freqüentando até a presente data o 3º ano do Ensino Fundamental.</p>
   		<p>(   ) Solicitou, nesta data, sua transferência com direito a matricular-se no 1º ano do Ensino Médio da Educação de Jovens e Adultos.</p>
   		<p>(   ) É aluno (a) regularmente matriculado (a) e está freqüentando até a presente data o 8º anos da Educação de Jovens e Adultos.</p>
   		<p>(   ) Solicitou, nesta data, sua transferência, com direito a matricular-se no 1º ano do Ensino Fundamental.</p>

   		<h5 align="center"><u>OBS.: Essa declaração só é válida sem rasura e tendo somente um dos parênteses assinalado. Sua documentação será entregue no prazo máximo de 30 dias.</u></h5>
   		<br />
   </div>
   <br />
   <div align="right">
   		<p>aqui o PHP COM CIDADE, DATA E HORA</p>
   	</div>
   	<br />
   	<div align="center">
   		<p style="line-height: 10%">Janaine karine de Araújo Silva
		<p style="line-height: 10%"><b>Gestora</b></p>
		<p style="line-height: 10%">Port. 033/2017</p>
</p>
   	</div>
  </body>
</html>
