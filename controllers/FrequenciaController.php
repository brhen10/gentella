<?php

namespace app\controllers;

use Yii;
use app\models\Frequencia;
use app\models\Matricula;
use app\models\FrequenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Aluno;

/**
 * FrequenciaController implements the CRUD actions for Frequencia model.
 */
class FrequenciaController extends Controller
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
     * Lists all Frequencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrequenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Frequencia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $listaAlunos = Yii::$app->db->createCommand('SELECT m.idmatricula, a.nome FROM matricula as m, aluno as a 
            WHERE m.idaluno = a.idaluno AND m.idturma=:idturma AND m.status <> :matriculaCancelada')
                ->bindValue(':idturma', 29)
                ->bindValue(':matriculaCancelada', 2)->queryAll();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'alunosPresentes' => $listaAlunos
        ]);
    }

    /**
     * Creates a new Frequencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idturma)
    {
        $model = new Frequencia();
        $listaAlunos = Yii::$app->db->createCommand('SELECT m.idmatricula, a.nome FROM matricula as m, aluno as a 
            WHERE m.idaluno = a.idaluno AND m.idturma=:idturma AND m.status <> :matriculaCancelada')
                ->bindValue(':idturma', $idturma)
                ->bindValue(':matriculaCancelada', 2)->queryAll();

        $arrayAlunos = ArrayHelper::map($listaAlunos, 'idmatricula', 'nome');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            return $this->redirect(['view', 'id' => $model->idfrequencia]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'arrayAlunos' => $arrayAlunos
            ]);
        }
    }

    /**
     * Updates an existing Frequencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idfrequencia]);
        } else {
            return $this->render('update', [
                'model' => $model,
               
            ]);
        }
    }

    /**
     * Deletes an existing Frequencia model.
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
     * Finds the Frequencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Frequencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Frequencia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}