<!DOCTYPE html data-overlayscrollbars-initialize>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no"/>

    <!-- css -->
    <link href="<?= get_stylesheet_directory_uri() ?>/assets/css/style.css" rel="stylesheet"/>

    <!-- vendor -->

    <?php
    $bodyClass = '';
    if (is_front_page()) {
        $bodyClass .= 'page-front';
    }
    if ( is_parent_slug() == 'service' && (is_page('thanks') )) {
        $bodyClass .= 'thanks';
    }
    ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class($bodyClass); ?> id="body">
<a id="top"></a>
<div class="l-body-wrap">
    <header class="l-header">
        <p class="l-header-logo"><a href="<?= home_url() ?>/"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/logo-wh.svg" alt="ゴルフだより"/></a></p>
        <nav class="l-header-nav">
            <ul>
                <li><a href="<?= home_url() ?>/outdoor/">アウトドアゴルフ練習場</a></li>
                <li><a href="<?= home_url() ?>/indoor/">インドアゴルフ練習場</a></li>
                <li><a href="<?= home_url() ?>/school/">ゴルフスクール</a></li>
                <li><a href="<?= home_url() ?>/goods/">ゴルフグッズ</a></li>
                <li><a href="<?= home_url() ?>/other/">ゴルフノウハウ・その他</a></li>
            </ul>
        </nav>
        <button class="l-header-menu">
            <div><span></span><span></span><span></span></div>
        </button>
        <div class="l-header-drawer is-section-dark">
            <div class="l-header-drawer__wrap">
                <div class="l-header-drawer-nav">
                    <div class="l-header-drawer-nav-item">
                        <h3 class="l-header-drawer-nav-item__title">Links</h3>
                        <ul class="l-header-drawer-nav-item__list">
                            <li><a href="<?= home_url() ?>/outdoor/">アウトドアゴルフ練習場</a></li>
                            <li><a href="<?= home_url() ?>/indoor/">インドアゴルフ練習場</a></li>
                            <li><a href="<?= home_url() ?>/school/">ゴルフスクール</a></li>
                            <li><a href="<?= home_url() ?>/goods/">ゴルフグッズ</a></li>
                            <li><a href="<?= home_url() ?>/other/">ゴルフノウハウ・その他</a></li>
                        </ul>
                    </div>
                    <div class="l-header-drawer-nav-item">
                        <h3 class="l-header-drawer-nav-item__title">掲載・提携</h3>
                        <ul class="l-header-drawer-nav-item__list">
                            <li><a href="#">お問い合わせ</a></li>
                            <li><a href="#">会社概要</a></li>
                            <li><a href="#">ゴルフスクール</a></li>
                            <li><a href="#">ゴルフグッズ</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="l-header-drawer-nav2">
                    <li><a href="#">利用規約</a></li>
                    <li><a href="#">プライバシーポリシー</a></li>
                    <li><a href="#">特定商取引法に基づく表記</a></li>
                </ul>
                <p class="l-header-drawer-copyright">Copyright © GOLFDAYORI  All Rights Reserved.</p>
            </div>
        </div>
    </header>
    <main class="l-main" id="main">