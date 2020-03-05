<?php

    /*
        Template Name: Why We Are Page
    */

    get_header();

?>

    <!-- why-we-are -->
    <div class="why-we-are">

	    <?= wpautop( get_post_field('post_content' ) ); ?>

        <?php $list = get_field( 'list' );

        if ( $list ) { ?>

        <ul>

	        <?php foreach ( $list as $row) { ?>

            <li>

                <dl>
                    <dt><?= $row[ 'topic' ] ?></dt>
                    <dd><?= wpautop( $row[ 'text' ] ) ?></dd>
                </dl>

	            <?php $footnote = $row[ 'footnote' ];

                if ( $footnote !== '' ){

                ?>

                <!-- why-we-are__footnote -->
                <div class="why-we-are__footnote">

	                <?= wpautop( $footnote ); ?>

                    <img src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt="img"/>

                </div>
                <!-- /why-we-are__footnote -->

                 <?php } ?>

            </li>

	        <?php } ?>

        </ul>

        <?php  } ?>

    </div>
    <!-- /why-we-are -->

<?php get_footer(); ?>