<?php

    /*
        Template Name: About Us Page
    */

    get_header();

?>

    <div class="hero-inner js-back-picture">

        <img src="<?= DIRECT ?>img/back_good_hero_2.jpg" alt="img"/>

        <div class="hero-inner__layout">

            <div class="hero-inner__content">
                <h2>Quantifying the World's Legal Data</h2>
                <p>ipQuants quantifies the world’s legal data in order to deliver data-driven legal insights to decision-makers. Strategically relevant data points from millions of court, patent and other valuable legal filings are published every day. ipQuants empowers its user to turn valuable insights into profitable actions.</p>
            </div>

        </div>

    </div>

    <?php $leadership = get_field( 'member' );

    if ( $leadership ) { ?>

    <section class="leadership">

        <div class="leadership__preface">
            <?php the_field( 'leadership' ); ?>
        </div>

        <ul>

	    <?php foreach ( $leadership as $row ) { ?>

            <!-- leadership__item -->
            <li class="leadership__item">

                <div class="leadership__ava">
                    <div>
                        <img src="<?= $row[ 'photo' ] ?>" alt="<?= $row[ 'name' ] ?>"/>
                    </div>
                </div>

                <!-- leadership__content -->
                <div class="leadership__content">

                    <h3 class="leadership__name"><?= $row[ 'name' ] ?></h3>
                    <div class="leadership__position"><?= $row[ 'post' ] ?></div>

                    <?php if ( $row[ 'linkedin' ] ): ?>
                    <a href="<?= $row[ 'linkedin' ] ?>" class="leadership__linkedin" target="_blank">
                        <svg viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-234.000000, -1192.000000)" fill-rule="nonzero">
                                    <g transform="translate(234.000000, 1192.000000)">
                                        <path d="M39.6896313,2.31033185 C38.1498643,0.770206391 36.2947119,0 34.1256106,0 L7.87505986,0 C5.70595854,0 3.8508061,0.770206391 2.31036873,2.31033185 C0.770218685,3.85074464 0,5.70577169 0,7.87493416 L0,34.1247785 C0,36.2937494 0.770218685,38.148968 2.31036873,39.6893808 C3.8508061,41.2297936 5.70595854,42 7.87505986,42 L34.1253232,42 C36.2944246,42 38.149577,41.2297936 39.6893439,39.6893808 C41.2297813,38.148968 42,36.2938452 42,34.1247785 L42,7.87493416 C42,5.70577169 41.2296855,3.85045732 39.6896313,2.31033185 Z M13.125,35 L7,35 L7,15.75 L13.125,15.75 L13.125,35 Z M12.1561595,12.9936957 C11.5101086,13.6645312 10.657446,14 9.59836019,14 L9.57120172,14 C8.54823288,14 7.7183909,13.6645312 7.08101568,12.9936957 C6.44354616,12.3228603 6.125,11.4917475 6.125,10.5001532 C6.125,9.48914995 6.45278758,8.65292959 7.10770264,7.99169646 C7.76308921,7.33066764 8.61103683,7 9.65192271,7 C10.6929029,7 11.5275542,7.33066764 12.1558766,7.99169646 C12.7840104,8.65292959 13.1071773,9.48914995 13.125,10.5001532 C13.1249057,11.4913389 12.8022103,12.3224517 12.1561595,12.9936957 Z M35.8746169,35 L29.5582556,35 L29.5582556,24.9416416 C29.5582556,22.1042767 28.5013147,20.685167 26.3866668,20.685167 C25.5846712,20.685167 24.909861,20.906523 24.3631939,21.349425 C23.8158564,21.7920422 23.405856,22.3298111 23.1328098,22.9629217 C23.004954,23.2878811 22.9413614,23.7938378 22.9413614,24.4805069 L22.9413614,35 L16.625,35 C16.6796859,23.649211 16.6796859,17.3769812 16.625,16.1839756 L22.9413614,16.1839756 L22.9413614,18.8404382 C24.269433,16.7815705 26.1552814,15.75 28.6015881,15.75 C30.7890228,15.75 32.5483562,16.4641131 33.8790137,17.8917694 C35.209767,19.3197106 35.875,21.4256794 35.875,24.2085362 L35.875,35 L35.8746169,35 Z"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <?php endif; ?>

                    <?//= wpautop( $row[ 'text' ] ); ?>

                </div>
                <!-- /leadership__content -->

            </li>
            <!-- /leadership__item -->

	    <?php } ?>

        </ul>

    </section>

    <?php } ?>

    <!-- request-demo -->
    <div class="request-demo">

        <div class="request-demo__layout">

            <div class="request-demo__content">
                <p>Want to answer your innovation questions faster?</p>
            </div>

            <a href="<?= DEMO ?>" class="btn btn--color-2 btn--type-3" target="_blank"><span>request a demo</span></a>

        </div>

    </div>
    <!-- /request-demo -->

<?php get_footer(); ?>
