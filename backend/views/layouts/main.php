<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241219
 * 后端全局php
 */

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Html::tag('h1', Html::img('@web/img/brand-logo.png', ['class' => 'img-fluid']) . 'AI 资讯', ['class' => 'display-5 text-secondary m-0']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0',
        ],
        'innerContainerOptions' => ['class' => 'container'],
    ]);

    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        [
            'label' => 'News',
            'items' => [
                ['label' => 'Index', 'url' => ['news/index']],
                ['label' => 'Create', 'url' => ['news/create']],
            ],
            'options' => ['class' => 'nav-item dropdown'],
            'linkOptions' => ['class' => 'nav-link dropdown-toggle', 'id' => 'navbarDropdownMenuLink', 'role' => 'button', 'data-bs-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false'],
            'template' => '{label}{items}',
            'submenuTemplate' => "\n<ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">\n{items}\n</ul>\n",
        ],
        [
            'label' => 'Users',
            'items' => [
                ['label' => 'Index', 'url' => ['user/index']],
                ['label' => 'Create', 'url' => ['user/create']],
            ],
            'options' => ['class' => 'nav-item dropdown'],
            'linkOptions' => ['class' => 'nav-link dropdown-toggle', 'id' => 'navbarDropdownMenuLink', 'role' => 'button', 'data-bs-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false'],
            'template' => '{label}{items}',
            'submenuTemplate' => "\n<ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">\n{items}\n</ul>\n",
        ],
        [
            'label' => 'AiIndex',
            'items' => [
                ['label' => 'Index', 'url' => ['ai-index/index']],
                ['label' => 'Create', 'url' => ['ai-index/create']],
            ],
            'options' => ['class' => 'nav-item dropdown'],
            'linkOptions' => ['class' => 'nav-link dropdown-toggle', 'id' => 'navbarDropdownMenuLink', 'role' => 'button', 'data-bs-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false'],
            'template' => '{label}{items}',
            'submenuTemplate' => "\n<ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">\n{items}\n</ul>\n",
        ],
        [
            'label' => 'ChinaMap',
            'items' => [
                ['label' => 'Index', 'url' => ['china-map/index']],
                ['label' => 'Create', 'url' => ['china-map/create']],
            ],
            'options' => ['class' => 'nav-item dropdown'],
            'linkOptions' => ['class' => 'nav-link dropdown-toggle', 'id' => 'navbarDropdownMenuLink', 'role' => 'button', 'data-bs-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false'],
            'template' => '{label}{items}',
            'submenuTemplate' => "\n<ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">\n{items}\n</ul>\n",
        ],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto py-0'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    
    // Display Login button or Logout form based on user login status
    if (Yii::$app->user->isGuest) {
        echo Html::a('Login', ['/site/login'], [
            'class' => 'btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0 ms-2',
        ]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex ms-2']);
        echo Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0']
        );
        echo Html::endForm();
    }

    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
