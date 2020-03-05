<?php

    /*
        Template Name: Product Page
    */

    get_header();

?>

    <div class="hero-inner hero-inner--about-us js-back-picture">

        <img src="<?= DIRECT ?>img/back_good_hero.jpg" alt="img"/>

        <div class="hero-inner__layout">

            <div class="hero-inner__content">
                <h2><?php
                    $title = get_field( 'title' );

                    if ( $title !== '' ){
                        echo $title;
                    } else {
                        echo get_the_title();
                    }

                    ?></h2>
                <br/>
                <br/>
                <a href="<?= get_permalink( DEMO ) ?>" class="btn btn--color-1 btn--type-2"><span>Let's get started</span></a>

            </div>

        </div>

    </div>

    <?= wpautop( get_post_field('post_content' ) ); ?>

    <?php $list = get_field( 'product' );

    if ( $list ) { ?>

    <!-- products -->
    <ul class="products">

	    <?php foreach ( $list as $row) { ?>

            <!-- products__item -->
        <li class="products__item">

            <h3 class="products__topic"><?= $row[ 'title' ] ?></h3>

            <!-- products__pic -->
            <div class="products__pic">

                <div>
                    <img src="<?= $row[ 'picture' ] ?>" alt="<?= $row[ 'title' ] ?>"/>
                    <span>1</span>
                    <span>2</span>
                    <span>3</span>
                </div>

                <ul>

                <?php foreach ( $row[ 'promo' ] as $item ) { ?>

                    <li class="products__label">
	                    <?= wpautop( $item[ 'text' ] ) ?>
                    </li>

                <?php } ?>

                </ul>

            </div>
            <!-- /products__pic -->

        </li>
        <!-- /products__item -->

	    <?php } ?>

    </ul>
    <!-- /products -->

    <?php  } ?>

<?php get_footer(); ?>