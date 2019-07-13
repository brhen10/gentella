<?php

namespace app\controllers;

use Yii;
use app\models\Aluno;
use app\models\Matricula;
use app\models\Turma;
use app\models\MatriculaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MatriculaController implements the CRUD actions for Matricula model.
 */
class MatriculaController extends Controller
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
     * Lists all Matricula models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MatriculaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Matricula model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Matricula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Matricula();
        $alunos = ArrayHelper::map(Aluno::find()->orderBy('nome')->asArray()->all(), 'idaluno', 'nome');
        $turma = Turma::find()->where(['idturma' => $id])->one();

        $model->idturma = $id;
        
        if ($model->load(Yii::$app->request->post())) {
            
            foreach ($model->alunosForm as $idaluno) {
                    
                $modelMatricula = new Matricula();

                $alunos = Aluno::find()->where(['idaluno' => $idaluno])->one();
                
                $modelMatricula->idaluno = $idaluno;
                $modelMatricula->idturma = $model->idturma;
                $modelMatricula->status = Matricula::MATRICULADO;

                $alunos->periodoSerie = $turma->nome;
                $alunos->save();
                        
                $modelMatricula->save(); 
            }

            return $this->redirect(['turma/view', 'id' => $modelMatricula->idturma]);

        } else {
            return $this->render('create', [
                'model' => $model,
                'alunos' => $alunos,
                'turma' => $turma
            ]);
        }
    }

    public function actionCancelar($id)
    {
        $model = Matricula::find()->where(['idaluno' => $id])->one();
        $model->status = Matricula::MATRICULA_CANCELADA;

        if ($model->save()) {
            return $this->redirect(['turma/view', 'id' => $model->idturma]);
        } else {
            throw new NotFoundHttpException('Impossivel cancelar Matricula.');   
        }
    }

    /**
     * Updates an existing Matricula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idmatricula]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Matricula model.
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
     * Finds the Matricula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Matricula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Matricula::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
