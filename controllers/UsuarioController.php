<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['@'],
                // 'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete'],
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action) { //impedir alguma ação, tipo excluir um usuario root
                    if ($action->id == 'delete') {

                        if (Yii::$app->request->get()['id'] == 5) { // id que não pode ser apagado
                            return false;
                        }
                    }
                    return true;
                }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create',],
                        'roles' => ['crudUsuarios'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['crudTitles'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Usuario();
        $model->scenario = Usuario::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $auth = Yii::$app->authManager;
            $papel = $auth->getRole($model->papel);
            $auth->assign($papel, $model->idusuario);

            return $this->redirect(['view', 'id' => $model->idusuario]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'listaPapeis' => Usuario::$papeis
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->scenario = Usuario::SCENARIO_UPDATE;
        
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $auth = Yii::$app->authManager;
            if ($model->attributes['papel'] != $model->oldAttributes['papel']) {
                $papelAntigo = $auth->getRole($model->getOldAttribute('papel'));
                $papelNovo = $auth->getRole($model->papel);
                $auth->revoke($papelAntigo, $model->idusuario);
                $auth->assign($papelNovo, $model->idusuario);
            
            }
            return $this->redirect(['view', 'id' => $model->idusuario]);
        } else {
            $model->senha = '';
            return $this->render('update', [
                        'model' => $model,
                        'listaPapeis' => Usuario::$papeis
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
