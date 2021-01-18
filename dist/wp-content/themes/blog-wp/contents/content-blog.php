
<div class="grid grid--tail">

    <div class="grid__layout">

        <?php

        foreach ($posts as $row) {
            $image_source = get_the_post_thumbnail_url($row);
            $link = get_permalink($row);
            $title = get_the_title($row);
            $excerpt = get_the_excerpt($row);
            $excerpt = substr($excerpt, 0, 100);
            $t_link = "https://twitter.com/intent/tweet?url=". $link ."&text=". $title;
            $l_link = "http://www.linkedin.com/shareArticle?mini=true&url=". $link ."&title=". $title;
            ?>

            <article class="grid__item">

                <a class="grid__item-thumbnail" href="<?= $link; ?>">
                    <img src="<?= $image_source; ?>" alt="<?= $title; ?>">
                </a>

                <div class="grid__item-body">

                    <header>
                            <span class="grid__item-date">
                                Posted <time datetime="<?= get_the_time('Y-m-d', $row); ?>"><?= get_the_time('M j, Y', $row); ?></time>
                            </span>
                        <h3 class="grid__item-title">
                            <a href="<?= $link; ?>" rel="bookmark"><?= $title; ?></a>
                        </h3>
                    </header>

                    <div class="grid__item-content">
                        <p><?= $excerpt; ?></p>
                    </div>

                    <footer class="grid__item-footer">
                        <a href="<?= $link; ?>" class="btn btn--color-1">More</a>

                        <div class="social">
                            <a href="<?= $l_link ?>" target="_blank" class="social__item soc-in">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 458.8 460" style="enable-background:new 0 0 458.8 460;" xml:space="preserve">
                                    <rect y="143.7" width="102.6" height="316.2"/>
                                        <path d="M382,147.5c-1.1-0.3-2.1-0.7-3.3-1c-1.4-0.3-2.8-0.6-4.2-0.8c-5.4-1.1-11.4-1.9-18.4-1.9c-59.8,0-97.7,43.6-110.2,60.5
                                    v-60.5H143.4V460H246V287.5c0,0,77.5-108.3,110.2-28.8V460h102.6V246.6C458.8,198.8,426.1,159,382,147.5z"/>
                                        <path d="M50.2,100.6c27.7,0,50.2-22.5,50.2-50.3C100.4,22.5,77.9,0,50.2,0C22.5,0,0,22.5,0,50.3C0,78.1,22.5,100.6,50.2,100.6z"/>
                                </svg>
                            </a>
                            <a href="<?= $t_link ?>" target="_blank" class="social__item soc-tw">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 460 373.6" style="enable-background:new 0 0 460 373.6;" xml:space="preserve">
                                    <path d="M412.7,93.1c0.3,4.1,0.3,8.2,0.3,12.3c0,124.6-94.9,268.2-268.2,268.2c-53.4,0-103-15.5-144.8-42.3    c7.6,0.9,14.9,1.2,22.8,1.2c44.1,0,84.6-14.9,117-40.3c-41.4-0.9-76.2-28-88.1-65.4c5.8,0.9,11.7,1.5,17.8,1.5    c8.5,0,16.9-1.2,24.8-3.2c-43.2-8.8-75.6-46.7-75.6-92.5v-1.2c12.5,7,27.1,11.4,42.6,12c-25.4-16.9-42-45.8-42-78.5    c0-17.5,4.7-33.6,12.8-47.6c46.4,57.2,116.2,94.6,194.4,98.7c-1.5-7-2.3-14.3-2.3-21.6c0-52,42-94.3,94.3-94.3    c27.1,0,51.7,11.4,68.9,29.8c21.3-4.1,41.7-12,59.8-22.8c-7,21.9-21.9,40.3-41.4,52c19-2,37.4-7.3,54.3-14.6    C447.2,63,431.1,79.7,412.7,93.1L412.7,93.1z"/>
                                </svg>
                            </a>
                        </div>

                    </footer>

                </div>

            </article>

        <?php } ?>

    </div>

</div>
