<?php

    /*
        Template Name: Customers Page
    */

    get_header();

?>

    <!-- places -->
    <div class="places">

	    <?= wpautop( get_post_field('post_content' ) ); ?>

        <?php

        $args = array(
            'post_type'   => 'customer',
            'order'       => 'DESC',
            'fields'      => 'ids',
            'post_status' => 'publish',
            'suppress_filters' => false
        );

        $posts = get_posts( $args );

        if ( $posts ) { ?>

        <!-- places__list -->
        <ul class="places__list">

	        <?php foreach ( $posts as $row ) { ?>

            <!-- places__list-item -->
            <li class="places__list-item">

                <div class="places__post"><?php the_field( 'customer_profile', $row ); ?></div>

                <div class="places__list-img">
                    <img src="<?= get_the_post_thumbnail_url( $row ); ?>" alt="<?= get_the_title( $row ); ?>"/>
                </div>

                <div class="places__btn-wrap">

                    <span class="places__place"><?php the_field( 'customer_place', $row ); ?></span>

                    <a href="<?= get_permalink($row); ?>" class="btn btn_2"><span>MORE</span></a>
                </div>

            </li>
            <!-- /places__list-item -->

	        <?php } ?>

        </ul>
        <!-- /places__list -->

        <?php } ?>

    </div>
    <!-- /places -->

<?php get_footer(); ?>