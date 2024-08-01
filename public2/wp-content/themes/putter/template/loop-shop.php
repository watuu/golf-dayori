<?php
    $settings = [
        'id' => $args['shop_id'],
        'cnt' => $args['cnt'],
        'pic' => theme_get_picture(get_field('画像', $args['shop_id']), 'shop'),
        '設備' => get_field('設備', $args['shop_id']),
    ];
    // var_dump($settings);
?>
<div class="cm-article-shop" id="h1-<?= $settings['cnt'] ?>">
    <h3 class="cm-article-shop__title">1-<?= $settings['cnt'] ?> <?= get_the_title($settings['id']) ?></h3>
    <?php if ($settings['pic']): ?>
        <figure class="cm-article-shop__pic"><img src="<?= $settings['pic'] ?>"/></figure>
    <?php endif; ?>
    <p class="cm-article-shop__desc">
    <?= get_field('概要', $settings['id']) ?>
    </p>
    <ul class="cm-article-shop__spec">
        <?php if ($settings['設備']): foreach ($settings['設備'] as $k => $facility ): ?>
        <li>
            <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-24h.svg?<?= $facility['value'] ?>"/>
                <figcaption><?= $facility['label'] ?></figcaption>
            </figure>
        </li>
        <?php endforeach; endif; ?>
    </ul>
    <div class="cm-article-shop__info">
        <dl>
            <dt>住所</dt>
            <dd><?= get_field('基本情報_住所', $settings['id']) ?></dd>
        </dl>
        <dl>
            <dt>電話番号</dt>
            <dd><?= get_field('基本情報_電話番号', $settings['id']) ?></dd>
        </dl>
        <dl>
            <dt>営業時間</dt>
            <dd><?= get_field('基本情報_営業時間', $settings['id']) ?></dd>
        </dl>
        <?php if (get_field('基本情報_URL', $settings['id'])): ?>
        <dl>
            <dt>URL</dt>
            <dd><a href="<?= get_field('基本情報_URL', $settings['id']) ?>" target="_blank"><?= get_field('基本情報_URL', $settings['id']) ?></a></dd>
        </dl>
        <?php endif; ?>
        <dl>
            <dt>駐車場</dt>
            <dd><?= get_field('基本情報_駐車場', $settings['id']) ?></dd>
        </dl>
        <dl>
            <dt>料金</dt>
            <dd><?= nl2br(get_field('基本情報_料金', $settings['id'])) ?></dd>
        </dl>
        <dl>
            <dt>打席数</dt>
            <dd><?= get_field('基本情報_打席数', $settings['id']) ?></dd>
        </dl>
        <dl>
            <dt>シミュレーター</dt>
            <dd><?= get_field('基本情報_シミュレーター', $settings['id']) ?></dd>
        </dl>
        <?php if (get_field('基本情報_距離', $settings['id'])): ?>
        <dl>
            <dt>距離</dt>
            <dd><?= get_field('基本情報_距離', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
    </div>
</div>