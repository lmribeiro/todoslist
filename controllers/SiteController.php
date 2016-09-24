<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use \app\models\Project;
use \app\models\Task;
use \app\models\User;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $users = User::find()->all();
            $projects = Project::find()->all();
            $tasks = Task::find()->where('finished=1')->all();
            return $this->render('index', ['users' => count($users), 'projects' => count($projects), 'tasks' => count($tasks)]);
        } else {
            $projects = Project::find()->where('deleted=:deleted AND user_id=:user', array(':deleted' => 0, ':user' => Yii::$app->user->id))->all();
            return $this->render('projects', ['projects' => $projects]);
        }
    }

}
