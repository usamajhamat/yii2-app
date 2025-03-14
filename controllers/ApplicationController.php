<?php

namespace app\controllers;

use app\models\Application;
use GuzzleHttp\Psr7\Response;
use Yii;
use yii\web\NotFoundHttpException;

class ApplicationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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
        $model = Application::findOne($id);
        
        if (!$model) {
            throw new NotFoundHttpException('Application not found.');
        }

        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return ['status' => 'success', 'data' => $model];
        }

        return ['status' => 'error', 'errors' => $model->errors];
    }

}
