<?php require_once ('header.php'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php 
        $thumbnail_id = get_post_thumbnail_id();
        $thumb = wp_get_attachment_image_src($thumbnail_id, 'medium');
        $src = ($thumb)? 
            array_shift($thumb):
            sprintf('%s/assets/img/dummy.png', get_stylesheet_directory_uri());
        $terms = get_the_terms(null, 'category');
        $term = $terms? $terms[0]: (object)[];
     ?>
    <?php the_title(); ?>
<?php endwhile; endif; ?>
<?php require_once ('footer.php'); ?>