<?php

namespace app\controllers;

use Yii;
use app\models\Livro;
use app\models\LivroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Editora;
use yii\web\UploadedFile;

/**
 * LivroController implements the CRUD actions for Livro model.
 */
class LivroController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Livro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LivroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionHome()
    {
        $livros = Livro::find()->all();

        return $this->render('home', [
            'livros' => $livros,
            
        ]);
    
    }

    /**
     * Displays a single Livro model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        $query = new \yii\db\Query();
        
        $query = \app\models\Editora::find()
                ->where(['editora_id' => $id]);
        $editora = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'editora' => $editora
        ]);
    }

    /**
     * Creates a new Livro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Livro();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->flag = UploadedFile::getInstance($model, 'flag');

            if ($model->upload()) {
                return $this->redirect(['view', 'id' => $model->idlivro]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                            'listAutor' => $this->listarAutor(),
                            'listEditora' => $this->listarEditora()
        ]);
                
            }
            return $this->redirect(['view', 'id' => $model->idlivro]);
        } else {
     
        return $this->render('create', [
            'model' => $model,
            'listAutor' => $this->listarAutor(),
            'listEditora' => $this->listarEditora()
        ]);
        }
    }
    private function listarAutor() {
        $listAutor = \app\models\AutorSearch::find()->all();
        $listAutor = \yii\helpers\ArrayHelper::map($listAutor, 'idautor', 'nome');
        return $listAutor;
    }
     private function listarEditora() {
        $listEditora = \app\models\EditoraSearch::find()->all();
        $listEditora = \yii\helpers\ArrayHelper::map($listEditora, 'ideditora', 'nome');
        return $listEditora;
    }

    /**
     * Updates an existing Livro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
             $model = $this->findModel($id);
        //carregando o upload no modelo 3º passo lemabra que muda no model para fileInput e aumenta linha do formulario
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->flag = UploadedFile::getInstance($model, 'flag');

            if ($model->upload()) {
                return $this->redirect(['view', 'id' => $model->idlivro]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                            'listAutor' => $this->listarAutor(),
                            'listEditora' => $this->listarEditora()
            ]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'listAutor' => $this->listarAutor(),
                        'listEditora' => $this->listarEditora()
        ]);
            
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idlivro]);
        } else {
              return $this->render('update', [
            'model' => $model,
            'listAutor' => $this->listarAutor(),
            'listEditora' => $this->listarEditora()
        ]);          
        }

    }

    /**
     * Deletes an existing Livro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Livro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Livro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Livro::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
