<?php

namespace app\controllers;

use Yii;
use app\models\Turma_infantil;
use app\models\Turma_infantilSearch;
use app\models\Turma_item;
use app\models\DiagnosticoInicial;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use app\models\Model;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
use yii\web\Response;
use mPDF;

//LEMBRAR DE CORRIGIR O PROBLEMA DA DATA

/**
 * Turma_infantilController implements the CRUD actions for Turma_infantil model.
 */
class Turma_infantilController extends Controller
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
        $turmas = Turma_infantil::find()->all();

        return $this->render('home', [
            'turmas' => $turmas,
            
        ]);
    
    }

    /**
     * Lists all Turma_infantil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Turma_infantilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Turma_infantil model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        $turmainfantil = $model->turmaItems;
        
        $query = new \yii\db\Query();

        $query = \app\models\Turma_item::find()->where(['turma_id' => $id]);

        $provider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query = new \yii\db\Query();

        $query = \app\models\DiagnosticoInicial::find()->where(['turma_id' => $id]);

        $provider1 = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $this->render('view', [
            'model' => $model,
            'turmainfantil' => $turmainfantil,
            'provider'=>$provider,
            'provider1'=>$provider1,

            ]);
    }
    
    /**
     * Creates a new Turma_infantil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
        public function actionCreate()
    {
        $model = new Turma_infantil();

        $modelsTurma_item = [new Turma_item];
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
            {
                $modelsTurma_item = Model::createMultiple(Turma_item::classname());
            Model::loadMultiple($modelsTurma_item, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTurma_item) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) 
                            {
                        foreach ($modelsTurma_item as $modelTurma_item) 
                            {
                            $modelTurma_item->turma_id = $model->idturmainfantil;
                            if (! ($flag = $modelTurma_item->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idturmainfantil]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
            return $this->redirect(['view', 'id' => $model->idturmainfantil]);
            }
            
            return $this->render('create', [
            'model' => $model,
            'modelsTurma_item' => (empty($modelsTurma_item)) ? [new Turma_item] : $modelsTurma_item
        ]);
    
}

    /**
     * Updates an existing Turma_infantil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $modelsTurma_item =[];
        
        $modelsTurma_item = $model->turmaItems;
        
        
               
        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsTurma_item, 'idturma_item', 'idturma_item');
            $modelsTurma_item = Model::createMultiple(Turma_item::classname(), $modelsTurma_item);
            Model::loadMultiple($modelsTurma_item, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsTurma_item, 'idturma_item', 'idturma_item')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTurma_item) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                        Turma_item::deleteAll(['idturma_item' => $deletedIDs]);
                        }
                        foreach ($modelsTurma_item as $modelsTurma_item) {
                            $modelsTurma_item->turma_id = $model->idturmainfantil;
                            if (! ($flag = $modelsTurma_item->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idturmainfantil]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }else{

        return $this->render('update', [
            'model' => $model,
            'modelsTurma_item' => (empty($modelsTurma_item)) ? [new Turma_item] : $modelsTurma_item

        ]);
     }
    }
    /**
     * Deletes an existing Turma_infantil model.
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
     * Finds the Turma_infantil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Turma_infantil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Turma_infantil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
     public function actionCreatempdf($id) {
        
        $mpdf = new mPDF();
   
        $mpdf->WriteHTML($this->renderPartial('capa', [
                    'model' => $this->findModel($id),    
        ]));
        $mpdf->Output();
        exit;
    }

}
