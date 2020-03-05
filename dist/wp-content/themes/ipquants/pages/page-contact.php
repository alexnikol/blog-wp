<?php

    /*
        Template Name: Contact Us Page
    */

    get_header();

    $id = get_the_ID();

?>

    <!-- hero-contact -->
    <div class="hero-contact">

        <!-- hero-contact__layout -->
        <div class="hero-contact__layout">

            <div class="hero-contact__content">
                <h1><?= get_the_title(); ?></h1>
                <div><?= wpautop( get_post_field('post_content' ) ); ?></div>
            </div>

        </div>
        <!-- /blog-hero__layout -->

    </div>
    <!-- /blog-hero -->

    <!-- contact -->
    <div class="contact">

        <?php if ( $id == CONTACT_US ): ?>

        <!-- contact__address -->
        <address class="contact__address">
            <dl>
                <dt>Contact Information</dt>
                <dd>
	                <?php the_field( 'address' ) ?>
                </dd>
            </dl>
        </address>
        <!-- /contact__address -->

        <?php endif; ?>

        <!-- contact__form -->
        <form class="contact__form" method="post" novalidate data-action="<?php echo admin_url( 'admin-ajax.php' );?>">

            <div class="contact__form-frame">

                <label>
                    <span>What Is Your Name? <i>*</i></span>
                    <input type="text" name="your-name" size="40" aria-required="true" aria-invalid="false" required /></label>

                <label>
                    <span>Company Name? <i>*</i></span>
                    <input type="text" name="your-company" size="40" aria-required="true" aria-invalid="false" required />
                </label>

                <label>
                    <span>What Is Your E-mail Address? <i>*</i></span>
                    <input type="email" name="your-email" size="40" aria-required="true" aria-invalid="false" required />
                </label>

                <label>
                    <span>What Is Your Title?</span>
                    <input type="text" name="your-title" size="40" aria-invalid="false" />
                </label>

            </div>

            <label>
                <?php if ( $id == CONTACT_US ): ?>
                    <span>Enter Your Message <i>*</i></span>
                <?php elseif( $id == DEMO ): ?>
                    <span>Which of our products are you mainly interested in? <i>*</i></span>
                <?php endif; ?>
                <textarea name="your-message" cols="40" rows="10" aria-required="true" aria-invalid="false" required></textarea>
            </label>

            <div class="contact__form-btn-wrap">

                <div class="g-recaptcha" data-sitekey="6LdGlVwUAAAAAPBy18snmm2FIfNZhExMzJLYkvU7"></div>

                <button type="submit" class="btn btn--color-1 btn--type-2" data-popup="permission-contact"><span>SEND MESSAGE</span></button>

            </div>

            <div class="contact-form__preload preload">
                <div class="preloader__wrap">
                    <hr><hr><hr><hr>
                </div>
            </div>

        </form>
        <!-- /contact__form -->

    </div>
    <!-- /contact -->

    <?php if( $id == DEMO ): ?>
        <script> function createFcn(nm){(window.freshsales)[nm]=function(){(window.freshsales).push([nm].concat(Array.prototype.slice.call(arguments,0)))}; } (function(url,appToken,formCapture){window.freshsales=window.freshsales||[];if(window.freshsales.length==0){list='init identify trackPageView trackEvent set'.split(' ');for(var i=0;i<list.length;i++){var nm=list[i];createFcn(nm);}var t=document.createElement('script');t.async=1;t.src='https://d952cmcgwqsjf.cloudfront.net/assets/analytics.js';var ft=document.getElementsByTagName('script')[0];ft.parentNode.insertBefore(t,ft);freshsales.init('https://ipquants.freshsales.io','367711b21dca804fa1c077d4be5c700114c4af85e825ff122faa5e4e0fd54203',true);}})();</script>
    <?php endif; ?>

<?php get_footer(); ?>