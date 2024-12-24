<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241220
 * AI产业及其市场份额占比php
 */

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;


// 从数据库获取数据
$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => \common\models\Market::find(),
    'pagination' => false,
]);

// 准备饼状图数据
$pieChartData = [];
foreach ($dataProvider->models as $model) {
    // 检查是否已经为这个Category创建了饼状图数据
    if (!isset($pieChartData[$model->Category])) {
        $pieChartData[$model->Category] = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => $model->Category,
                    'data' => [],
                    'backgroundColor' => [], // 您可以根据需要添加颜色数组
                    'hoverOffset' => 4
                ]
            ]
        ];
    }
    // 添加Subcategory和Value到对应的Category中
    $pieChartData[$model->Category]['labels'][] = $model->Subcategory;
    $pieChartData[$model->Category]['datasets'][0]['data'][] = $model->Value;
    // 为每个饼图切片设置背景颜色，您可以根据需要添加颜色数组
    $pieChartData[$model->Category]['datasets'][0]['backgroundColor'][] = "rgba(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ", 0.6)";
}

// 将数据传递给 JavaScript
$jsPieChartData = Json::encode($pieChartData);
?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">AI产业及其市场份额占比</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Pages</a></li>
            <li class="breadcrumb-item active text-secondary">AI产业及其市场份额占比</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="site-about" style="text-align: center; padding: 20px;">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- 按钮组 -->
    <div style="margin-bottom: 20px;">
        <?php foreach ($pieChartData as $category => $data) { ?>
            <button onclick="changePieChart('<?= $category ?>')"> <?= Html::encode($category) ?> </button>
        <?php } ?>
    </div>

    <!-- 饼图容器 -->
    <div style="display: inline-block;">
        <canvas id="pieChart" width="400" height="400"></canvas>
    </div>
</div>

<?php
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js', ['position' => View::POS_HEAD]);
$this->registerJs(<<<JS
var ctx = document.getElementById('pieChart').getContext('2d');
var currentChart = null;

// 饼状图数据
var pieChartData = $jsPieChartData;

function changePieChart(category) {
    if (currentChart) {
        currentChart.destroy();
    }
    var data = pieChartData[category];
    currentChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed + '%';
                            }
                            return label;
                        }
                    }
                }
            },
            maintainAspectRatio: false
        }
    });
}

// 初始化第一个图表
changePieChart(Object.keys(pieChartData)[0]);
JS
, View::POS_END);
?>