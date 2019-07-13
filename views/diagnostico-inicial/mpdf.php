<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Turma_infantil;
use yii\grid\GridView;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Título da página</title>
    <meta charset="utf-8">
  </head>
  <body>
      <p style="text-align:center;" ><img style="text-align: center;" src="/var/www/html/basic/web/img/breno.jpg" width="100px" height="100px" /></p>
   <div align="center">
   		<h3 style="line-height: 10%" align="center">ESTADO DO RIO GRANDE DO NORTE</h3>
   		<h3 style="line-height: 10%" align="center">PREFEITURA MUNICIPAL DE ACARI</h3>
   		<h3 style="line-height: 10%" align="center">SECRETARIA MUNICIPAL DE EDUCAÇÃO E CULTURA</h3>
   		<h3 style="line-height: 10%" align="center">ESCOLA MUNICIPAL PROFESSORA PORFÍRIA PIRES</h3>
   		<h3 style="line-height: 10%" align="center">EDUCAÇÃO INFANTIL, ENSINO FUNDAMENTAL E EJA</h3>
   		<h4 style="line-height: 10%" align="center">Rua: Desembargador Silvino Bezerra - 98 – Bairro Petrópolis, ACARI - RN</h4>
   </div>
   <br />
   <div align="center"> 
   		<h1 style="letter-spacing: 4px;" align="center"><b>Diagnóstico Inicial da Turma</b></h1>
   </div>
   <br />
   <div>
   	<?php echo $model->diagnostico;?>	
   </div>
   <br />
   <div align="right">
   		<p align="center">Acari/RN, <?php
            $timestamp = mktime(date("H") - 3, date("i"), date("s"), date("m"), date("d"), date("Y"));
            $data_hora = gmdate("d/m/Y, H:i:s", $timestamp);
            echo $data_hora;
            ?></p>
   	</div>
   	<br />
   	<div align="center">
   		<p style="line-height: 10%" align="center"><?php echo $model->professor->nome?>
		<p style="line-height: 10%" align="center"><b>Professor(a) responsável</b></p>
		
</p>
   	</div>
  </body>
</html>