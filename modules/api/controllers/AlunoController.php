<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;



class AlunoController extends ActiveController
{
	public $modelClass = 'app\models\Aluno';

	public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator']['formats']['application/json'] = \yii\web\Response::FORMAT_JSON;
        
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        unset($actions['delete']);

	    $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
                    'prepareDataProvider' => function () {
                		$model = new $this->modelClass;
                		$query = $model::find();
                		$dataProvider = new ActiveDataProvider([
                            'query' => $query,
                            'pagination' => false,
                        ]);
                return $dataProvider;
            },
        ];

	    return $actions;
	}

    public function actionCreate()
    {
        $model = new Aluno();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

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

}
