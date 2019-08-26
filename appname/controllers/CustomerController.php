<?php

namespace appname\controllers;

use Yii;
use appname\models\Customer;
use appname\models\CustomerSearch;
use contrib\workflow\models\Flow;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends BaseController
{
    public $layout = '@app/layout/main';
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDatatable()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $data = [
            'data' => $dataProvider->getModels(),
            'recordsTotal' => $dataProvider->totalCount,
            'recordsFiltered' => $dataProvider->totalCount
        ];
        return $this->asJson($data);
    }

    public function actionStartView($flowId)
    {
        if (Yii::$app->request->isPost) {
            $flow = $this->getFlow($flowId);
            $flow->completeStart(Yii::$app->user->id);
            return $this->redirect(['workflow/index']);
        }

        return $this->render('start-view');
    }

    public function actionViewTask1($taskId)
    {
        if (Yii::$app->request->isPost) {
            $flow = $this->getFlowByTaskId($taskId);
            $flow->completeTask($taskId, Yii::$app->user->id);
            return $this->redirect(['workflow/tasks']);
        }

        return $this->render('view-task1', compact('taskId'));
    }

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->logUserRead("Xem chi tiết khách hàng #$id");
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->logUserWrite("Cập nhật thông tin khách hàng #$id");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getFlowByTaskId($taskId)
    {
        $task = Flow::getTaskById($taskId);
        return $this->getFlow($task->flow_id);
    }

    private function getFlow($flowId)
    {
        $session = Yii::$app->session;
        if (!$session->has('flow')) {
            $session['flow'] = Flow::createFlow($flowId);
        }
        return $session['flow'];
    }
}
