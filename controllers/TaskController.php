<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \app\models\Task;

class TaskController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                    'delete' => ['post'],
                    'update' => ['post'],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Task;
        $model->project_id = $request->post('id');
        $model->description = $request->post('description');
        if ($model->save()) {
            return $this->renderPartial('todo', [
                        'task' => $model,
            ]);
        } else {
            return var_dump($model->errors);
        }
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        $model = Task::findOne($request->post('id'));
        if ($model->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }

    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $model = Task::findOne($request->post('id'));
        $model->finished = 1;
        $model->finished_at = date('Y-m-d h:i'); // unix timestamp
        if ($model->save()) {
            return $this->renderPartial('done', [
                        'task' => $model,
            ]);
        } else {
            return "error";
        }
    }

}
