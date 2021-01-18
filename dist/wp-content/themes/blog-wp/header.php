<?php
    $home_id = 'options';
    $linkedIn = 'https://www.linkedin.com/in/alexander-nikolaychuk';
    $mail = 'alexalmostengineer@gmail.com';
    $hackerRank = 'https://www.hackerrank.com/alexEngineer';
    $github = 'https://github.com/alexnikol';
    $medium = 'https://medium.com/almostengineer-ios-software-developer-blog'; ?>

<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">

    <?php $faviconPath = DIRECT . 'favicon'  ?>
    <link rel="manifest" href="<?= $faviconPath ?>/manifest.json">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $faviconPath ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $faviconPath ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $faviconPath ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $faviconPath ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $faviconPath ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $faviconPath ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $faviconPath ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $faviconPath ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $faviconPath ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= $faviconPath ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $faviconPath ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $faviconPath ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $faviconPath ?>/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $faviconPath ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
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

    <div id="preload">
        <span id="preload__loading-line"></span>
    </div>

    <header class="site-header">
        <div class="site-header__layout">

            <div class="author">

                <a href="<?= get_permalink(HOME); ?>" class="author__title">Alex_almost_engineer</a>

            </div>

            <div class="social">
                <a href="<?= $linkedIn; ?>" target="_blank" class="social__item soc-in">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 458.8 460" style="enable-background:new 0 0 458.8 460;" xml:space="preserve">
                            <rect y="143.7" width="102.6" height="316.2"/>
                        <path d="M382,147.5c-1.1-0.3-2.1-0.7-3.3-1c-1.4-0.3-2.8-0.6-4.2-0.8c-5.4-1.1-11.4-1.9-18.4-1.9c-59.8,0-97.7,43.6-110.2,60.5
                                v-60.5H143.4V460H246V287.5c0,0,77.5-108.3,110.2-28.8V460h102.6V246.6C458.8,198.8,426.1,159,382,147.5z"/>
                        <path d="M50.2,100.6c27.7,0,50.2-22.5,50.2-50.3C100.4,22.5,77.9,0,50.2,0C22.5,0,0,22.5,0,50.3C0,78.1,22.5,100.6,50.2,100.6z"/>
                        </svg>
                </a>
                <a href="<?= $twitter; ?>" target="_blank" class="social__item soc-tw">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 460 373.6" style="enable-background:new 0 0 460 373.6;" xml:space="preserve">
                        <path d="M412.7,93.1c0.3,4.1,0.3,8.2,0.3,12.3c0,124.6-94.9,268.2-268.2,268.2c-53.4,0-103-15.5-144.8-42.3    c7.6,0.9,14.9,1.2,22.8,1.2c44.1,0,84.6-14.9,117-40.3c-41.4-0.9-76.2-28-88.1-65.4c5.8,0.9,11.7,1.5,17.8,1.5    c8.5,0,16.9-1.2,24.8-3.2c-43.2-8.8-75.6-46.7-75.6-92.5v-1.2c12.5,7,27.1,11.4,42.6,12c-25.4-16.9-42-45.8-42-78.5    c0-17.5,4.7-33.6,12.8-47.6c46.4,57.2,116.2,94.6,194.4,98.7c-1.5-7-2.3-14.3-2.3-21.6c0-52,42-94.3,94.3-94.3    c27.1,0,51.7,11.4,68.9,29.8c21.3-4.1,41.7-12,59.8-22.8c-7,21.9-21.9,40.3-41.4,52c19-2,37.4-7.3,54.3-14.6    C447.2,63,431.1,79.7,412.7,93.1L412.7,93.1z"/>
                    </svg>
                </a>
                <a href="<?= $hackerRank; ?>" target="_blank" class="social__item soc-hakerrank">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 417.2 460" style="enable-background:new 0 0 417.2 460;" xml:space="preserve">
                            <path d="M407.4,115C394.4,92.6,234.6,0,208.6,0C182.6,0,22.7,92.4,9.7,115c-12.9,22.6-13,207.4,0,230c13,22.6,172.8,115,198.8,115
                                    c26,0,185.8-92.5,198.9-115C420.4,322.5,420.4,137.4,407.4,115z M262.5,372.1c-3.6,0-36.8-32.1-34.1-34.8
                                    c0.8-0.8,5.6-1.3,15.8-1.6c0-23.6,0.5-61.6,0.8-77.6c0-1.8-0.4-3.1-0.4-5.3h-71.8c0,6.4-0.4,32.5,1.2,65.5
                                    c0.2,4.1-1.4,5.4-5.2,5.3c-9.1,0-18.2-0.1-27.3-0.1c-3.7,0-5.3-1.4-5.2-5.5c0.8-30,2.7-75.5-0.1-191.1v-2.8
                                    c-8.7-0.3-14.7-0.9-15.5-1.7c-2.6-2.6,31-34.8,34.6-34.8c3.6,0,37,32.1,34.4,34.8c-0.8,0.8-7.1,1.3-15.1,1.7v2.8
                                    c-2.2,23.1-1.8,71.5-2.4,94.7h72.1c0-4.1,0.4-31.2-1.1-75.1c-0.1-3,0.9-4.6,3.8-4.7c9.9-0.1,19.9-0.1,29.9-0.1
                                    c3.1,0,4.1,1.5,4,4.8c-3.3,171.9-0.6,159.9-0.6,189c8,0.3,15.1,0.9,15.9,1.7C298.8,340,266,372.1,262.5,372.1L262.5,372.1z"/>
                        </svg>
                </a>
                <a href="<?= $medium; ?>" target="_blank" class="social__item soc-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 443.6 352" style="enable-background:new 0 0 443.6 352;" xml:space="preserve">
                            <path d="M52.6,71.8C53.1,66.4,51,61,47,57.3L5.6,7.4V0h128.6l99.4,218L321,0h122.6v7.4l-35.4,33.9c-3,2.3-4.6,6.1-3.9,9.9v249.5
                                c-0.6,3.8,0.9,7.6,3.9,9.9l34.6,33.9v7.4h-174v-7.4l35.9-34.8c3.5-3.5,3.5-4.6,3.5-9.9V98.3l-99.7,253H195L79.1,98.3v169.6
                                c-1,7.2,1.4,14.3,6.4,19.4l46.6,56.5v7.4H0v-7.3l46.6-56.6c5-5.1,7.2-12.4,6-19.4V71.8z"/>
                        </svg>
                </a>
                <a href="<?= $github; ?>" target="_blank" class="social__item soc-git">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 460 448.5" style="enable-background:new 0 0 460 448.5;" xml:space="preserve">
                            <path d="M153.9,361.1c0,1.9-2.1,3.3-4.8,3.3c-3.1,0.3-5.2-1.2-5.2-3.3c0-1.9,2.1-3.3,4.8-3.3C151.4,357.5,153.9,359,153.9,361.1z
                                 M125,357c-0.6,1.9,1.2,4,4,4.5c2.4,0.9,5.2,0,5.8-1.9c0.6-1.9-1.2-4-4-4.8C128.4,354.2,125.7,355.1,125,357L125,357z M166,355.4
                                c-2.7,0.6-4.5,2.4-4.3,4.5c0.3,1.9,2.7,3.1,5.5,2.4c2.7-0.6,4.5-2.4,4.3-4.3C171.2,356.3,168.7,355.1,166,355.4z M227,0
                                C98.4,0,0,97.7,0,226.3c0,102.9,64.7,190.9,157.2,221.8c11.9,2.1,16-5.2,16-11.2c0-5.8-0.3-37.5-0.3-56.9c0,0-64.9,13.9-78.6-27.6
                                c0,0-10.6-27-25.8-33.9c0,0-21.2-14.6,1.5-14.3c0,0,23.1,1.9,35.8,23.9c20.3,35.8,54.3,25.5,67.6,19.4
                                c2.1-14.8,8.2-25.1,14.8-31.3c-51.8-5.8-104.1-13.3-104.1-102.5c0-25.5,7-38.3,21.9-54.6c-2.4-6-10.3-30.9,2.4-63
                                c19.4-6,64,25,64,25c18.6-5.2,38.5-7.9,58.2-7.9c19.8,0,39.7,2.7,58.2,7.9c0,0,44.6-31.2,64-25c12.7,32.2,4.8,56.9,2.4,63
                                c14.8,16.4,23.9,29.2,23.9,54.6c0,89.5-54.6,96.6-106.5,102.5c8.5,7.3,15.8,21.2,15.8,43c0,31.3-0.3,69.9-0.3,77.5
                                c0,6,4.3,13.4,16,11.2C397.1,417.2,460,329.1,460,226.3C460,97.7,355.7,0,227,0z M90.1,319.9c-1.2,0.9-0.9,3.1,0.6,4.8
                                c1.5,1.5,3.6,2.1,4.8,0.9c1.2-0.9,0.9-3.1-0.6-4.8C93.5,319.3,91.4,318.7,90.1,319.9z M80.1,312.4c-0.6,1.2,0.3,2.7,2.1,3.6
                                c1.5,0.9,3.3,0.6,4-0.6c0.6-1.2-0.3-2.7-2.1-3.6C82.3,311.1,80.8,311.4,80.1,312.4z M110.2,345.4c-1.5,1.2-0.9,4,1.2,5.8
                                c2.1,2.1,4.8,2.4,6,0.9c1.2-1.2,0.6-4-1.2-5.7C114.2,344.2,111.4,343.9,110.2,345.4z M99.6,331.7c-1.5,0.9-1.5,3.3,0,5.5
                                c1.5,2.1,4,3.1,5.2,2.1c1.5-1.2,1.5-3.6,0-5.8C103.5,331.5,101.1,330.5,99.6,331.7L99.6,331.7z"/>
                        </svg>
                </a>
                <a href="mailto:<?= $mail; ?>" class="social__item soc-mail">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 460 345.9" style="enable-background:new 0 0 460 345.9;" xml:space="preserve">
                            <polygon points="371.9,0 88.1,0 230,112.4 		"/>
                        <polygon points="76.5,114.9 76.5,345.9 383.5,345.9 383.5,114.9 230,233.3 		"/>
                        <path d="M416.9,0h-14.4L230,136.6L57.5,0H43.1C19.3,0,0,19.4,0,43.2v259.4c0,23.9,19.3,43.2,43.1,43.2h14.4V76.3l172.5,133
                                L402.5,76.2v269.7h14.4c23.8,0,43.1-19.4,43.1-43.2V43.2C460,19.4,440.7,0,416.9,0z"/>
                        </svg>
                </a>
            </div>

            <form class="subscribe-form" method="post" action="https://alexalmostengineer.us19.list-manage.com/subscribe/post?u=b065e3f15464bd0d6caa4a3ae&amp;id=ba9874b9ae" target="_blank">
                <div class="subscribe-form__field">
                    <input type="email" name="EMAIL" placeholder="Your email address" required />
                    <input type="hidden" name="b_b065e3f15464bd0d6caa4a3ae_ba9874b9ae" tabindex="-1" value="">
                    <button type="submit" class="btn btn--color-1" value="Subscribe"><span>Subscribe</span></button>
                </div>
                <span style="display:none">
                        Leave field empty
                        <input type="text" name="subscribe-form" value="" tabindex="-1" autocomplete="off">
                    </span>
            </form>

            <nav class="navigation">
                <?php $category = get_the_category()[0];
                $post_id = get_the_ID(); ?>
                <a href="<?= get_permalink(HOME); ?>" class="<?= HOME == $post_id ? "is-current" : ""; ?>">Home</a>
                <a href="<?= get_category_link(ALG_and_DS); ?>" class="<?= ALG_and_DS == $category->term_id ? "is-current" : ""; ?>">Algorithms and Data structures</a>
                <a href="<?= get_permalink(PROJECTS); ?>"  class="<?= PROJECTS == $post_id ? "is-current" : ""; ?>">Projects</a>
                <a href="<?= get_permalink(BOOKS); ?>"  class="<?= BOOKS == $post_id ? "is-current" : ""; ?>">Books suggestions</a>
            </nav>

        </div>
    </header>
