<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿   2212989, 20241219
 * 展示某个具体新闻页面的php，并有评论区
 */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm; 

/** @var yii\web\View $this */
/** @var common\models\News $NewsModel */
/** @var common\models\Comments $CommentsModel */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var common\models\CommentForm $CommentFormModel */

$this->title = $NewsModel->title;
\yii\web\YiiAsset::register($this);

// 文本清理函数
function cleanAndFormatText($text) {
    // 去除外层的方括号和单引号
    $cleanedText = trim($text, "[]'");
    
    // 将文本分割成段落数组
    $paragraphs = explode("', '", $cleanedText);
    
    // 清理每个段落中的多余空格和换行符，并为每个段落添加段首缩进样式
    $formattedParagraphs = array_map(function($para) {
        return '<p class="indent">' . trim($para) . '</p>';
    }, $paragraphs);

    // 返回合并后的HTML字符串
    return implode("\n", $formattedParagraphs);
}
?>

<div class="news-view container mt-5">

    <header class="mb-4">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    </header>

    <div class="card">
        <div class="card-body">
            <p class="card-text"><?= Html::encode($NewsModel->abstract) ?></p>
            <div class="card-text">
                <?= cleanAndFormatText($NewsModel->context) ?>
            </div>
        </div>
        <div class="card-footer text-muted">
            News ID: <?= Html::encode($NewsModel->id) ?>
        </div>
    </div>

</div>

<div class="news-view container mt-5">
    <header class="mb-4">
        <h2 class="text-center">Comments</h2>
    </header>

    <div class="card">
        <?php foreach ($CommentsModel as $comment): ?>
            <div class="comment mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center card-footer">
                        <div>
                            <strong>User  <?= Html::encode($comment->user_id) ?></strong>
                        </div>
                        <div class="text-muted">
                            <small>Posted on <?= Yii::$app->formatter->asDatetime($comment->created_at) ?></small>
                        </div>
                    </div>
                    <div class="card-text mt-2">
                        <?= Html::encode($comment->content) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php $form = ActiveForm::begin([
        'action' => ['news/view', 'id' => $NewsModel->id],
        'method' => 'post',
    ]); ?>

        <?= $form->field($CommentFormModel, 'content')->textarea(['rows' => 6]) ?>
        <?= $form->field($CommentFormModel, 'news_id')->hiddenInput(['value' => $NewsModel->id])->label(false) ?>
        <?php if (!Yii::$app->user->isGuest): ?>
            <?= $form->field($CommentFormModel, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>
        <?php endif; ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>



<!-- 添加CSS样式以实现段首缩进 -->
<style>
.indent {
    text-indent: 2em;
}
</style>