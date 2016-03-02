<?php

// Register main menu
register_nav_menu('main_menu', 'Main Menu');

// Register custom images sizes
add_theme_support('post-thumbnails');
add_image_size('banner_large', 900, 450, true);
add_image_size('banner_small', 900, 275, true);

// Force upscaling of images
add_filter(
    'image_resize_dimensions',
    function ($default, $orig_w, $orig_h, $new_w, $new_h, $crop) {
        if (!$crop) {
            return;
        }

        $aspect_ratio = $orig_w / $orig_h;
        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);

        $s_x = floor(($orig_w - $crop_w) / 2);
        $s_y = floor(($orig_h - $crop_h) / 2);

        return [ 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h ];
    },
    10,
    6
);

// Set content width
if (!isset($content_width)) {
    $content_width = 900;
}

// Setup main menu
function get_main_menu()
{
    wp_nav_menu([
        'theme_location' => 'main_menu',
        'depth' => 2,
        'container' => '',
        'fallback_cb' => function () {
            wp_nav_menu([
                'depth' => 2,
                'container' => '',
                'fallback_cb' => '',
            ]);
        },
    ]);
}

// Setup custom theme options
add_action('customize_register', function ($wp_customize) {

    $wp_customize->add_section('header', [
        'title' => 'Header',
        'priority' => 1,
    ]);

    $wp_customize->add_setting('header_logo');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'header_logo', [
            'label' => 'Logo',
            'section' => 'header',
            'settings' => 'header_logo',
            'priority' => 1,
        ])
    );

    $wp_customize->add_setting('church_address');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'church_address', [
            'label' => 'Church Address',
            'section' => 'header',
            'settings' => 'church_address',
            'priority' => 2,
        ])
    );

    $wp_customize->add_setting('service_times');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'service_times', [
            'label' => 'Service Times',
            'section' => 'header',
            'settings' => 'service_times',
            'priority' => 3,
        ])
    );

    $wp_customize->add_setting('member_login');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'member_login', [
            'label' => 'Member login',
            'section' => 'header',
            'settings' => 'member_login',
            'priority' => 4,
        ])
    );
});
