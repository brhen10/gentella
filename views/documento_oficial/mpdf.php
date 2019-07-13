<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\documento_oficial;
use yii\grid\GridView;
?>

<!DOCTYPE html>
<html>
    <body>
        <p style="text-align:center;"><img src="img/TIMBRE.png" alt="..." class="img-circle profile_img"></p>
        <br />
        


<table align="center" width="100%" border="0">

   <tr><td align="center"><?php echo $model->tipo; ?> : <?php echo $model->numero; ?></td> <td align="right"> Data da Emissão:  <?php echo $model->data; ?> </td> </tr>
</table>
<br><br><br>
<table align="center" width="100%" border="0">
   <tr>
    <td align="left"> Destino: <?php echo $model->destino;?></td></tr>
</table>
<table align="center" width="100%" border="0">
   <tr>
    <td align="left"> Ao Senhor: <?php echo $model->pessoa_destino;?></td></tr>
</table>
    <br><br>
         <table align="center" width="100%" border="0">
   <tr>
    <td align="left"> <h3>Assunto: <?php echo $model->descrição;?></h3></td></tr>
</table>
<div style="text-align:justify;">
        <h3>
            <?php echo $model->documento_oficial; ?>  
        </h3>   
    </div>
    <br><br><br><br>    
    
    <div style="text-align:justify;">
        <p >
        
        </p>
        <div style="text-align:right;">
<br><br><br><br><br><br><br><br><br><br><br><br><br/>
            <?php
            echo 'Emitido no dia: ';
            //$timestamp = mktime(date("H") - 3, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);

           // $data_hora = gmdate("d/m/Y");
            //echo $data_hora;
            ?>
            <?php
            $info[] = Yii::t('app', ', Emitido via web - ');

            if (isset(Yii::$app->user->identity->login))
                $info[] = ucfirst(\Yii::$app->user->identity->login);
            echo implode(' pelo login - ', $info);
            ?>
            <div style="text-align:right;">
                <?php

                function UrlAtual() {
                    $dominio = $_SERVER['HTTP_HOST'];
                    $url = "http://" . $dominio . $_SERVER['REQUEST_URI'];
                    return $url;
                }

                echo "No endereço eletrônico: " . UrlAtual();
                ?>
            </div>
        </div>

    </div>

</body>
</html>