<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Aluno;
use kartik\mpdf\Pdf;
/**
 * DisciplinaController implements the CRUD actions for Disciplina model.
 */
class DeclaracaoController extends Controller
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


    public function actionEscolaridade($id) {

        $aluno = Yii::$app->db->createCommand('SELECT a.nome, a.nomeMae, a.nomePai FROM matricula as m, aluno as a 
                                WHERE a.idaluno=:idaluno AND m.idaluno = a.idaluno AND m.status = :matriculado')
                                ->bindValue(':idaluno', $id)
                                ->bindValue(':matriculado', 1)->queryOne();


        $content = $this->renderPartial('escolaridade', [
            'modelAluno' => $aluno
        ]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'content' => $this->renderPartial('escolaridade', [
                'modelAluno' => $aluno
            ]),  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            // 'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.logo-estado{position: relative; top: 50%; transform: translateY(-50%)}
                            .conteudo{font-size: 10}', 
            'options' => ['title' => 'Declação de Escolaridade'],

        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }

    public function actionTransferencia($id) {

        $mensagem = false;

        $aluno = Yii::$app->db->createCommand('SELECT a.nome, a.nomeMae, a.nomePai FROM matricula as m, aluno as a 
                                WHERE a.idaluno=:idaluno AND m.idaluno = a.idaluno AND m.status = :aprovado')
                                ->bindValue(':idaluno', $id)
                                ->bindValue(':aprovado', 4)->queryOne();

        if (empty($aluno)) {

            echo "<script>alert('Aluno não possui aprovação. ');</script>";

        } else {
            $content = $this->renderPartial('escolaridade', [
                'modelAluno' => $aluno
            ]);
            
            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_UTF8, 
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT, 
                // stream to browser inline
                'content' => $this->renderPartial('transferencia', [
                    'modelAluno' => $aluno
                ]),  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                //'cssInline' => '.logo-estado{position: relative; top: 50%; transform: translateY(-50%)}
                //                .conteudo{font-size: 10}', 
                //'options' => ['title' => 'Declação de Escolaridade'],

            ]);
            
            // return the pdf output as per the destination setting
            return $pdf->render(); 
        }
    }

    public function actionBolsafamilia($id) {

        $aluno = Yii::$app->db->createCommand('SELECT a.nome, a.nomeMae, a.nomePai, a.endereco, a.periodoSerie FROM matricula as m, aluno as a 
                                WHERE a.idaluno=:idaluno AND m.idaluno = a.idaluno AND m.status = :matriculado')
                                ->bindValue(':idaluno', $id)
                                ->bindValue(':matriculado', 1)->queryOne();


        $content = $this->renderPartial('bolsafamilia', [
            'modelAluno' => $aluno
        ]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'content' => $this->renderPartial('bolsafamilia', [
                'modelAluno' => $aluno
            ]),  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            // 'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssInline' => '.logo-estado{position: relative; top: 50%; transform: translateY(-50%)}
            //                .conteudo{font-size: 10}', 
            'options' => ['title' => 'Declação de Bolsa Familia'],

        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }

    public function actionCarteiraestudante($id) {

        $aluno = Yii::$app->db->createCommand('SELECT a.nome, a.nomeMae, a.nomePai, a.endereco, a.periodoSerie FROM matricula as m, aluno as a 
                                WHERE a.idaluno=:idaluno AND m.idaluno = a.idaluno AND m.status = :matriculado')
                                ->bindValue(':idaluno', $id)
                                ->bindValue(':matriculado', 1)->queryOne();

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'content' => $this->renderPartial('carteiraestudante', [
                'modelAluno' => $aluno
            ]),  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            // 'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssInline' => '.logo-estado{position: relative; top: 50%; transform: translateY(-50%)}
            //                .conteudo{font-size: 10}', 
            'options' => ['title' => 'Declaração para Carteira de Estudante'],

        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
}
