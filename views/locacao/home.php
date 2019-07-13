<?php

use yii\helpers\Html;

$this->title = 'SIGAE - Aluno';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locacao'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br />
<div class="container">
	<div class="row">
       <div id = "myCarousel" class = "carousel slide" align="center">
   
   <!-- Carousel indicators -->
   <ol class = "carousel-indicators">
      <li data-target = "#myCarousel" data-slide-to = "0" class = "active"></li>
      <li data-target = "#myCarousel" data-slide-to = "1"></li>
      <li data-target = "#myCarousel" data-slide-to = "2"></li>
   </ol>   
   
   <!-- Carousel items -->
   <div class = "carousel-inner">
      <div class = "item active">
         <img src = "img/acervo.png" class="img-fluid">
         <div class = "carousel-caption">É muito importante manter o acervo atualizado</div>
      </div>
      
      <div class = "item">
        <img src = "img/livro1.jpg" class="img-fluid">
         <div class = "carousel-caption">"Pensamentos"</div>
      </div>
      
      <div class = "item">
      <img src = "img/livro2.jpg" class="img-fluid">
         <div class = "carousel-caption">"A importância da Leitura"</div>
      </div>
   </div>
   
   <!-- Carousel nav --> 
   <a class = "carousel-control left" href = "#myCarousel" data-slide = "prev">&lsaquo;</a>
   <a class = "carousel-control right" href = "#myCarousel" data-slide = "next">&rsaquo;</a>
</div> 
		<?php 
			foreach ($livros as $livro) {
		?>
			<div class="col-xs-6 col-sm-3">
                            <h3 class="text-center"> 
                                <br> <?php echo $livro['titulo'];?> <br></h3>
				<p align="center">
                                <?php
				$img = ($livro->fotoLink)?($livro->fotoLink):('@web/img/disciplina.png');
                      echo Html::a(yii\bootstrap\Html::img($img, ['width'=>'100', 'class'=>'img-circle']), ['locacao/view', 'id' => $livro['idlivro']]);
                    ?>
                                    </p>
			</div>
		<?php
			}
		?>
	</div>
</div>
