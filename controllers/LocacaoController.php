<?php

namespace app\controllers;

use Yii;
use app\models\Locacao;
use app\models\LocacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Livro;
/**
 * LocacaoController implements the CRUD actions for Locacao model.
 */
class LocacaoController extends Controller
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
     * Lists all Locacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocacaoSearch();
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
     * Displays a single Locacao model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
         $query = new \yii\db\Query();
        
        $query = \app\models\Aluno::find()
                ->where(['aluno_id' => $id]);
        $aluno = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        $query = new \yii\db\Query();
        
        $query = \app\models\Livro::find()
                ->where(['livro_id' => $id]);
        $livro = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query = new \yii\db\Query();
        
        $query = \app\models\Reserva::find()
                ->where(['aluno_id' => $id]);
        $reserva = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'aluno' => $aluno,
            'livro' => $livro,
            'reserva' => $reserva
        ]);
    }

    /**
     * Creates a new Locacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Locacao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idlocacao]);
        }

        return $this->render('create', [
            'model' => $model,
            'listAlunos' => $this->listarAlunos(),
            'listLivros' => $this->listarLivros(),
            'listReserva' => $this->listarReserva(),

        ]);
    }

    /**
     * Updates an existing Locacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idlocacao]);
        }

        return $this->render('update', [
            'model' => $model,
            'listAlunos' => $this->listarAlunos(),
            'listLivros' => $this->listarLivros(),
            'listReserva' => $this->listarReserva(),


        ]);
    }

    /**
     * Deletes an existing Locacao model.
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
     * Finds the Locacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Locacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Locacao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
            private function listarLivros() {
        $listLivros = \app\models\LivroSearch::find()->all();
        $listLivros = \yii\helpers\ArrayHelper::map($listLivros, 'idlivro', 'titulo');
        return $listLivros;
    }

    private function listarAlunos() {
        $listAlunos = \app\models\AlunoSearch::find()->all();
        $listAlunos = \yii\helpers\ArrayHelper::map($listAlunos, 'idaluno', 'nome');
        return $listAlunos;
    }
            private function listarReserva() {
        $listReserva = \app\models\ReservaSearch::find()->all();
        $listReserva = \yii\helpers\ArrayHelper::map($listReserva, 'idreserva', 'aluno_id');
        return $listReserva;
    }

}
