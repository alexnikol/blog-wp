<!-- site__aside -->
<aside class="site__aside">

	<?php get_search_form(); ?>

	<?php

    $count = wp_count_posts()->publish;

	$category = get_terms( array (
		'taxonomy' => 'post_tag',
		'hide_empty' => false,
	) );

	if( $category ) {

		?>

		<!-- blog-categories -->
		<section class="blog-categories">

			<ul class="blog-categories__wrap">

                <?php

                $active = '';

                if ( is_home() ){
                    $active = 'class="active"';
                }
                ?>
                <li><a href="<?= get_permalink(BLOG) ?>" <?= $active ?>>All (<?= $count ?>)</a></li>

				<?php

				$category = get_terms( array (
					'taxonomy' => 'post_tag',
					'hide_empty' => false,
				) );

				foreach ( $category as $row ) {
					$active = '';

					if( $row -> term_id === get_queried_object() -> term_id ) {
						$active = 'class="active"';
					}

					?>



					<li><a href="<?= get_category_link( $row -> term_id ) ?>" <?= $active ?>>
							<?= $row -> name ?>
							(<?= $row -> count ?>)
						</a></li>

				<?php } ?>

			</ul>

		</section>
		<!-- /blog-categories -->

	<?php } ?>

</aside>
<!-- /site__aside -->