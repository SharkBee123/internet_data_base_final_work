<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241221
 * 前五大国人工智能各领域投入雷达图php
 */

/** @var yii\web\View $this */
/** @var common\models\AiIndex $data */

use yii\helpers\Html;
use yii\web\JsExpression;

$countryNames = [];
$datasets = [];
$colors = [
    'rgba(54, 162, 235, 0.2)',  // 第一种颜色：蓝色
    'rgba(255, 0, 0, 0.2)',     // 第二种颜色：红色
    'rgba(0, 255, 0, 0.2)',     // 第三种颜色：鲜艳绿色
    'rgba(255, 206, 86, 0.2)',  // 第四种颜色：黄色
    'rgba(153, 102, 255, 0.2)', // 第五种颜色：紫色
];

// 遍历数据并准备每个国家的得分
foreach ($data as $index => $row) {  // 显式获取索引 $index
    $countryNames[] = $row->Country;
    
    // 每个国家的数据
    $datasets[] = [
        'label' => $row->Country,
        'data' => [
            (float) $row->Talent,
            (float) $row->Infrastructure,
            (float) $row->Operating_Environment,
            (float) $row->Research,
            (float) $row->Development,
            (float) $row->Government_Strategy,
            (float) $row->Commercial,
        ],
        'fill' => true,
        'backgroundColor' => $colors[$index % count($colors)],  // 使用固定颜色
        'borderColor' => 'rgba(0, 0, 0, 1)',  // 黑色边框
        'borderWidth' => 2,
    ];
}

// 将数据传递给 JavaScript
$jsCountryNames = json_encode($countryNames);
$jsDatasets = json_encode($datasets);

?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">前五大国人工智能各领域投入雷达图</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Pages</a></li>
            <li class="breadcrumb-item active text-secondary">五大国人工智能各领域投入雷达图</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="p-5 mb-4 bg-transparent rounded-3">
    <div class="container-fluid py-5 text-center">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>这里是我们的数据库表的一部分，为了不显得杂乱，我们只展示综合排名前五的国家参与比较</p>

        <!-- 显示从数据库中获取的数据 -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Talent</th>
                    <th>Infrastructure</th>
                    <th>Operating Environment</th>
                    <th>Research</th>
                    <th>Development</th>
                    <th>Government Strategy</th>
                    <th>Commercial</th>
                    <th>Total Score</th>
                    <th>Region</th>
                    <th>Cluster</th>
                    <th>Income Group</th>
                    <th>Political Regime</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= Html::encode($row->Country) ?></td>
                        <td><?= Html::encode($row->Talent) ?></td>
                        <td><?= Html::encode($row->Infrastructure) ?></td>
                        <td><?= Html::encode($row->Operating_Environment) ?></td>
                        <td><?= Html::encode($row->Research) ?></td>
                        <td><?= Html::encode($row->Development) ?></td>
                        <td><?= Html::encode($row->Government_Strategy) ?></td>
                        <td><?= Html::encode($row->Commercial) ?></td>
                        <td><?= Html::encode($row->Total_score) ?></td>
                        <td><?= Html::encode($row->Region) ?></td>
                        <td><?= Html::encode($row->Cluster) ?></td>
                        <td><?= Html::encode($row->Income_group) ?></td>
                        <td><?= Html::encode($row->Political_regime) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- 雷达图容器 -->
        <div class="chart-container" style=" height: 680px; display: flex; justify-content: center; align-items: center;">
            <canvas id="radarChart"></canvas>
        </div>

        <!-- 图表说明文字 -->
        <div class="chart-description" style="margin-top: 20px; font-size: 1rem; color: #555;">
            <p>此图表展示了五个国家在人工智能不同领域的投入情况。每个国家的表现通过雷达图展示，其中每个领域的得分均通过不同颜色的区域表示。</p>
            <p><strong>蓝色</strong>：美国|  <strong>红色</strong>：中国|  <strong>绿色</strong>：英国|  <strong>黄色</strong>：加拿大|  <strong>紫色</strong>：以色列</p>
            <p><strong>字段翻译：</strong></p>
            <ul>
                <li><strong>Country</strong> - 国家</li>
                <li><strong>Talent</strong> - 人才</li>
                <li><strong>Infrastructure</strong> - 基础设施</li>
                <li><strong>Operating Environment</strong> - 经营环境</li>
                <li><strong>Research</strong> - 研究</li>
                <li><strong>Development</strong> - 发展</li>
                <li><strong>Government Strategy</strong> - 政府策略</li>
                <li><strong>Commercial</strong> - 商业</li>
                <li><strong>Total Score</strong> - 总得分</li>
                <li><strong>Region</strong> - 地区</li>
                <li><strong>Cluster</strong> - 集群</li>
                <li><strong>Income Group</strong> - 收入组</li>
                <li><strong>Political Regime</strong> - 政治体制</li>
            </ul>
        </div>
    </div>

    <style>
    .page-title {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .page-description {
        font-size: 1rem;
        color: #777;
        margin-bottom: 20px;
    }

    .button-group {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .category-btn {
        background-color: #007bff;
        color: white;
        font-size: 1rem;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .category-btn:hover {
        background-color: #0056b3;
    }

    .pie-chart-container {
        display: inline-block;
        width: 100%;
        max-width: 500px;
        height: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

</div>


<?php
// 在页面底部引入 Chart.js 库
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js', ['position' => yii\web\View::POS_END]);

// 使用 JavaScript 渲染雷达图
$this->registerJs(new JsExpression("
    var ctx = document.getElementById('radarChart').getContext('2d');
    var radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Talent', 'Infrastructure', 'Operating Environment', 'Research', 'Development', 'Government Strategy', 'Commercial'],
            datasets: " . $jsDatasets . "
        },
        options: {
            scales: {
                r: {
                    angleLines: {
                        display: true
                    },
                    suggestedMin: 0,
                    suggestedMax: 100
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 16  // 修改图例字体大小
                        },
                        padding: 10,  // 调整图例的内边距
                        boxWidth: 20,  // 图例框的宽度
                        boxHeight: 20, // 图例框的高度
                    }
                }
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            }
        }
    });
"));
?>