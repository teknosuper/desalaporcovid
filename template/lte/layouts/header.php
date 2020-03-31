<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

use machour\yii2\notifications\widgets\NotificationsWidget;
/* @var $this \yii\web\View */
/* @var $content string */

NotificationsWidget::widget([
    'theme' => NotificationsWidget::THEME_GROWL,
    'clientOptions' => [
        'location' => 'br',
    ],
    'counters' => [
        '.notifications-header-count',
        '.notifications-icon-count'
    ],
    'markAllSeenSelector' => '#notification-seen-all',
    'listSelector' => '#notifications',
]);


?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">DLC</span><span class="logo-lg">DesaLaporCOVID-19</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <?php if(!Yii::$app->user->isGuest):?>

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning notifications-icon-count">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <span class="notifications-header-count">0</span> notifications</li>
                        <li>
                            <ul class="menu">
                                <div id="notifications"></div>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a> <a href="#" id="notification-seen-all">Mark all as seen</a></li>
                    </ul>
                </li>
                <?php endif;?>
    
                <li class="dropdown user user-menu">
                    <?php if(Yii::$app->user->isGuest):?>
                    <a href="<?= \yii\helpers\Url::toRoute(['/site/login']);?>">                
                        <span><i class="fa fa-user"></i> Login Aplikasi</span>
                    </a>
                    <?php else:?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= \app\models\CommonHelper::letterAvatar(\yii::$app->user->identity->username) ;?>" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?= \yii::$app->user->identity->username;?></span>
                        </a>
                    <?php endif;?>
                    <ul class="dropdown-menu">
                    <?php if(!Yii::$app->user->isGuest):?>
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= \app\models\CommonHelper::letterAvatar(\yii::$app->user->identity->username) ;?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= \yii::$app->user->identity->username;?>                                
                                <small><?= \yii::$app->user->identity->userType;?></small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= \yii\helpers\Url::toRoute(['/profile/password']);?>" class="btn btn-default btn-flat">Ganti Password</a>
                            </div>
                            <div class="pull-right">

                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    <?php else:?>
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= \app\models\CommonHelper::letterAvatar('Guest') ;?>" class="img-circle"
                                 alt="User Image"/>

                        </li>
                        <li class="user-footer">
                            <div class="pull-right">

                                <?= Html::a(
                                    'Login',
                                    ['/site/login'],
                                    ['class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>                        
                    <?php endif;?>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
