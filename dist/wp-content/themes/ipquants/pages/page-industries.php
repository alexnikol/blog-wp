<?php

    /*
        Template Name: Industries Page
    */

    get_header();

?>

    <!-- article -->
    <article class="article">

	    <?= wpautop( get_post_field('post_content' ) ); ?>

    </article>
    <!-- /article -->

    <?php

    $args = array(
        'post_type'   => 'industries',
        'posts_per_page' => 6,
        'order'       => 'DESC',
        'fields'      => 'ids',
        'post_status' => 'publish',
        'suppress_filters' => false
    );

    $posts = get_posts( $args );

    if ( $posts ) { ?>

    <!-- industries -->
    <div class="industries">

        <div class="industries__text">
            <?php the_field( 'industries_list_text' ) ?>
        </div>

        <div class="industries__catalog">

	    <?php foreach ( $posts as $row ) { ?>

            <dl data-id="<?= $row ?>">
                <dt class="industries__tab-item">
                    <a href="#"><?= get_the_title( $row ); ?></a>
                    <span>learn more</span>
                </dt>
                <dd class="industries__content">

                    <h3 class="industries__topic"><?= get_the_title( $row ); ?></h3>

	                <?= wpautop( get_post_field('post_content', $row ) ); ?>

                </dd>
            </dl>

	    <?php } ?>

            <a href="#" class="industries__anchor">
                <svg viewBox="0 0 43 43">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(-1277.000000, -2679.000000)">
                        <g transform="translate(1277.000000, 2679.000000)">
                            <circle cx="21.5" cy="21.5" r="21.5"></circle>
                            <path d="M18.2486056,28.7417248 C18.410093,28.9109396 18.6310757,29 18.8435591,29 C19.0560425,29 19.2770252,28.9109396 19.4385126,28.7417248 L25.7535193,22.1245361 C25.9150066,21.9553214 26,21.7326703 26,21.5011133 C26,21.2695562 25.9150066,21.0469052 25.7535193,20.8776904 L19.4385126,14.2605017 C19.1070385,13.9131661 18.5800797,13.9131661 18.2486056,14.2605017 C17.9171315,14.6078373 17.9171315,15.1600119 18.2486056,15.5073475 L23.9686587,21.5011133 L18.2486056,27.494879 C17.9256308,27.8422146 17.9256308,28.4032952 18.2486056,28.7417248 Z" fill-rule="nonzero" transform="translate(22.000000, 21.500000) scale(1, -1) rotate(90.000000) translate(-22.000000, -21.500000) "></path>
                        </g>
                    </g>
                </svg>
            </a>

        </div>

    </div>
    <!-- /industries -->

    <?php } ?>

<?php get_footer(); ?>