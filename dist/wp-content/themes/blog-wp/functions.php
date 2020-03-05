<?php

    define( 'TEMPLATEINC', TEMPLATEPATH . '/inc' );
    define( 'TEMPLATEURI', get_template_directory_uri() );
    define( 'DIRECT', TEMPLATEURI.'/assets/' );

    define( 'HOME', 14 );
    define( 'CONTACT_US', 231 );
    define( 'DEMO', 819 );
    define( 'BLOG', 14 );

	require_once( TEMPLATEINC . '/actions.php' );
	require_once( TEMPLATEINC . '/cpt.php' );
	require_once( TEMPLATEINC . '/ajax.php' );