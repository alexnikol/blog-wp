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


function cw_post_type_projects() {

    $supports = array(
        'title',
        'author',
        'thumbnail',
        'custom-fields'
    );

    $labels = array(
        'name' => _x('Projects', 'plural'),
        'singular_name' => _x('Projects', 'singular'),
        'menu_name' => _x('Projects', 'admin menu'),
        'name_admin_bar' => _x('Projects', 'admin bar'),
        'add_new' => _x('Add New', 'add project'),
        'add_new_item' => __('Add New project'),
        'new_item' => __('New project'),
        'edit_item' => __('Edit projects'),
        'view_item' => __('View projects'),
        'all_items' => __('All projects'),
        'search_items' => __('Search projects'),
        'not_found' => __('No projects found.'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'projects'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('projects', $args);
}

add_action('init', 'cw_post_type_projects');

function book_post_type_projects() {

    $supports = array(
        'title',
        'author',
        'thumbnail',
        'custom-fields'
    );

    $labels = array(
        'name' => _x('Books', 'plural'),
        'singular_name' => _x('Books', 'singular'),
        'menu_name' => _x('Books', 'admin menu'),
        'name_admin_bar' => _x('Books', 'admin bar'),
        'add_new' => _x('Add New', 'add book'),
        'add_new_item' => __('Add New book'),
        'new_item' => __('New book'),
        'edit_item' => __('Edit books'),
        'view_item' => __('View books'),
        'all_items' => __('All books'),
        'search_items' => __('Search books'),
        'not_found' => __('No books found.'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'books'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('books', $args);
}

add_action('init', 'book_post_type_projects');

function interview_questions_post_type() {

    $supports = array(
        'title',
        'author',
        'custom-fields'
    );

    $labels = array(
        'name' => _x('Interview Q/A', 'plural'),
        'singular_name' => _x('Interview Q/A', 'singular'),
        'menu_name' => _x('Interview Q/A', 'admin menu'),
        'name_admin_bar' => _x('Interview Q/A', 'admin bar'),
        'add_new' => _x('Add New', 'add question'),
        'add_new_item' => __('Add New question'),
        'new_item' => __('New question'),
        'edit_item' => __('Edit questions'),
        'view_item' => __('View questions'),
        'all_items' => __('All questions'),
        'search_items' => __('Search questions'),
        'not_found' => __('No questions found.'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'interview_question'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('interview_question', $args);
}

add_action('init', 'interview_questions_post_type');

function topic_category_taxonomy() {
    register_taxonomy('interview_question_category','interview_question',
        array(
            'hierarchical' => true,
            'label' => 'Question Category',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'interview_question_category'
            )
        )
    );
}
add_action( 'init', 'topic_category_taxonomy');
