<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;



class ProfessorController extends ActiveController
{
	public $modelClass = 'app\models\Professor';

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
        $model = new Professor();
        $disciplinas = ArrayHelper::map(Disciplina::find()->orderBy('nome')->asArray()->all(), 'iddisciplina', 'nome');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $modelMatriculaProfessor = new MatriculaProfessor();
            $modelMatriculaProfessor->idprofessor = $model->idprofessor;
            $modelMatriculaProfessor->disciplina_iddisciplina = $model->disciplinasForm;
            $modelMatriculaProfessor->save();

            return $this->redirect(['view', 'id' => $model->idprofessor]);
        } else {
            return $this->render(['aluno/create'], [
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

            return $this->render(['/aluno/view'], [
                'model' => $this->findModel($id),
                'listaDisciplinas' => $listaDisciplinas
            ]);
            
        } else {
            return $this->render(['/aluno/matricula'], [
                'model' => $model,
                'disciplinas' => $disciplinas
            ]);
        }
    }

}
