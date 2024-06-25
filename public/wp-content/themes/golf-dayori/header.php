<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-language" content="ja">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- common css -->

	<!-- common js -->
	<script src="http://code.jquery.com/jquery.js"></script>

    <?php
    $bodyClass = '';
    if (is_front_page()) {
        $bodyClass .= 'page-front is-section-dark';
    }
    if ( is_parent_slug() == 'service' && (is_page('thanks') )) {
        $bodyClass .= 'thanks';
    }
    ?>
<?php wp_head(); ?>
</head>
<body <?php body_class($bodyClass); ?> id="body">
<header>
	<h1><?php bloginfo(); ?></h1>
</header>