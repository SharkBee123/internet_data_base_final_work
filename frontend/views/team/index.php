<?php

/**
 * Team: 啊对对队
 * Coding by 马有朝 2211631, 20241221
 * 团队介绍php
 */

/* @var $this yii\web\View */
/* @var $models common\models\Owers[] */

$this->title = '团队成员信息';
?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title><?= $this->title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .who-we-are {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 50px 200px;
            background-color: #e1f5fe; 
            border-radius: 10px; /* 圆角边框 */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* 添加阴影效果 */
        }

        .who-we-are img {
            max-width: 40%;
            margin-right: 20px;
            border-radius: 10px; /* 图片圆角 */
        }

        .who-we-are-text {
            max-width: 600px;
        }

        .who-we-are h1 {
            color: #333;
        }

        .who-we-are h5 {
            line-height: 1.6;
            color: #666;
        }

        .members-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 0px 300px;
        }
        .member {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            width: 48%;
            margin-bottom: 20px;
            background-color: #e1f5fe;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease; /* 添加过渡效果 */
        }

        .member:hover {
            transform: translateY(-5px); /* 轻微向上移动 */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* 增加阴影 */
            background-color: #e0f2f1; /* 改变背景颜色 */
        }
        .member-avatar {
            width: 50%;
            height: auto;
            display: block;
        }
        .member-info {
            padding: 15px;
        }
        .member-name {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .member-number {
            color:rgb(0, 51, 105); /* 蓝色 */
            font-size: 18px; /* 字体大小 */
            font-weight: bold; /* 粗体 */
        }
        .member-major {
            color:rgb(0, 51, 105); /* 蓝色 */
            font-size: 18px; /* 字体大小 */
            font-weight: bold; /* 粗体 */
        }
        .member-message {
            font-size: 16px; /* 字体大小 */
            font-weight: normal; /* 正常粗细 */
        }
    </style>
</head>
<body>

<h1><?= Yii::t('app', '团队成员信息展示') ?></h1>

<div class="who-we-are">
    <img src="img/nku.jpg" alt="We are">
    <div class="who-we-are-text">
        <h1>我们是谁？</h1>
        <h5>我们是四个来自南开大学的学生。我们创建这个网站的初衷是为广大的技术爱好者、行业从业者和普通公众提供一个全面的人工智能（AI）应用资讯平台。我们致力于汇集和分析各类资料，及时呈现AI领域的最新动态与新闻。通过直观的可视化图表，我们将复杂的数据以清晰、易懂的方式展示，帮助您快速掌握行业趋势和关键信息。最后，希望人们可以在联系页面将自己的意见和建议及时反馈给我们。</h5>
    </div>
</div>

<br>

<?php if (!empty($models)): ?>
    <div class="members-container">
        <?php foreach ($models as $model): ?>
            <div class="member">
                <img src="img/team-<?= $model->id + 1?>.jpg" alt="成员头像" class="member-avatar">
                <div class="member-info">
                    <h2 class="member-name"><?= $model->name ?></h2>
                    <p class="member-number">学号：<?= $model->number ?></p>
                    <p class="member-major">专业：<?= $model->major ?></p>
                    <p class="member-message">个人留言：<?= $model->message ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>没有找到个人信息。</p>
<?php endif; ?>


</body>
</html>



