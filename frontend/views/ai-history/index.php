<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241222
 * AI历史进程发展图php
 */

/** @var yii\web\View $this */
/**  @var common\models\AiHistory $aiHistoryData */

use yii\helpers\Html;
use yii\web\JsExpression;


?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">人工智能历史大事记</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Pages</a></li>
            <li class="breadcrumb-item active text-secondary">Ai History</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>以下是人工智能历史上的重要事件：</p>

    <div class="timeline-container">
        <div class="timeline">
            <?php foreach ($aiHistoryData as $event): ?>
                <div class="timeline-item">
                    <div class="timeline-item-year"><?= Html::encode($event->year) ?></div>
                    <div class="timeline-item-content">
                        <p><?= Html::encode($event->event_description) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<!-- CSS 样式 -->
<style>
    .timeline-container {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }
    .timeline {
        position: relative;
        width: 80%;
        padding: 10px;
        border-left: 2px solid #4b8df8;
    }
    .timeline-item {
        position: relative;
        margin: 20px 0;
    }
    .timeline-item-year {
        position: absolute;
        left: -80px;
        top: 0;
        font-size: 16px;
        font-weight: bold;
        color: #4b8df8;
    }
    .timeline-item-content {
        padding: 10px;
        border-radius: 5px;
        background-color: #f0f0f0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-left: 30px;
    }
</style>

<!-- JS 代码 -->
<?php
$script = <<<JS
// 可以在这里添加一些 JavaScript 功能，如动画等
JS;
$this->registerJs($script);
?>
