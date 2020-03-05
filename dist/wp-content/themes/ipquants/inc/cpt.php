<?php

	show_admin_bar( false );

    // Remove Content Editor
    function remove_content_editor() {
        if( HOME == get_the_ID() ) {
            remove_post_type_support('page', 'editor');
        }
    }

    add_action( 'admin_head', 'remove_content_editor');

    // Remove Excess Menu's Items
	function remove_menus(){
		remove_menu_page( 'edit-comments.php' );
	}

	add_action( 'admin_menu', 'remove_menus' );

	// Register Custom Post Type
	function custom_post_type() {

		$industries_labels = array(
			'name' => 'Industries',
			'singular_name' => 'Industries',
			'menu_name' => 'Industries',
			'all_items' => 'All items',
			'add_new_item' => 'Add item',
			'add_new' => 'Add item',
			'edit_item' => 'Edit',
			'update_item' => 'Update',
			'search_items' => 'Search'
		);
		$industries_args = array(
			'labels' => $industries_labels,
			'supports' => array('title', 'editor','thumbnail'),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon' => 'dashicons-chart-area',
			'rewrite' => array(
				'with_front' => true
			)
		);
		register_post_type('industries', $industries_args);

	}

    add_action( 'init', 'custom_post_type', 0 );

    // Custom Dashboard Widgets
	function my_custom_dashboard_widgets() {
		global $wp_meta_boxes;
		wp_add_dashboard_widget('custom_help_widget', 'Notification dashboards', 'custom_dashboard_help');
	}

	function custom_dashboard_help() {
		echo '<p>Send email via <a href="https://login.mailchimp.com/" rel="nofollow" target="_blank">MailChimp</a>.</p>';
		echo '<p>Go to <a href="https://pipedrivewebforms.com/" rel="nofollow" target="_blank">PipeDrive</a>.</p>';
	}

    add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

    // Init Global ACF fields
	if( function_exists('acf_add_options_page') ) {

		$args = array(
			'page_title' => 'Site Settings',
			'menu_title' => '',
			'menu_slug' => '',
			'capability' => 'edit_posts',
			'position' => false,
			'parent_slug' => '',
			'icon_url' => false,
			'redirect' => true,
			'post_id' => 'options',
			'autoload' => false,
			'update_button'		=> __('Update', 'acf'),
			'updated_message'	=> __("Options Updated", 'acf'),
		);

		acf_add_options_page( $args );
	}

    // Prevent Update Plugins
    function filter_plugin_updates( $update ) {
        global $DISABLE_UPDATE;

        if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }

        foreach( $update->response as $name => $val ){
            foreach( $DISABLE_UPDATE as $plugin ){
                if( stripos($name,$plugin) !== false ){
                    unset( $update->response[ $name ] );
                }
            }
        }

        return $update;
    }

    add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );