<?php
$settings = [
    'id' => $args['post_id'],
    'cnt' => $args['cnt'],
    'pic' => theme_get_picture(get_field('画像', $args['post_id']), 'shop'),
];

?>

<div class="cm-article-shop cm-article-shop--club" id="h1-<?= $settings['cnt'] ?>">
    <h3 class="cm-article-shop__title">1-<?= $settings['cnt'] ?> <?= get_the_title($settings['id']) ?></h3>
    <?php if ($settings['pic']): ?>
        <figure class="cm-article-shop__pic"><img src="<?= $settings['pic'] ?>"/></figure>
    <?php endif; ?>
    <p class="cm-article-shop__desc">
    <?= get_field('概要', $settings['id']) ?>
    </p>

    <div class="cm-article-shop__info">
        <?php if (get_field('基本情報_メーカー', $settings['id'])): ?>
        <dl>
            <dt>メーカー</dt>
            <dd><?= get_field('基本情報_メーカー', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_モデル', $settings['id'])):  ?>
        <dl>
            <dt>モデル</dt>
            <dd><?= get_field('基本情報_モデル', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_セット内容', $settings['id'])): ?>
        <dl>
            <dt>セット内容</dt>
            <dd><?= get_field('基本情報_セット内容', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_価格', $settings['id'])): ?>
        <dl>
            <dt>価格 <small>（メーカー）</small></dt>
            <dd><?= get_field('基本情報_価格', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_長さ', $settings['id'])): ?>
        <dl>
            <dt>長さ <small>（インチ）</small></dt>
            <dd><?= get_field('基本情報_長さ', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_重量', $settings['id'])): ?>
        <dl>
            <dt>重量 <small>（g）</small></dt>
            <dd><?= get_field('基本情報_重量', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_ロフト角', $settings['id'])): ?>
        <dl>
            <dt>ロフト角 <small>（°）</small></dt>
            <dd><?= get_field('基本情報_ロフト角', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_トルク', $settings['id'])): ?>
        <dl>
            <dt>トルク <small>（deg）</small></dt>
            <dd><?= get_field('基本情報_トルク', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_Tip', $settings['id'])): ?>
        <dl>
            <dt>Tip<small>（mm）</small>径/バラレル長 <small>（mm）</small></dt>
            <dd><?= get_field('基本情報_Tip', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_Butt径', $settings['id'])): ?>
        <dl>
            <dt>Butt径 <small>（mm）</small></dt>
            <dd><?= get_field('基本情報_Butt径', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_キックポイント', $settings['id'])): ?>
        <dl>
            <dt>キックポイント</dt>
            <dd><?= get_field('基本情報_キックポイント', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_フレックス', $settings['id'])): ?>
        <dl>
            <dt>フレックス</dt>
            <dd><?= get_field('基本情報_フレックス', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
        <?php if (get_field('基本情報_シャフトの型さ', $settings['id'])): ?>
        <dl>
            <dt>シャフトの型さ</dt>
            <dd><?= get_field('基本情報_シャフトの型さ', $settings['id']) ?></dd>
        </dl>
        <?php endif; ?>
    </div>
</div>
