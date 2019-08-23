<?php

namespace appname\controllers;

use Yii;
use appname\models\Customer;
use appname\models\CustomerSearch;
use contrib\workflow\models\Flow;
use contrib\workflow\models\FlowDefinition;
use contrib\workflow\models\Task;
use contrib\workflow\WorkflowService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class WorkflowController extends BaseController
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
        $models = FlowDefinition::find()->all();
        return $this->render('index', compact('models'));
    }

    public function actionStart($id)
    {
        $flow = Flow::createFlow($id);
        Yii::$app->session['flow'] = $flow;
        $startView = $flow->getStartView();
        return $this->redirect([$startView, 'flowId' => $id]);
    }

    public function actionTasks()
    {
        $tasks = WorkflowService::getTaskOfUser(Yii::$app->user->id)->all();
        return $this->render('tasks', compact('tasks'));
    }

    public function actionExecuteTask($taskId)
    { }

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
}
