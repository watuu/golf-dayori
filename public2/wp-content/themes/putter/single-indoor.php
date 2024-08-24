<?php get_header(); ?>
<link href="<?= get_stylesheet_directory_uri() ?>/assets/css/style.css" rel="stylesheet"/>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
        $settings = [
            'post_type' => get_post_type_object($post->post_type),
            'eyecatch' => wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'),
            'eyecatch_src' => get_stylesheet_directory_uri(). '/assets/img/cm-main-mv-bg.webp',
            'area' => get_the_terms(null, 'area'),
            'area_middle' => get_field('中エリア'),
            'shops' => get_field('おすすめ練習場'),
            'shops_count' => 0,
            '自由記述' => [
                '見出し' => get_field('自由記述_見出し'),
                '内容' => get_field('自由記述_内容'),
            ],
            '記事監修者紹介' => get_field('記事監修者紹介'),
        ];
        $settings['shops_count'] = count($settings['shops']);
        $settings['eyecatch_src'] = $settings['eyecatch'] ? array_shift($settings['eyecatch']): $settings['eyecatch_src'];
    ?>
    <div class="p-article">
        <div class="cm-main-mv">
            <figure class="cm-main-mv__bg"><img src="<?= $settings['eyecatch_src'] ?>"/></figure>
            <div class="cm-main-mv__wrap">
                <div class="l-container">
                    <div class="cm-main-mv__inner">
                        <p class="cm-main-mv__label"><?= $settings['post_type']->name ?></p>
                        <h1 class="cm-main-mv__title" data-budoux="data-budoux"><?= get_the_title() ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <ul class="cm-main-breadcrumb">
            <li><a href="<?= home_url() ?>/">ゴルフだより</a></li>
            <li><a href="<?= home_url() ?>/"><?= $settings['post_type']->label ?></a></li>
            <li><span><?= get_the_title() ?></span></li>
        </ul>
        <div class="p-article__content">
            <div class="cm-article">
                <div class="cm-article-editor">
                    <?= get_field('概要') ?>
                </div>
                <div class="cm-article-index">
                    <div class="cm-article-index__head">
                        <p>目次</p>
                    </div>
                    <div class="cm-article-index__list">
                        <ol>
                            <li><a href="#h1">1. <?= $settings['area_middle'] ?>のシミュレーションゴルフ練習場<?= $settings['shops_count'] ?>選</a>
                                <ol>
                                    <?php foreach ($settings['shops'] as $k => $shop): ?>
                                        <li><a href="#h1-<?= $k + 1 ?>">1-<?= $k + 1 ?>. <?= get_the_title($shop['練習場']) ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </li>
                            <li><a href="#h2">2. 店舗比較一覧</a></li>
                            <li><a href="#h3">3. <?= $settings['自由記述']['見出し'] ?></a></li>
                            <li><a href="#h4">4. まとめ</a></li>
                            <?php if ($settings['記事監修者紹介']): ?>
                            <li><a href="#h5">5. 記事監修者紹介</a></li>
                            <?php endif; ?>
                        </ol>
                    </div>
                </div>
                <div class="cm-article-shops">
                    <div class="cm-article-shops__head" id="h1">
                        <h2 class="c-heading-bar">1. <?= $settings['area_middle'] ?>のシミュレーションゴルフ練習場<?= $settings['shops_count'] ?>選</h2>
                    </div>
                    <div class="cm-article-shops__list">
                        <?php foreach ($settings['shops'] as $k => $shop): ?>
                            <?php get_template_part('template/loop-shop', null, ['shop_id' => $shop['練習場'], 'indoor' => true, 'cnt' => $k+1]) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="cm-article-hikaku">
                    <div class="cm-article-hikaku__head" id="h2">
                        <h2 class="c-heading-bar">2. 店舗比較一覧</h2>
                    </div>
                    <div class="cm-article-hikaku__body">
                        <table class="cm-article-hikaku-table">
                            <thead class="cm-article-hikaku-table__head">
                            <tr>
                                <th>店舗名</th>
                                <td>営業時間</td>
                                <td>駐車場</td>
                                <td>料金</td>
                                <td>打席数</td>
                                <td>シミュレーター</td>
                            </tr>
                            </thead>
                            <tbody class="cm-article-hikaku-table__body">
                            <?php foreach ($settings['shops'] as $k => $shop): ?>
                                <?php get_template_part('template/loop-shop-hikaku', null, ['shop_id' => $shop['練習場'], 'indoor' => true, 'cnt' => $k+1]) ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="cm-article-block">
                    <div class="cm-article-block__head" id="h3">
                        <h2 class="c-heading-bar">3. <?= $settings['自由記述']['見出し'] ?></h2>
                    </div>
                    <div class="cm-article-block__body">
                        <?= $settings['自由記述']['内容'] ?>
                    </div>
                </div>
                <div class="cm-article-matome">
                    <div class="cm-article-matome__head" id="h4">
                        <h2 class="c-heading-bar">4. まとめ</h2>
                    </div>
                    <div class="cm-article-matome__body">
                        <?= get_field('まとめ') ?>
                    </div>
                </div>
                <?php if ($settings['記事監修者紹介']): ?>
                <div class="cm-article-block">
                    <div class="cm-article-block__head" id="h5">
                        <h2 class="c-heading-bar">5. 記事監修者紹介</h2>
                    </div>
                    <div class="cm-article-block__body">
                        <?= get_field('記事監修者紹介') ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
<!--         <div class="p-article__related">
            <div class="cm-article-list">
                <div class="cm-article-list__head">
                    <div class="c-heading c-heading--center c-heading--sub">
                        <p class="c-heading__sub">Related Articles</p>
                        <h2 class="c-heading__main">他おすすめ記事</h2>
                    </div>
                </div>
                <div class="cm-article-list__body">
                    <div class="c-card-article"><a class="c-card-article__link" href="#">
                            <figure class="c-card-article__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x450.webp" alt=""/></figure>
                            <div class="c-card-article__meta"><span class="c-card-article__date">2024年5月1日</span>
                                <h3 class="c-card-article__title">親譲りの無鉄砲で小供の時から損ばかりしている</h3>
                            </div></a></div>
                    <div class="c-card-article"><a class="c-card-article__link" href="#">
                            <figure class="c-card-article__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x450.webp" alt=""/></figure>
                            <div class="c-card-article__meta"><span class="c-card-article__date">2024年5月1日</span>
                                <h3 class="c-card-article__title">親譲りの無鉄砲で小供の時から損ばかりしている</h3>
                            </div></a></div>
                    <div class="c-card-article"><a class="c-card-article__link" href="#">
                            <figure class="c-card-article__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x450.webp" alt=""/></figure>
                            <div class="c-card-article__meta"><span class="c-card-article__date">2024年5月1日</span>
                                <h3 class="c-card-article__title">親譲りの無鉄砲で小供の時から損ばかりしている</h3>
                            </div></a></div>
                </div>
            </div>
        </div> -->
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>