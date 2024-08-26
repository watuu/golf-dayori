<?php get_header(); ?>
<link href="<?= get_stylesheet_directory_uri() ?>/assets/css/style.css" rel="stylesheet"/>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
        $settings = [
            'post_type' => get_post_type_object($post->post_type),
            'eyecatch' => wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'),
            'eyecatch_src' => get_stylesheet_directory_uri(). '/assets/img/cm-main-mv-bg.webp',
            'heading' => get_field('見出し'),
            'clubs' => get_field('おすすめクラブ'),
            'clubs_count' => 0,
            '自由記述' => [
                '見出し' => get_field('自由記述_見出し'),
                '内容' => get_field('自由記述_内容'),
            ],
            'まとめ' => get_field('まとめ'),
            '記事監修者紹介' => get_field('記事監修者紹介'),
        ];
        $settings['clubs_count'] = count($settings['clubs']);
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
                <?php the_content(); ?>
                <div class="cm-article-shops">
                    <div class="cm-article-shops__head" id="i-club">
                        <h2 class="c-heading-bar"><?= $settings['heading'] ?>のおすすめ<?= $settings['clubs_count'] ?>選</h2>
                    </div>
                    <div class="cm-article-shops__list">
                        <?php foreach ($settings['clubs'] as $k => $club): ?>
                            <?php get_template_part('template/loop-club', null, ['post_id' => $club['クラブ'], 'cnt' => $k+1]) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="cm-article-hikaku">
                    <div class="cm-article-hikaku__head" id="i-compare">
                        <h2 class="c-heading-bar"><?= $settings['heading'] ?>比較一覧</h2>
                    </div>
                    <div class="cm-article-hikaku__body">
                        <table class="cm-article-hikaku-table">
                            <thead class="cm-article-hikaku-table__head">
                            <tr>
                                <th>メーカー</th>
                                <td>モデル</td>
                                <td>価格</td>
                                <td>長さ</td>
                                <td>重量</td>
                                <td>ロフト角</td>
                            </tr>
                            </thead>
                            <tbody class="cm-article-hikaku-table__body">
                            <?php foreach ($settings['clubs'] as $k => $club): ?>
                                <?php get_template_part('template/loop-club-hikaku', null, ['post_id' => $club['クラブ'], 'cnt' => $k+1]) ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if ($settings['まとめ']): ?>
                    <div class="cm-article-matome">
                        <div class="cm-article-matome__head" id="i-matom">
                            <h2 class="c-heading-bar">まとめ</h2>
                        </div>
                        <div class="cm-article-matome__body">
                            <?= get_field('まとめ') ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($settings['記事監修者紹介']): ?>
                    <div class="cm-article-block">
                        <div class="cm-article-block__head" id="i-author">
                            <h2 class="c-heading-bar">記事監修者紹介</h2>
                        </div>
                        <div class="cm-article-block__body">
                            <?= get_field('記事監修者紹介') ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>