<?php

namespace app\commands;
use Yii;
use yii\console\Controller;


class HelloController extends Controller {

 
    public function actionIndex($message = 'hello world') {
        echo $message . "\n";
    }

    public function actionPermissoes() {
        $auth = Yii::$app->authManager;
        // add "crudEmployees" permission
        $crudRendAlunos = $auth->createPermission('crudRendAlunos');
        $crudRendAlunos->description = 'CRUD de Rendimento de Alunos';
        $auth->add($crudRendAlunos);

        // add "crudUsuarios" permission
        $crudUsuarios = $auth->createPermission('crudUsuarios');
        $crudUsuarios->description = 'CRUD de Usuarios';
        $auth->add($crudUsuarios);

        // add "crudTitles" permission
        $crudTitles = $auth->createPermission('crudTitles');
        $crudTitles->description = 'CRUD de Titles';
        $auth->add($crudTitles);
        
        //CRIANDO O PAPEL PROFESSOR
        $professor = $auth->createRole('professor');
        $auth-> add($professor);
        $auth-> addChild($professor, $crudRendAlunos);
        
        //CRIANDO O PAPEL DE FUNCIONÁRIO
        $funcionario = $auth->createRole('funcionario');
        $auth-> add($funcionario);
        $auth-> addChild($funcionario, $crudTitles);
        
        //CRIANDO O PAPEL DE ALUNO
        $aluno = $auth->createRole('aluno');
        $auth-> add($aluno);
        $auth-> addChild($aluno, $crudTitles);
    
        //CRIANDO O PAPEL DE Diretor
        $diretor = $auth->createRole('diretor');
        $auth-> add($diretor);
        $auth-> addChild($diretor, $crudUsuarios, $crudTitles, $crudRendAlunos);

        //CRIANDO PAPEL DE ADMINISTRADOR
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $professor);
        $auth->addChild($admin, $diretor);
        $auth->addChild($admin, $funcionario);
        $auth->addChild($admin, $aluno);
    }

}