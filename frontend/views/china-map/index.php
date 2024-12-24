<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241217
 * 中国地图php
 */

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\web\JsExpression;

?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">各省综合AI竞争力展示</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-secondary">各省综合竞争力展示</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="p-5 mb-4 bg-transparent rounded-3">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-4">以下是中国地图及其省份竞争力展示：</h1>

        <!-- 地图容器 -->
        <div style="display: flex; justify-content: center; position: relative; padding-top: 30px; padding-bottom: 30px;">
            <svg id="chinaMap" width="960" height="600"></svg> <!-- 地图 -->
            
        <!-- 图例容器 -->
        <div id="legend-container" style="position: fixed; top: 100px; right: 20px; width: 350px; font-size: 14px; padding: 15px; background-color: rgba(255, 255, 255, 0.8); border: 1px solid #ccc; border-radius: 8px; z-index: 10;">
            <h4 style="margin-bottom: 10px;">图例</h4>
            <svg id="legend" width="320" height="20"></svg>
            <div style="display: flex; justify-content: space-between; margin-top: 10px; font-size: 12px;">
                <span>0</span>
                <span>96.58</span>
            </div>
            <p style="font-size: 12px; margin-top: 10px; word-wrap: break-word;">
                竞争力指数越高，颜色越深，表示该省份的经济、技术等各方面的竞争力越强。
            </p>
        </div>
        </div>

        <!-- 显示省份的名称和竞争力指数 -->
        <div id="province-info" style="margin-top: 20px; font-size: 24px; font-weight: bold; color: #888;">
            请将鼠标悬浮在地图的省份上以查看详细信息
        </div>

        <!-- 说明文字 -->
        <div id="chart-description" style="margin-top: 20px; font-size: 20px; color: #555;">
            <p>
                地图展示了中国各省份的竞争力指数，数值越大表示竞争力越强。<br>
                悬浮鼠标在省份上时，可以查看具体的各省的竞争力数据。<br>
                颜色深浅表示竞争力的高低，可以帮助我们非常直观地比较不同省份的竞争力。
            </p>
        </div>
    </div>
</div>

<?php
// 引入 D3.js 和 TopoJSON 库
$this->registerJsFile('https://cdn.jsdelivr.net/npm/d3@6.7.0/dist/d3.min.js', ['position' => yii\web\View::POS_END]);
$this->registerJsFile('https://cdn.jsdelivr.net/npm/topojson@3.0.2/dist/topojson.min.js', ['position' => yii\web\View::POS_END]);

// 获取从控制器传递过来的数据
$competitivenessData = $competitivenessData;

// 渲染 JavaScript 图表
$this->registerJs(new JsExpression("
    var width = 960;
    var height = 650;
    
    var svg = d3.select('#chinaMap')
        .attr('width', width)
        .attr('height', height)
        .style('position', 'relative');  // 设置地图容器为相对定位
    
    // 获取 PHP 传递的竞争力数据
    var competitivenessData = " . json_encode($competitivenessData) . ";

    // 定义颜色比例尺（根据数据范围调整颜色范围）
    var colorScale = d3.scaleQuantize()
        .domain([0, d3.max(Object.values(competitivenessData))]) // 数据范围（0 到最大值）
        .range(['#f7fbff', '#c6dbef', '#6baed6', '#2171b5', '#084594']); // 颜色从浅到深

    // 加载 TopoJSON 数据
    d3.json('https://geojson.cn/api/china/china.topo.json').then(function(topoData) {
        // 使用 TopoJSON 来解析数据
        var china = topojson.feature(topoData, topoData.objects.default);

        // 设置投影方式和路径生成器
        var projection = d3.geoMercator()
            .center([105, 38]) // 中国的中心点
            .scale(800) // 缩放比例
            .translate([width / 2, height / 2]); // 将地图平移到合适位置

        var path = d3.geoPath().projection(projection);

        // 绘制每个省份
        svg.selectAll('path')
            .data(china.features)
            .enter().append('path')
            .attr('d', path)
            .attr('fill', function(d) {
                var provinceName = d.properties.name; // 获取省份名称
                var competitivenessIndex = competitivenessData[provinceName] || 0; // 获取竞争力指数
                return colorScale(competitivenessIndex); // 根据竞争力指数设置颜色
            })
            .attr('stroke', '#333')
            .attr('stroke-width', 0.5)
            .on('mouseover', function(event, d) {
                // 高亮当前省份
                d3.select(this)
                    .attr('stroke-width', 2) // 鼠标悬停时加粗边框
                    .attr('stroke', '#ff0000'); // 改为红色边框
                
                var provinceName = d.properties.name;
                var competitivenessIndex = competitivenessData[provinceName] || '未知'; // 获取省份的竞争力指数
                
                // 更新省份信息并改变样式
                d3.select('#province-info')
                    .text(provinceName + ': ' + competitivenessIndex)
                    .style('color', '#000')  // 鼠标悬浮时变为黑色
                    .style('font-size', '40px'); // 增大字体
            })
            .on('mouseout', function() {
                d3.select(this)
                    .attr('stroke-width', 0.5)
                    .attr('stroke', '#333'); // 鼠标移开时恢复边框
                
                // 恢复为默认提示文字并改变样式
                d3.select('#province-info')
                    .text('请将鼠标悬浮在地图的省份上以查看详细信息')
                    .style('color', '#888')  // 恢复灰色
                    .style('font-size', '24px'); // 恢复字体大小
            });

        // 创建图例
        var legendWidth = 320;
        var legendHeight = 20;
        var legendMargin = 10;

        // 创建图例容器并添加至右侧
        var legend = d3.select('#legend')
            .attr('width', legendWidth)
            .attr('height', legendHeight);

        // 定义图例的比例尺
        var legendScale = d3.scaleLinear()
            .domain([0, d3.max(Object.values(competitivenessData))])
            .range([0, legendWidth]);

        // 创建渐变条
        legend.append('defs').append('linearGradient')
            .attr('id', 'gradient')
            .attr('x1', '0%')
            .attr('x2', '100%')
            .attr('y1', '0%')
            .attr('y2', '0%')
            .selectAll('stop')
            .data(colorScale.range())
            .enter().append('stop')
            .attr('offset', function(d, i) { return (i / (colorScale.range().length - 1)) * 100 + '%'; })
            .attr('stop-color', function(d) { return d; });

        // 在图例上绘制渐变条
        legend.append('rect')
            .attr('x', 0)
            .attr('y', 0)
            .attr('width', legendWidth)
            .attr('height', legendHeight)
            .style('fill', 'url(#gradient)');

    }).catch(function(error) {
        console.error('加载 TopoJSON 数据时出错:', error);
    });
"));
?>