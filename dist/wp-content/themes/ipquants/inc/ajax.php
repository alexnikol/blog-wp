<?php

function get_captcha_valid(){

	$ch = curl_init();

	curl_setopt_array( $ch, [
		CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => [
			'secret' => '6LdGlVwUAAAAACJhQQrdwAHoUdcpGz0ciftVZ5xd',
			'response' => $_POST['g-recaptcha-response'],
			'remoteip' => $_SERVER['REMOTE_ADDR']
		],
		CURLOPT_RETURNTRANSFER => true
	]);

	$output = curl_exec($ch);
	curl_close($ch);

	$json = json_decode($output);

	if ( $json->success == true )
		exit ( 'true' );

	exit( 'false' );


}

add_action('wp_ajax_captcha_valid','get_captcha_valid');

add_action('wp_ajax_nopriv_captcha_valid', 'get_captcha_valid');