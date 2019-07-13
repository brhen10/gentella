 <?php

use yii\helpers\Html;
use app\models\Event;
use yii\bootstrap\Modal;

$this->title = 'SIGAE - Aluno';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aluno'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br />
<div class="container">
	<!--<div class="row">-->
            <h2 class="container" align="center"> Calendário Acadêmico </h2>
            
            <?php
        Modal::begin([
            'header' => '<h4>Eventos</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
		
			<!--<div class="col-lg-12 item-aluno">-->
                          
   <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'options' => [
        'lang' => 'pt-br',
        
         
        //... more options to be defined here!
      ],
        
        'events'=> $events,
  )); ?>
	<!--</div>-->
</div>

