<?php

namespace app\controllers;

use app\models\Application;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ApplicationController extends Controller
{
    public function actionIndex()
    {
        Yii::info("HHHHHHHHHHHh");
        $applications = Application::find()->all();
        return $this->render('index', ['applications' => $applications]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', ['model' => $model]);
    }

    public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Application();

        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return ['status' => 'success', 'data' => $model];
        }

        return ['status' => 'error', 'errors' => $model->errors];
    }

    public function actionUpdate($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return ['status' => 'success', 'data' => $model];
        }

        return ['status' => 'error', 'errors' => $model->errors];
    }

    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->findModel($id);

        if ($model->delete()) {
            return ['status' => 'success', 'message' => 'Application deleted successfully'];
        }

        return ['status' => 'error', 'message' => 'Failed to delete application'];
    }

    protected function findModel($id)
    {
        if (($model = Application::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested application does not exist.');
    }
}
