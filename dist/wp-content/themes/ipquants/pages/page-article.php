<?php

    /*
        Template Name: Article Page
    */

    get_header();

?>

    <div class="hero-article">

        <img src="<?= DIRECT ?>img/back_good_hero_2.jpg" alt="img">

        <div class="hero-article__layout">

            <div class="hero-article__content">
                <h2><?php
                    $title = get_field( 'title' );

                    if ( $title !== '' ){
                        echo $title;
                    } else {
                        echo get_the_title();
                    }

                    ?></h2>
            </div>

        </div>

    </div>

    <div class="site__wrap">

    <div class="site__article">

    <!-- article -->
    <article class="article">

	    <?= wpautop( get_post_field('post_content' ) ); ?>

    </article>
    <!-- /article -->

    </div>
    </div>

<?php get_footer(); ?>