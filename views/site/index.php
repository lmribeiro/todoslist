<?php
/* @var $this yii\web\View */

$this->title = Yii::$app->name;

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Welcome</h1>
            <hr/>
            <p class="text-center">Organize your project and tasks with <?= Yii::$app->name ?></p>
            <hr/>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-xs-12 col-sm-4">
                        <div class="col-sm-12 circle">
                            <h1><?= $users ?></h1>
                            <h4>Registered Users</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="col-sm-12 circle">
                            <h1><?= $projects ?></h1>
                            <h4>Created Projects</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="col-sm-12 circle">
                            <h1><?= $tasks ?></h1>
                            <h4>Completed Taks</h4>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <p class="text-center">Create your account</p>
            <hr/>
        </div>
    </div>
</div>

