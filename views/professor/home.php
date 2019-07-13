<?php

use yii\helpers\Html;

$this->title = 'SIGAE - Turmas';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br />
<div class="container">
	<div class="row">
            <h2 class="container" align="center">| Turmas do Ensino Fundamental de 6ª ao 9º ano |</h2>
		<?php 
			foreach ($turmas as $turma) {
		?>
			<div class="col-lg-4 item-turma">
				<?php
					$img = '@web/img/logo-turma.png' ;
                    echo Html::a(Html::img($img), ['turma/diario', 'id' => $turma['idturma']]);
                    echo $turma['nome'];
                ?>
			</div>
		<?php
			}
		?>
	</div>
</div>
