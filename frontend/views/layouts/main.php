<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241217
 * 前端全局php，包括导航栏与页脚
 */

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
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

<!-- 导航栏 Start -->
<div class="container-fluid nav-bar p-0">
    <?php

    NavBar::begin([
        'brandLabel' => Html::tag('h1', Html::img('@web/img/brand-logo.png', ['class' => 'img-fluid']) . 'AI 资讯', ['class' => 'display-5 text-secondary m-0']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0',
        ],
        'innerContainerOptions' => ['class' => 'container'],
    ]);

    // Define menu items
    $menuItems = [
        ['label' => 'Home', 'url' => ['site/index']],
        ['label' => 'About', 'url' => ['team/index']],
        [
            'label' => 'Pages',
            'items' => [
                ['label' => 'Ai History', 'url' => ['ai-history/index']],
                ['label' => 'News', 'url' => ['news/index']],
                ['label' => 'China Map', 'url' => ['china-map/index']],
                ['label' => 'AI Market Trends', 'url' => ['market/index']],
                ['label' => 'Investment data', 'url' => ['investment-data/index']],
                ['label' => ' Countries\' AI Sector Investments', 'url' => ['ai-index/index']],
                // ['label' => 'Team Info', 'url' => ['team/index']],
                
                ['label' => '404 Page', 'url' => ['/site/error']],
            ],
            'options' => ['class' => 'nav-item dropdown'],
            'linkOptions' => ['class' => 'nav-link dropdown-toggle', 'id' => 'navbarDropdownMenuLink', 'role' => 'button', 'data-bs-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false'],
            'template' => '{label}{items}',
            'submenuTemplate' => "\n<ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">\n{items}\n</ul>\n",
        ],
        ['label' => 'Contact', 'url' => ['/site/contact'], 'active' => Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'contact'],
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
</div>
<!-- 导航栏 End -->


<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<div class="office pt-5">
    <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="sub-style">
            <h5 class="sub-title text-primary px-3">啊对对队</h5>
            </div>
            <h1 class="display-5 mb-4">人工智能应用</h1>
            <p class="mb-0">欢迎浏览本网站，在这里你可以了解关于人工智能的发展动态，谢谢支持！</p>
        </div>
                   
    </div>
</div>

<!-- footer Start -->
<footer class="footer mt-auto py-3 text-muted">
    <div class="container-fluid">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>
<!-- footer End -->

<?php
// Register Wow.js for animations if not already registered
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs('new WOW().init();');
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
