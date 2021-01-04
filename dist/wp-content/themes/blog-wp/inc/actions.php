<?php
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'feed_links', 2);
	remove_action( 'wp_head', 'wp_resource_hints', 2 );
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
	remove_action('wp_head', 'signuppageheaders');

	add_filter('xmlrpc_enabled', '__return_false');
	// close required actions

	// Custom Logo
    function add_logo() {

        $logo_img = '';

        if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
            $logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
                'itemprop' => 'logo',
            ) );
        }

        echo $logo_img;

    };

    add_theme_support( 'custom-logo' );

    // Add Post Preview Image
	if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

    // Register Menu
	register_nav_menus( array(
		'header_menu' => 'top_menu',
		'footer_menu' => 'footer_menu'
	) );

	// Add Styles and Scripts
	function add_files() {

		// scripts
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri() . '/assets/js/vendors/jquery-3.3.1.min.js',false, false, true);
		wp_register_script('common-js', get_template_directory_uri() . '/assets/js/index.min.js', false, false, true);

		// styles
		wp_register_style('main-styles', get_template_directory_uri() . '/assets/css/common.css' );

		// enqueue
		wp_enqueue_script('jquery');
		wp_enqueue_script('common-js');
		wp_enqueue_style( 'main-styles' );
	}

    add_action( 'wp_enqueue_scripts', 'add_files' );

    // Text Editor
	add_filter( 'the_content', 'wpautop' );
