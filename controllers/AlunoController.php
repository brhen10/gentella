<?php

namespace app\controllers;

use Yii;
use app\models\Matricula;
use app\models\Turma;
use app\models\Aluno;
use app\models\AlunoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
use yii\web\UploadedFile;
/**
 * AlunoController implements the CRUD actions for Aluno model.
 */
class AlunoController extends Controller
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
     * Lists all Aluno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlunoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionHome()
    {
        $searchModel = new AlunoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $alunos = Aluno::find()->all();

        return $this->render('home', [
            'alunos' => $alunos,
             'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
    
    }

    /**
     * Displays a single Aluno model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
          
        $query = new \yii\db\Query();

        $query = \app\models\Turma_item::find()
                ->where(['turma_id' => $id])
                ->where(['aluno_id' => $id])
                ;

        $provider1 = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query = new \yii\db\Query();
        
        $query = \app\models\Relatorio::find()
                ->where(['aluno_id' => $id]);
        $aluno = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        $query = new \yii\db\Query();
        
        $query = \app\models\Locacao::find()
                ->where(['aluno_id' => $id]);
        $livro = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'provider1' => $provider1,
            'aluno' => $aluno,
            'livro' => $livro
        ]);
    }

    /**
     * Creates a new Aluno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Aluno();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->flag = UploadedFile::getInstance($model, 'flag');

             if ($model->uploadAluno()) {
                return $this->redirect(['view', 'id' => $model->idaluno]);
            } else {
                return $this->render('update', [
                            'model' => $model
        ]);
                
    }

            $modelMatricula = new Matricula();

            $modelMatricula->status = Matricula::MATRICULADO;
            $modelMatricula->idaluno = $model->idaluno;
            $modelMatricula->idturma = $model->periodoSerie;

            $periodoSerie = Turma::find(['nome'])->where(['idturma' => $model->periodoSerie])->one();

            $model->periodoSerie = $periodoSerie['nome']; 

            $model->save();
            $modelMatricula->save();

            return $this->redirect(['view', 'id' => $model->idaluno]);
        } else {

            $model->dataMatricula = date('d/m/Y');

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Aluno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())&& $model->save()) {

           $model->flag = UploadedFile::getInstance($model, 'flag');

            if ($model->uploadAluno()) {
                return $this->redirect(['view', 'id' => $model->idaluno]);
            } else {
                return $this->render('update', [
                            'model' => $model
        ]);
                
    }

            $periodoSerie = Turma::find(['nome'])->where(['idturma' => $model->periodoSerie])->one();
            $model->periodoSerie = $periodoSerie['nome']; 
            
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->idaluno]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idaluno]);
        } else {
              return $this->render('update', [
            'model' => $model,
        ]);          
        }

    }

    /**
     * Deletes an existing Aluno model.
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
     * Finds the Aluno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aluno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aluno::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
       public function actionCreatempdf($id) {
        
        $mpdf = new mPDF();
   
        $mpdf->WriteHTML($this->renderPartial('relatorio', [
                    'model' => $this->findModel($id),    
        ]));
        $mpdf->Output();
        exit;
    }

}
