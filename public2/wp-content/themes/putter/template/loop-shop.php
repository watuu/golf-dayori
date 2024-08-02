<?php
$settings = [
    'id' => $args['shop_id'],
    'cnt' => $args['cnt'],
    'pic' => theme_get_picture(get_field('画像', $args['shop_id']), 'shop'),
    '設備' => get_field('設備', $args['shop_id']),
];

// Define the associative array mapping facilities to images
$facility_images = array(
    'facility01' => '24hours.svg',
    'facility02' => 'manned.svg',
    'facility03' => 'unmanned.svg',
    'facility04' => 'timebased.svg',
	'facility05' => 'rentalclub2.svg',
    'facility06' => 'rentalshoes.svg',
    'facility07' => 'gloves.svg',
    'facility08' => 'virtual.svg',
    'facility09' => 'food.svg',
    'facility10' => 'coffee.svg',
    'facility11' => 'group.svg',
    'facility12' => 'visiter.svg',
    'facility13' => 'analysis.svg',
    'facility14' => 'measure.svg',
    'facility15' => 'left.svg',
    'facility16' => 'putting.svg',
    'facility17' => 'bunker.svg',
    'facility18' => 'teeing.svg',
    'facility19' => 'room.svg',
    'facility20' => 'vip.svg',
    'facility21' => 'tilt.svg',
    'facility22' => 'WC.svg',
    'facility23' => 'changing.svg',
    'facility24' => 'lesson.svg',
    'facility25' => 'school.svg',
    'facility26' => 'expert.svg',
    'facility27' => 'golfshop.svg',
    'facility28' => 'timebased.svg',
    'facility29' => 'rest.svg',
    'facility30' => 'lounge.svg',
    'facility31' => 'shower.svg',
    
);

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
            <figure>
                <?php 
                // Get the image URL from the associative array
                $image_url = isset($facility_images[$facility['value']]) ? $facility_images[$facility['value']] : 'default-image.svg';
                ?>
                <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/<?= $image_url ?>"/>
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
