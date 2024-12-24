<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241221
 * 近六年投资数量与投资额发展趋势图php
 */

/** @var yii\web\View $this */
/** @var array $years */
/** @var array $investmentQuantities */
/** @var array $investmentAmounts */

use yii\helpers\Html;
use yii\web\JsExpression;


$jsYears = json_encode($years);
$jsInvestmentQuantities = json_encode($investmentQuantities);
$jsInvestmentAmounts = json_encode($investmentAmounts);
?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">近六年投资数量与投资额发展趋势图</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Pages</a></li>
            <li class="breadcrumb-item active text-secondary">近六年投资数量与投资额发展趋势图</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="investment-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>以下是投资数量和投资额的具体统计图（条形+折线）：</p>

    <!-- Canvas 容器 -->
    <div class="chart-container" style="height: 680px; display: flex; justify-content: center; align-items: center;">
        <canvas id="investmentChart"></canvas>
    </div>

    <!-- 说明文字 -->
    <div class="chart-description">
        <p><strong>图表说明：</strong></p>
        <ul>
            <li>图表展示了不同年份的投资数量（单位：起）与投资额（单位：亿元）之间的关系。</li>
            <li>左侧的纵轴表示“投资数量（起）”，右侧的纵轴表示“投资额（亿元）”。</li>
            <li>蓝色条形图表示每年投资数量的变化，红色折线图表示每年投资额的变化。</li>
            <li>通过该图表，可以比较各年在投资数量和投资额上的差异。</li>
        </ul>
    </div>
</div>

<?php
// 引入 Chart.js 库
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js', ['position' => yii\web\View::POS_END]);
// 引入 chartjs-plugin-datalabels 插件
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0', ['position' => yii\web\View::POS_END]);

// 渲染 JavaScript 图表
$this->registerJs(new JsExpression("
    var ctx = document.getElementById('investmentChart').getContext('2d');
    var investmentChart = new Chart(ctx, {
        type: 'bar',  // 设置整体为混合图表
        data: {
            labels: " . $jsYears . ",  // 年份作为标签
            datasets: [
                {
                    label: '投资数量（起）',
                    data: " . $jsInvestmentQuantities . ",
                    type: 'bar',  // 设置投资数量为条形图
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',  // 条形图颜色
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    // 启用数据标签
                    datalabels: {
                        align: 'top',  // 设置数据标签的位置
                        anchor: 'end',  // 设置数据标签的锚点
                        color: '#000',  // 设置数据标签的颜色
                        font: {
                            weight: 'bold'
                        }
                    },
                    yAxisID: 'y1'  // 将此数据集与左侧 Y 轴绑定
                },
                {
                    label: '投资额（亿元）',
                    data: " . $jsInvestmentAmounts . ",
                    type: 'line',  // 设置投资额为折线图
                    borderColor: 'rgba(255, 99, 132, 1)',  // 红色
                    fill: false,  // 不填充区域
                    tension: 0.1,  // 设置折线的曲线度
                    // 启用数据标签
                    datalabels: {
                        align: 'bottom',  // 设置数据标签的位置
                        color: '#000',  // 设置数据标签的颜色
                        font: {
                            weight: 'bold'
                        }
                    },
                    yAxisID: 'y2'  // 将此数据集与右侧 Y 轴绑定
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y1: {  // 左侧 Y 轴配置
                    position: 'left',
                    beginAtZero: true,  // Y 轴从 0 开始
                    ticks: {
                        callback: function(value) {
                            return value + ' 起';  // 添加单位
                        }
                    }
                },
                y2: {  // 右侧 Y 轴配置
                    position: 'right',
                    beginAtZero: true,  // Y 轴从 0 开始
                    ticks: {
                        callback: function(value) {
                            return value + ' 亿元';  // 添加单位
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,  // 显示图例
                    labels: {
                        font: {
                            size: 14,  // 设置图例字体大小
                            weight: 'bold'
                        },
                        padding: 20  // 设置图例的上下间距
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            if (tooltipItem.datasetIndex === 0) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw + ' 起';  // 投资数量的工具提示
                            } else {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw + ' 亿元';  // 投资额的工具提示
                            }
                        }
                    }
                },
                datalabels: {
                    display: true,  // 启用所有数据集的数据标签
                    color: '#000',  // 设置数据标签的默认颜色
                    font: {
                        weight: 'bold'
                    }
                }
            }
        }
    });
"));
?>

<style>
    .chart-description {
        margin-top: 20px;
        font-size: 1.2rem;
        line-height: 1.6;
    }

    .chart-description ul {
        list-style-type: none;
        padding-left: 0;
    }

    .chart-description li {
        margin: 5px 0;
    }

    .chart-description strong {
        font-weight: bold;
        font-size: 1.4rem;
    }
</style>