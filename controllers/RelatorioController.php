<?php

namespace app\controllers;

use Yii;
use app\models\Relatorio;
use app\models\RelatorioSearch;
use app\models\Relatorio_item;
use app\models\Aluno;
use app\models\Turma_infantil;
use app\models\ModelRelatorio;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelatorioController implements the CRUD actions for Relatorio model.
 */
class RelatorioController extends Controller
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
     * Lists all Relatorio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RelatorioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Relatorio model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $relatorio = $model->relatorioItems;
        
        $query = new \yii\db\Query();

        $query = \app\models\Relatorio_item::find()->where(['relatorio_id' => $id]);

        $provider1 = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
        $query = new \yii\db\Query();

        $query = \app\models\Aluno::find()->where(['aluno_id' => $id])->where(['Turma_id' => $id]);

        $provider2 = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
       
        return $this->render('view', [
            'model' => $this->findModel($id),
            'provider1' => $provider1,
            'provider2' => $provider2,
           

        ]);
    }

    /**
     * Creates a new Relatorio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelRelatorio = new Relatorio();
        $modelsRelatorio_item = [new Relatorio_item];
        
        if ($modelRelatorio->load(Yii::$app->request->post())&& $modelRelatorio->save()) {

            $modelsRelatorio_item = ModelRelatorio::createMultiple(Relatorio_item::classname());
            ModelRelatorio::loadMultiple($modelsRelatorio_item, Yii::$app->request->post());

            // validate all models
            $valid = $modelRelatorio->validate();
            $valid = ModelRelatorio::validateMultiple($modelsRelatorio_item) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelRelatorio->save(false)) {
                        foreach ($modelsRelatorio_item as $modelRelatorio_item) {
                            $modelRelatorio_item->relatorio_id = $modelRelatorio->idrelatorio;
                            if (! ($flag = $modelRelatorio_item->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelRelatorio->idrelatorio]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
            else {
        return $this->renderAjax('create', [
            'modelRelatorio' => $modelRelatorio,
            'modelsRelatorio_item' => (empty($modelsRelatorio_item)) ? [new Relatorio_item] : $modelsRelatorio_item,
            'listarTurmas_infantil' => $this->listarTurmas_infantil(),
            'listarAlunos' => $this->listarAlunos(),
                ]);
    }
}

    /**
     * Updates an existing Relatorio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelRelatorio = $this->findModel($id);

        $modelsRelatorio_item = [];
        
        $modelsRelatorio_item = $modelRelatorio->relatorioItems;
       //var_dump($modelsRelatorio_item);
        //die();

        if ($modelRelatorio->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsRelatorio_item, 'idrelatorio_item', 'idrelatorio_item');
            $modelsRelatorio_item = ModelRelatorio::createMultiple(Relatorio_item::classname(), $modelsRelatorio_item);
            ModelRelatorio::loadMultiple($modelsRelatorio_item, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsRelatorio_item, 'idrelatorio_item', 'idrelatorio_item')));

            // validate all models
            $valid = $modelRelatorio->validate();
            $valid = ModelRelatorio::validateMultiple($modelsRelatorio_item) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelRelatorio->save(false)) {
                        if (!empty($deletedIDs)) {
                            Relatorio_item::deleteAll(['idrelatorio_item' => $deletedIDs]);
                        }
                        foreach ($modelsRelatorio_item as $modelRelatorio_item) {
                            $modelRelatorio_item->relatorio_id = $modelRelatorio->idrelatorio;
                            if (! ($flag = $modelRelatorio_item->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelRelatorio->idrelatorio]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }else {

        return $this->render('update', [
            'modelRelatorio' => $modelRelatorio,
            'modelsRelatorio_item' => (empty($modelsRelatorio_item)) ? [new Relatorio_item] : $modelsRelatorio_item,
            'listarTurmas_infantil' => $this->listarTurmas_infantil(),
            'listarAlunos' => $this->listarAlunos(),
                ]);
    }
}
    /**
     * Deletes an existing Relatorio model.
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
     * Finds the Relatorio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Relatorio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Relatorio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
        private function listarAlunos() {
        $listAlunos = \app\models\AlunoSearch::find()->all();
        $listAlunos = \yii\helpers\ArrayHelper::map($listAlunos, 'idaluno', 'nome');
        return $listAlunos;
    }

    private function listarTurmas_infantil() {
        $listTurmas = \app\models\Turma_infantilSearch::find()->all();
        $listTurmas = \yii\helpers\ArrayHelper::map($listTurmas, 'idturmainfantil', 'serie');
        return $listTurmas;
    }


}
