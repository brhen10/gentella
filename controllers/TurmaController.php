<?php

namespace app\controllers;

use Yii;
use app\models\Aluno;
use app\models\Disciplina;
use app\models\DisciplinaTurma;
use app\models\Turma;
use app\models\TurmaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * TurmaController implements the CRUD actions for Turma model.
 */
class TurmaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Turma models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TurmaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Turma model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        //$listaDisciplinas = Disciplina::find()->where(['turma_idturma' => $model->idturma])->all();
        $listaDisciplinas = [];

        $listaAlunos = Yii::$app->db->createCommand('SELECT a.idaluno, a.nome, a.periodoSerie FROM matricula as m, aluno as a 
                            WHERE m.idaluno = a.idaluno AND m.idturma=:idturma AND m.status <> :matriculaCancelada')
                            ->bindValue(':idturma', $model->idturma)
                            ->bindValue(':matriculaCancelada', 2)->queryAll();

        $listaDisciplinasTurma = DisciplinaTurma::find()->where(['turma_idturma' => $model->idturma])->all(); 

                    foreach ($listaDisciplinasTurma as $iddisciplina) {
                        $dis = Disciplina::find()->where(['iddisciplina' => $iddisciplina])->all();

                        array_push($listaDisciplinas, $dis);                         
                    }

        return $this->render('view', [
            'model' => $model,
            'listaDisciplinas' => $listaDisciplinas,
            'listaAlunos' => $listaAlunos
        ]);
    }

    public function actionDiario($id)
    {
        $model = $this->findModel($id);
        
        $listaDisciplinas = [];

        $listaDisciplinasTurma = DisciplinaTurma::find()->where(['turma_idturma' => $model->idturma])->all(); 

                    foreach ($listaDisciplinasTurma as $iddisciplina) {
                        $dis = Disciplina::find()->where(['iddisciplina' => $iddisciplina])->all();

                        array_push($listaDisciplinas, $dis);                         
                    }

        return $this->render('diario', [
            'model' => $model,
            'listaDisciplinas' => $listaDisciplinas
        ]);
    }

    public function actionDiariodisciplina($iddisciplina, $idturma)
    {
        $disciplina = Disciplina::find()->where(['iddisciplina' => $iddisciplina])->one(); 
        $modelTurma = $this->findModel($idturma);
       
        $listaAlunos = Yii::$app->db->createCommand('SELECT a.idaluno, a.nome, a.periodoSerie FROM matricula as m, aluno as a 
             WHERE m.idaluno = a.idaluno AND m.idturma=:idturma AND m.status <> :matriculaCancelada')
                ->bindValue(':idturma', $modelTurma->idturma)
                ->bindValue(':matriculaCancelada', 2)->queryAll();


        return $this->render('diariodisciplina', [
            'modelTurma' => $modelTurma,
            'listaAlunos' => $listaAlunos
        ]);
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
                    return $this->render(['view', 
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
            return $this->render('create', [
                'model' => $model,
                'disciplinas' => $disciplinas,
                'mensagem' => $mensagem
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $mensagem = ""; //Informa ao usuário mensagens de erro na view
        $disciplinas = ArrayHelper::map(Disciplina::find()->orderBy('nome')->asArray()->all(), 'iddisciplina', 'nome');
        
        $listaDisciplinas = [];

        if ($model->load(Yii::$app->request->post())) {

            //$listaDisciplinas = Disciplina::find()->where(['turma_idturma' => $model->idturma])->all();
            $listaDisciplinasTurma = DisciplinaTurma::find()->where(['turma_idturma' => $model->idturma])->all();
            $transaction = Yii::$app->db->beginTransaction();
            try{
                if ($model->save()) {

                    if (!empty($model->disciplinasForm)) {
                        
                        foreach ($model->disciplinasForm as $iddisciplina) {
                            $disciplinaTurma = DisciplinaTurma::find()->where(['disciplina_iddisciplina' => $iddisciplina])->one();
                            $disciplinaTurma->turma_idturma = $model->idturma;
                            
                            if (!$disciplinaTurma->save()) {
                                $mensagem = "<b>Problema ao salvar as disciplinas!</b>";
                                $transaction->rollBack(); //desfaz alterações no BD
                            }
                        }

                        $transaction->commit();

                        foreach ($listaDisciplinasTurma as $iddisciplina) {
                            $dis = Disciplina::find()->where(['iddisciplina' => $iddisciplina])->all();

                            array_push($listaDisciplinas, $dis);                         
                        }
                         

                        return $this->redirect(['view', 
                            'id' => $model->idturma,
                            'listaDisciplinas' => $listaDisciplinas,
                        ]);   
                    } else {
                        $transaction->commit();

                        return $this->redirect(['view', 
                            'id' => $model->idturma,
                            'listaDisciplinas' => $listaDisciplinas,
                        ]);
                    }

                } else {
                    $mensagem = "Não foi possível salvar a turma";
                    $transaction->rollBack(); //desfaz alterações no BD
                }
            } catch (\Exception $exception) {
                $transaction->rollBack();
                $mensagem = "Ocorreu uma falha inesperada ao tentar salvar a turma";
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'mensagem' => $mensagem,
                'disciplinas' => $disciplinas
            ]);
        }
    }

    /**
     * Deletes an existing Turma model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Turma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Turma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Turma::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
