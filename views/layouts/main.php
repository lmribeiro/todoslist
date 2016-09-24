<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Dropdown;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="../icon.png">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">


            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            ?>
            <?php if (Yii::$app->user->isGuest) { ?>
                <?php
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => 'Home', 'url' => ['/site/index'], 'options' => ['class' => [Yii::$app->controller->id == "site" && $this->context->action->id == "index" ? 'active' : '']]],
//                        ['label' => 'About', 'url' => ['/site/about'], 'options' => ['class' => [$this->context->action->id == "about" ? 'active' : '']]],
//                        ['label' => 'User', 'url' => ['/user'], 'options' => ['class' => [Yii::$app->controller->id == "default" && $this->context->action->id == "index" ? 'active' : '']]],
                        ['label' => 'Register', 'url' => ['/user/register'], 'options' => ['class' => [$this->context->action->id == "register" ? 'active' : '']]],
                        ['label' => 'Login', 'url' => ['/user/login'], 'options' => ['class' => [$this->context->action->id == "login" ? 'active' : '']]]
                    ],
                ]);

                ?>
            <?php } else { ?>

                <ul class="navbar-nav navbar-right">
                    <?php if ($this->context->action->id !== "account") { ?>
                        <li>
                            <div class="form-inline">
                                <div class="form-group">
                                    <p class="form-control-static">New Project</p>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" style="height: 36px;" id="project-name" placeholder="Project Name" autocomplete="off">
                                        <div class="input-group-addon" style="padding: 0">
                                            <button onclick="javascript:app.projectCreate()" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>&nbsp;
                    <?php } ?>
                    <li>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="glyphicon glyphicon-user"></i> <?= Yii::$app->user->displayName ?> <b class="caret"></b></a>
                            <?php
                            echo Dropdown::widget([
                                'items' => [
                                    ['label' => 'Account', 'url' => ['/user/account']],
                                    ['label' => 'Logout', 'url' => ['/user/logout'], 'linkOptions' => ['data-method' => 'post']]
                                ]
                            ])

                            ?>
                        </div>
                    </li>
                </ul>

            <?php } ?>
            <?php NavBar::end(); ?>

            <div class="container">
                <?php
//                Breadcrumbs::widget([
//                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//                ])

                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
