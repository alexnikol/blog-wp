
<div class="grid grid--tail">

    <div class="grid__layout">

        <?php
        $posts = get_all_posts();
        foreach ($posts as $row) {
            $image_source = get_the_post_thumbnail_url($row);
            $link = get_permalink($row);
            $title = get_the_title($row);
            $excerpt = get_the_excerpt($row);
            $excerpt = substr($excerpt, 0, 100);
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
                    </footer>

                </div>

            </article>

        <?php } ?>

    </div>

</div>
