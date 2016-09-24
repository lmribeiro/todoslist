<?php

namespace app\controllers;

use Yii;
use \app\models\Project;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ProjectController extends \yii\web\Controller
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

        $model = new Project;
        $model->user_id = Yii::$app->user->id;
        $model->name = $request->post('name');
        if ($model->save()) {
            return $this->renderPartial('create', [
                        'model' => $model,
            ]);
        } else {
            return "error";
        }
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;

        $model = Project::findOne($request->post('id'));
        if ($model->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }

    public function actionUpdate()
    {
        $request = Yii::$app->request;

        $model = Project::findOne($request->post('id'));
        $model->name = $request->post('name');
        if ($model->save()) {
            return "ok";
        } else {
            return "error";
        }
    }

}
