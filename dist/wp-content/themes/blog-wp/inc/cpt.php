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
