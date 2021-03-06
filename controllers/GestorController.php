<?php

namespace app\controllers;

use Yii;
use app\models\Gestor;
use app\models\search\GestorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * GestorController implements the CRUD actions for Gestor model.
 */
class GestorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Gestor models.
     * @return mixed
     */
    public function actionIndex()
    {
         if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $searchModel = new GestorSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }



    /**
     * Displays a single Gestor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Creates a new Gestor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $model = new Gestor();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
         }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }    
    }

    /**
     * Updates an existing Gestor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Deletes an existing Gestor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            
            //O objetivo do if abaixo é verificar se a chave do registro acionado está sendo utilizada e em caso positiva ao invés de deletar vai inativar o registro.

            $registroAcionado = $this->findModel($id);//Coloca o registro acionado pelo botão de lixeira em uma variável para poder manipular sem fazer find toda vez.
            if($registroAcionado->getCursoProgers()->exists()||$registroAcionado->getEventoProgers()->exists()||$registroAcionado->getProgramaProgers()->exists()||$registroAcionado->getProjetoProgers()->exists()||$registroAcionado->getUsuarioGestors()->exists()){//Verifica se existe associações ao registro atual
             
              
                $registroAcionado->ativo = 0;
                $registroAcionado->save();
            }
            else{
                $registroAcionado->delete();
            }


            return $this->redirect(['index']);
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Finds the Gestor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gestor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            if (($model = Gestor::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }
}
