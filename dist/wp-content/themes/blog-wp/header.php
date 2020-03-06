<?php
    $home_id = 'options';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">

	<?php wp_head(); ?>

	<?php if( is_front_page() || get_the_title() === '' ){ ?>
        <title><?= get_bloginfo( 'name' ) .'. '. get_bloginfo( 'description' ); ?></title>
	<?php } else if ( is_home() ) {?>
        <title><?=  'IT - '. get_bloginfo( 'name' ) .' Blog'; ?></title>
	<?php } else {?>
        <title><?=  get_the_title() .' - '. get_bloginfo( 'name' ); ?></title>
	<?php } ?>

</head>

<body>

    <div class="preloader">
        <div class="preloader__wrap">
            <hr/><hr/><hr/><hr/>
        </div>
    </div>

    <!-- site -->
    <div class="site">
