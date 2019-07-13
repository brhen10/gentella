<?php

use yii\helpers\Html;

$this->title = 'SIGAE - Aluno';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aluno'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br />
<div class="container">
	
	<p align= "center">

                <?php
				//$img = '@web/img/alun.png' ;
				$img = '@web/img/mat.png';
				echo Html::a(yii\bootstrap\Html::img($img, ['class'=>'img-fluid']), ['aluno/create']);
				?>

	</p>
	<div class="row">
   	
            <?php echo $this->renderAjax('_search', ['model' => $searchModel]); ?>
		<?php 
			foreach ($alunos as $aluno) {
		?>
			<div class="col-lg-3 item-aluno">
                            <h3 class="text-center"><?php echo $aluno['nome'];?> 
                                <br> <?php echo $aluno['nomeMae'];?> <br> <?php echo $aluno['dataNascimento'];?></h3>
				<p align="center">
                                <?php
				//$img = '@web/img/alun.png' ;
				$img = ($aluno->fotoLink)?($aluno->fotoLink):('@web/img/alun.png');
                    echo Html::a(yii\bootstrap\Html::img($img, ['width'=>'100', 'class'=>'img-circle']), ['aluno/view', 'id' => $aluno['idaluno']]);
                
                    ?>
                                    </p>
			</div>
		<?php
			}
		?>
	</div>
</div>
