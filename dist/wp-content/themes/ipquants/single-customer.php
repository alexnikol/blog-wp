<?php

/*
	Template Name: Single Customer Page
*/

get_header();

?>

	<!-- customer-hero -->
	<div class="customer-hero">

		<h1 class="customer-hero__title">Customer Profile: <?php the_field( 'customer_profile', $post -> ID ); ?></h1>

	</div>
	<!-- /customer-hero -->

	<!-- places -->
	<div class="customer">

		<div class="customer__img">
            <img src="<?= get_the_post_thumbnail_url( $post -> ID  ); ?>" alt="<?= get_the_title( $post -> ID  ); ?>"/>
		</div>

		<?= wpautop(get_post_field('post_content', $post->ID)); ?>

        <?php

            $file = get_field( 'case_study', $post -> ID );

            if ( $file != '' ){ ?>

                <a href="<?= $file ?>" class="btn btn_5">DOWNLOAD THIS CASE STUDY</a>

            <?php } ?>

	</div>
	<!-- /places -->

	<!-- request-demo -->
	<div class="request-demo">

		<h3 class="request-demo__title">Want to identify true innovators?</h3>

		<a href="<?php the_field( 'demo_link', 6 ) ?>" class="btn btn_3" target="_blank">
			<span>Schedule a Demo</span>
		</a>

	</div>
	<!-- /request-demo -->

<?php get_footer(); ?>