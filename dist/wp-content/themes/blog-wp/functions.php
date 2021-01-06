<?php

    define( 'TEMPLATEINC', TEMPLATEPATH . '/inc' );
    define( 'TEMPLATEURI', get_template_directory_uri() );
    define( 'DIRECT', TEMPLATEURI.'/assets/' );

    define( 'HOME', 14 );
    define( 'ALG_and_DS', 53 );

	require_once( TEMPLATEINC . '/actions.php' );
	require_once( TEMPLATEINC . '/cpt.php' );
	require_once( TEMPLATEINC . '/ajax.php' );
