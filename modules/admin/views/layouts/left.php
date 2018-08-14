<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Пользователи', 'url' => ['user'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Программы', 'url' => ['program'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Учителя', 'url' => ['teacher'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Информационные страницы', 'url' => ['info-page'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Галерея', 'url' => ['gallery'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Дополнительные настройки', 'url' => ['config'], 'visible' => !Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
