<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                    ['label' => 'Home', 'icon' => 'home', 'url' => ['/']],
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
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
