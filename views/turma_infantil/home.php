<?php

use yii\helpers\Html;

$this->title = 'SIGAE - Turmas Infantis';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turmas Infantis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br />
<div class="container">
	<div class="row">
            <h2 class="container" align="center"> Turmas do Ensino Infantil </h2>
            
		<?php 
			foreach ($turmas as $turma) {
		?>
			<div class="col-lg-6 item-turma">
                            <h3 class="text-center"><?php echo $turma['serie'];?></h3>
				<p align="center">
                                <?php
				$img = '@web/img/logo-turma.png' ;
                    echo Html::a(Html::img($img), ['turma_infantil/view', 'id' => $turma['idturmainfantil']]);
                
                    ?>
                                    </p>
			</div>
		<?php
			}
		?>
	</div>
</div>
