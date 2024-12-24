<?php

/**
 * Team: 啊对对队
 * Coding by 马有朝 2211631, 20241217
 * 主页php
 */

/** @var yii\web\View $this */

$this->title = '人工智能应用资讯网后台';
?>
<!-- Carousel Start 开始界面-->
<div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="img/hou-1.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">Artificial intelligence application</h4>
                        <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">探索AI无限可能，掌握科技变革脉搏</h1>
                        <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">人工智能正在迅速改变各行各业。我们提供最新的人工智能应用报道和技术突破，涵盖医疗、交通、娱乐等多个领域。无论您是技术爱好者还是行业专家，这里都是您了解AI前沿动态和探索无限可能性的最佳平台。
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/hou-2.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">Artificial intelligence application</h5>
                        <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">洞察AI前沿动态，赋能未来智慧生活</h1>
                        <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">人工智能不仅革新了商业模式，也提升了我们的生活质量。通过我们的深入分析、专家见解和实用指南，您可以了解如何利用AI技术构建更智能的生活方式。发现智能家居、智慧城市等创新应用，与我们一起迈向更高效、便捷的未来。
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-secondary wow fadeInLeft" data-wow-delay="0.2s" aria-hidden="false"></span>
            <span class="visually-hidden-focusable">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-secondary wow fadeInRight" data-wow-delay="0.2s" aria-hidden="false"></span>
            <span class="visually-hidden-focusable">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
