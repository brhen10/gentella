<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;



class TurmaController extends ActiveController
{
	public $modelClass = 'app\models\Turma';

	public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator']['formats']['application/json'] = \yii\web\Response::FORMAT_JSON;
        
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        unset($actions['delete']);

	    $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
                    'prepareDataProvider' => function () {
                		$model = new $this->modelClass;
                		$query = $model::find();
                		$dataProvider = new ActiveDataProvider([
                            'query' => $query,
                            'pagination' => false,
                        ]);
                return $dataProvider;
            },
        ];

	    return $actions;
	}

    public function actionCreate()
    {
        $model = new Turma();
        $mensagem = ""; //Informa ao usuário mensagens de erro na view
        $disciplinas = ArrayHelper::map(Disciplina::find()->orderBy('nome')->asArray()->all(), 'iddisciplina', 'nome');
        $listaDisciplinas = [];

        if ($model->load(Yii::$app->request->post())) {
            
            //Inicia a transação:
            $transaction = Yii::$app->db->beginTransaction();
            try{
                if ($model->save()) {

                    foreach ($model->disciplinasForm as $iddisciplina) {
                        //$disciplina = Disciplina::find()->where(['iddisciplina' => $iddisciplina])->one();
                        
                        $modelDisciplinaTurma = new DisciplinaTurma();
                        $modelDisciplinaTurma->turma_idturma = $model->idturma;
                        $modelDisciplinaTurma->disciplina_iddisciplina = $iddisciplina;
                        
                        if (!$modelDisciplinaTurma->save()) {
                            $mensagem = "<b>Problema ao salvar as disciplinas!</b>";
                            $transaction->rollBack(); //desfaz alterações no BD
                        }
                    }

                    $transaction->commit();
                    
                    $listaDisciplinasTurma = DisciplinaTurma::find()->where(['turma_idturma' => $model->idturma])->all(); 

                    foreach ($listaDisciplinasTurma as $iddisciplina) {
                        $dis = Disciplina::find()->where(['iddisciplina' => $iddisciplina])->all();

                        array_push($listaDisciplinas, $dis);                         
                    }

                    $listaAlunos = Yii::$app->db->createCommand('SELECT a.idaluno, a.nome, a.periodoSerie FROM matricula as m, aluno as a 
                            WHERE m.idaluno = a.idaluno AND m.idturma=:idturma AND m.status <> :matriculaCancelada')
                            ->bindValue(':idturma', $model->idturma)
                            ->bindValue(':matriculaCancelada', 2)->queryAll();

                    //var_dump($listaDisciplinas); die();
                    return $this->render(['/turma/view'], [
                        'id' => $model->idturma,
                        'listaDisciplinas' => $listaDisciplinas,
                        'listaAlunos' => $listaAlunos
                    ]);

                } else {
                    $mensagem = "Não foi possível salvar a turma";
                    $transaction->rollBack(); //desfaz alterações no BD
                }
            } catch (\Exception $exception) {
                $transaction->rollBack();
                $mensagem = "Ocorreu uma falha inesperada ao tentar salvar a turma";
            }
            
        } else {
            return $this->render(['turma/create'], [
                'model' => $model,
                'disciplinas' => $disciplinas,
                'mensagem' => $mensagem
            ]);
        }
    }


}
