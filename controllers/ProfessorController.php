<?php

namespace app\controllers;

use Yii;
use app\models\Professor;
use app\models\Turma;
use app\models\MatriculaProfessor;
use app\models\Disciplina;
use app\models\ProfessorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ProfessorController implements the CRUD actions for Professor model.
 */
class ProfessorController extends Controller
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

    public function actionHome()
    {
        $turmas = Turma::find()->all();

        return $this->render('home', [
            'turmas' => $turmas,
        ]);
    
    }

    public function actionIndex()
    {
        $searchModel = new ProfessorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Professor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $listaDisciplinas = [];

        $listaMatriculasProfessor = MatriculaProfessor::find()->where(['idprofessor' => $id])->all(); 

        foreach ($listaMatriculasProfessor as $matriculaProfessor) {
            $dis = Disciplina::find()->where(['iddisciplina' => $matriculaProfessor['disciplina_iddisciplina']])->all();

            array_push($listaDisciplinas, $dis);                         
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'listaDisciplinas' => $listaDisciplinas
        ]);
    }

    public function actionCreate()
    {
        $model = new Professor();
        $disciplinas = ArrayHelper::map(Disciplina::find()->orderBy('nome')->asArray()->all(), 'iddisciplina', 'nome');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          
            $model->flag = UploadedFile::getInstance($model, 'flag');
            
             if ($model->upload()) {
            return $this->redirect(['view', 'id' => $model->idprofessor]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
            $modelMatriculaProfessor = new MatriculaProfessor();
            $modelMatriculaProfessor->idprofessor = $model->idprofessor;
            $modelMatriculaProfessor->disciplina_iddisciplina = $model->disciplinasForm;
            $modelMatriculaProfessor->save();

            return $this->redirect(['view', 'id' => $model->idprofessor]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'disciplinas' => $disciplinas
            ]);
        }
    }

    public function actionMatricula($id)
    {
        $model = $this->findModel($id);
        $disciplinas = ArrayHelper::map(Disciplina::find()->orderBy('nome')->asArray()->all(), 'iddisciplina', 'nome');
        $listaDisciplinas = [];
        
            $model->flag = UploadedFile::getInstance($model, 'flag');

            if ($model->upload()) {
                return $this->redirect(['view', 'id' => $model->idprofessor]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
                     
        if ($model->load(Yii::$app->request->post())) {

            foreach ($model->disciplinasForm as $disciplina) {

                $modelMatriculaProfessor = new MatriculaProfessor();

                $modelMatriculaProfessor->idprofessor = $model->idprofessor;
                $modelMatriculaProfessor->disciplina_iddisciplina = $disciplina;
                
                $modelMatriculaProfessor->save();
            }

            $listaMatriculasProfessor = MatriculaProfessor::find()->where(['idprofessor' => $model->idprofessor])->all(); 

            foreach ($listaMatriculasProfessor as $matriculaProfessor) {
                $dis = Disciplina::find()->where(['iddisciplina' => $matriculaProfessor['disciplina_iddisciplina']])->all();

                array_push($listaDisciplinas, $dis);                         
            }

            return $this->render('view', [
                'model' => $this->findModel($id),
                'listaDisciplinas' => $listaDisciplinas
            ]);
            
        } else {
            return $this->render('matricula', [
                'model' => $model,
                'disciplinas' => $disciplinas
            ]);
        }
    }


    

    /**
     * Updates an existing Professor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idprofessor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Professor model.
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
     * Finds the Professor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Professor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Professor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}