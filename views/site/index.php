<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\Event;
use app\models\Reserva;
$this->title = 'SIGAE';
?>
<div class="site-index">
    <div class="col-sm-4 text-center">
         <img src="img/logo.png" height="80" width="80" class="img-circle" >
        <br />
    </div>
   
        <div class="col-sm-4 text-center">
        <h5 style="text-align:center;"> Escola Municipal Professora Porfíria Pires</h5>
        <h6 style="text-align:center;"> Rua: Silvino Bezerra, Acari/RN - Petrópolis</h6>
        <h6 style="text-align:center;"> Telefone: 999999999 / 4444444444</h1>
       
    
    </div>
     <div class="col-sm-4 text-center">
           <?php
                    //$img = '@web/img/alun.png' ;
                $img = '@web/img/mat2.png';
                echo Html::a(yii\bootstrap\Html::img($img, ['class'=>'img-fluid']), ['aluno/create']);
                ?>
        <br />
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
        <h4 align="center">Calendário Acadêmico</h4>
      <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'options' => [
        'lang' => 'pt-br',
        
         
        //... more options to be defined here!
      ],
        
        'events'=> $events,
  )); ?>
    </div>
     <br><br><br>
   
    <div class="row">
        <div class="col-sm-3 text-center">
        <h4 align="center">Calendário Acadêmico</h4>
        <?php
        $img1 = '@web/img/calendario.png';
            echo Html::a(Html::img($img1), ['event/index']);
            echo Html::a('Visualizar eventos', ['event/index'], ['class' => 'btn btn-success']);
        ?>
    </div>
    <div class="col-sm-3 text-center">
        <h4 align="center">Registrar uma Turma</h4>
        <?php
        $img2 = '@web/img/turma.png';
            echo Html::a(Html::img($img2), ['turma_infantil/index']);
            echo Html::a('Turmas Cadastradas', ['turma_infantil/home'], ['class' => 'btn btn-success']);
        ?>
    <p>
    </p>
    </div>
        <div class="col-sm-3 text-center">
            <h4 align="center">Cadastrar Professor</h4>
            <?php
        $img3 = '@web/img/professor.png';
            echo Html::a(Html::img($img3), ['professor/index']);
            echo Html::a('Professor Cadastrados', ['professor/index'], ['class' => 'btn btn-success']);

    ?>
        </div>
        <div class="col-sm-3 text-center">
            <h4 align="center">Matricular Aluno</h4>
            <?php
        $img4 = '@web/img/alun.png';
            echo Html::a(Html::img($img4), ['aluno/index']);
            echo Html::a('Alunos Matriculados', ['aluno/home'], ['class' => 'btn btn-success']);

    ?>
        </div>
    </div>
     <div class="row">
        <div class="col-sm-3 text-center">
        <h4 align="center">Relatório dos Alunos</h4>
        <?php
        $img5 = '@web/img/relatorio.png';
            echo Html::a(Html::img($img5), ['relatorio/index']);
            echo Html::a('Relatorios dos Alunos', ['relatorio/index'], ['class' => 'btn btn-success']);

        ?>
    </div>
   
   
        <div class="col-sm-3 text-center">
        <h4 align="center">Projetos Escolares</h4>
        <?php
        $img6 = '@web/img/projeto.png';
            echo Html::a(Html::img($img6), ['projeto/index']);
            echo Html::a('Projetos Escolares', ['projeto/index'], ['class' => 'btn btn-success']);

        ?>
    </div>

        <div class="col-sm-3 text-center">
        <h4 align="center">Tombamento ou Transferência </h4>
        <?php
        $img7 = '@web/img/tombo.png';
            echo Html::a(Html::img($img7), ['livro_controle/index']);
            echo Html::a('Tombamento ou Transferência', ['livro_controle/index'], ['class' => 'btn btn-success']);

        ?>
    </div>
                <div class="col-sm-3 text-center">
        <h4 align="center">Disciplinas </h4>
        <?php
        $img8 = '@web/img/disciplina.png';
            echo Html::a(Html::img($img8), ['disciplina/index']);
            echo Html::a('Disciplinas', ['disciplina/index'], ['class' => 'btn btn-success']);

        ?>
    </div>
    </div>
   <div class="row">
    <div class="col-sm-3 text-center">
        <h4 align="center">Documentos Oficiais </h4>
        <?php
        $img10 = '@web/img/ofi.png';
            echo Html::a(Html::img($img10), ['documento_oficial/index']);
            echo Html::a('Documentos', ['documento_oficial/index'], ['class' => 'btn btn-success']);

        ?>
    </div>
     <div class="col-sm-3 text-center">
        <h4 align="center">Biblioteca Escolar </h4>
        <?php
        $img9 = '@web/img/Bi.png';
            echo Html::a(Html::img($img9), ['locacao/home']);
            echo Html::a('Biblioteca', ['locacao/home'], ['class' => 'btn btn-success']);

        ?>
    </div>
     </div>
      </div>
  