<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right').bloginfo('name') ?></title>
    <?php if (get_bloginfo('description')): ?>
        <meta name="description" content="<?php bloginfo('description')?>">
    <?php endif ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url') ?>/css/all.css" />
    <script src="<?php bloginfo('template_url') ?>/js/respond.js"></script>
    <?php wp_head() ?>
</head>
<body>

<div id="container">
    <div id="info">
        <a class="menu" href="#show-menu">Menu</a>
        <?php if (get_theme_mod('member_login')): ?>
            <a class="login" href="<?=get_theme_mod('member_login')?>" rel="nofollow">Member Login</a>
        <?php endif ?>
        <?php if (get_theme_mod('church_address')): ?>
            <div class="church_address"><strong>Church Address:</strong> <?=get_theme_mod('church_address')?></div>
        <?php endif ?>
        <?php if (get_theme_mod('service_times')): ?>
            <div class="sunday_services"><strong>Sunday Services:</strong> <?=get_theme_mod('service_times')?></div>
        <?php endif ?>
    </div>
    <div id="header">
        <?php if (get_theme_mod('header_logo')): ?>
            <a href="/" id="logo">
                <img src="<?=get_theme_mod('header_logo')?>" alt="<?php bloginfo('blogname')?>">
            </a>
        <?php endif ?>
        <?php wp_nav_menu([
            'theme_location' => 'main_menu',
            'depth' => 2,
            'menu_id' => 'menu',
            'menu_class' => 'menu',
            'container' => '',
        ]) ?>
    </div>
    <div id="content">
        <div class="banner">
            <?php if (has_post_thumbnail($post->ID)): ?>
                <?=get_the_post_thumbnail($post->ID, is_front_page() ? 'banner_large' : 'banner_small') ?>
            <?php endif ?>
        </div>
        <div id="wysiwyg">