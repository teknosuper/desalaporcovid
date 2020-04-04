<aside class="main-sidebar">

    <section class="sidebar">

        <?php if(!\yii::$app->user->isGuest):?>

        <?php switch (\yii::$app->user->identity->userType) {
            case \app\models\User::LEVEL_ADMIN:
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/']],
                            ['label' => 'Lapor Warga', 'icon' => 'file-o', 'url' => ['/laporan']],
                            // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                            [
                                'label' => 'Input Data Posko',
                                'icon' => 'save',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Data Posko', 'icon' => 'save', 'url' => ['/dataposko'],],
                                ],
                            ],
                            [
                                'label' => 'Master Data',
                                'icon' => 'file',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Daftar Posko', 'icon' => 'file-code-o', 'url' => ['/posko'],],
                                    ['label' => 'Jenis Laporan', 'icon' => 'dashboard', 'url' => ['/jenislaporan'],],
                                    ['label' => 'Pengguna', 'icon' => 'users', 'url' => ['/users'],],
                                ],
                            ],
                            [
                                'label' => 'Statistik',
                                'icon' => 'bar-chart',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Overall', 'icon' => 'line-chart', 'url' => ['/statistik/overall'],],
                                ],
                            ],
                        ],
                    ]
                );
                # code...
                break;
            case \app\models\User::LEVEL_ADMIN_DESA:
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/']],
                            ['label' => 'Lapor Warga', 'icon' => 'file-o', 'url' => ['/laporan']],
                            // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                            [
                                'label' => 'Input Data Posko',
                                'icon' => 'save',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Data Posko', 'icon' => 'save', 'url' => ['/dataposko'],],
                                ],
                            ],
                            [
                                'label' => 'Master Data',
                                'icon' => 'file',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Daftar Posko', 'icon' => 'file-code-o', 'url' => ['/posko'],],
                                    ['label' => 'Pengguna', 'icon' => 'users', 'url' => ['/users'],],
                                ],
                            ],
                        ],
                    ]
                );
                # code...
                break;

            case \app\models\User::LEVEL_POSKO:
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/']],
                            ['label' => 'Lapor Warga', 'icon' => 'file-o', 'url' => ['/laporan']],
                            // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                            [
                                'label' => 'Input Data Posko',
                                'icon' => 'save',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Data Pantauan Posko', 'icon' => 'save', 'url' => ['/dataposko'],],
                                ],
                            ],
                        ],
                    ]
                );
                # code...
                break;            
            case \app\models\User::LEVEL_PENGGUNA:
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/']],
                            ['label' => 'Lapor Warga', 'icon' => 'file-o', 'url' => ['/laporan']],
                        ],
                    ]
                );
                # code...
                break;           
            default:
                # code...
                break;
        }

        ;?>

        <?php else:?>

        <?php 
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/']],
                        ],
                    ]
                );
        ?>

        <?php endif;?>

    </section>

</aside>
