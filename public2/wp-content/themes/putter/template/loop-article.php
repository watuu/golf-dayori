<?php while (have_posts()) : the_post(); ?>
    <?php
    $thumbnail_id = get_post_thumbnail_id();
    $thumb = wp_get_attachment_image_src($thumbnail_id, 'medium');
    $src = ($thumb)?
        array_shift($thumb):
        sprintf('%s/assets/img/600x450.webp', get_stylesheet_directory_uri());
    ?>
    <div class="c-card-article">
        <a class="c-card-article__link" href="<?= get_the_permalink() ?>">
            <figure class="c-card-article__pic"><img src="<?= $src ?>" alt=""/></figure>
            <div class="c-card-article__meta"><span class="c-card-article__date"><?= get_the_time('Y年n月j日') ?></span>
                <h3 class="c-card-article__title"><?= get_the_title() ?></h3>
            </div>
        </a>
    </div>
<?php endwhile; ?>
