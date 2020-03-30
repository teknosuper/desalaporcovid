<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">DLC</span><span class="logo-lg">DesaLaporCOVID-19</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <?php if(Yii::$app->user->isGuest):?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= \app\models\CommonHelper::letterAvatar('Guest') ;?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">Silahkan Login</span>
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
                                <a href="<?= \yii\helpers\Url::toRoute(['/profile']);?>" class="btn btn-default btn-flat">Profile</a>
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
