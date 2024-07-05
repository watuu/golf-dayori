<?php get_header(); ?>




    <div class="p-top">
        <section class="p-top-mv"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-mv.webp"/></section>
        <section style="margin: 100px 0;">
            <div class="l-container">
                <div class="cm-article-list">
                    <div class="cm-article-list__head">
                        <div class="c-heading c-heading--center c-heading--sub">
                            <p class="c-heading__sub">アウトドアゴルフ練習場</p>
                            <h2 class="c-heading__main">Outdoor Driving Range</h2>
                        </div>
                    </div>
                    <div class="cm-article-list__body">
                        <?php
                        $args = [
                            // 'p' => 1,
                            'paged' => 1,
                            'posts_per_page' => -1,
                            'post_type' => 'outdoor',
                        ];
                        $wp_query = new WP_Query($args);
                        if (have_posts()) :
                            ?>
                            <?php get_template_part('template/loop-article') ?>
                        <?php endif; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </section>

        <section style="margin: 100px 0;">
            <div class="l-container">
                <div class="cm-article-list">
                    <div class="cm-article-list__head">
                        <div class="c-heading c-heading--center c-heading--sub">
                            <p class="c-heading__sub">インドアゴルフ練習場</p>
                            <h2 class="c-heading__main">Indoor Driving Range</h2>
                        </div>
                    </div>
                    <div class="cm-article-list__body">
                        <?php
                        $args = [
                            // 'p' => 1,
                            'paged' => 1,
                            'posts_per_page' => -1,
                            'post_type' => 'indoor',
                        ];
                        $wp_query = new WP_Query($args);
                        if (have_posts()) :
                        ?>
                            <?php get_template_part('template/loop-article') ?>
                        <?php endif; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </section>
        <section style="margin: 100px 0;">
            <div class="l-container">
                <div class="cm-article-list">
                    <div class="cm-article-list__head">
                        <div class="c-heading c-heading--center">
                            <p class="c-heading__sub">ゴルフスクール</p>
                            <h2 class="c-heading__main">Golf Schools</h2>
                        </div>
                    </div>
                    <div class="cm-article-list__body">
                        <div class="c-card-btn">
                            <a class="c-card-btn__link" href="#">
                                <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure><div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div>
                            </a>
                        </div>
                        <div class="c-card-btn">
                            <a class="c-card-btn__link" href="#">
                                <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure><div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div>
                            </a>
                        </div>
                        <div class="c-card-btn">
                            <a class="c-card-btn__link" href="#">
                                <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure><div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="margin: 100px 0;">
            <div class="l-container">
                <div class="cm-article-list">
                    <div class="cm-article-list__head">
                        <div class="c-heading c-heading--center">
                            <p class="c-heading__sub">ゴルフグッズ</p>
                            <h2 class="c-heading__main">Golf Goods</h2>
                        </div>
                    </div>
                    <div class="cm-article-list__body">
                        <div class="c-card-btn">
                            <a class="c-card-btn__link" href="#">
                                <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure><div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div>
                            </a>
                        </div>
                        <div class="c-card-btn">
                            <a class="c-card-btn__link" href="#">
                                <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure><div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div>
                            </a>
                        </div>
                        <div class="c-card-btn">
                            <a class="c-card-btn__link" href="#">
                                <figure class="c-card-btn__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/600x180.webp"/></figure><div class="c-card-btn__wrap"><span class="c-card-btn__title">福岡ゴルフスクール</span><i class="c-card-btn__ico"><svg width="20" height="20"><use href="#ico-arrow-right"></use></svg></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>