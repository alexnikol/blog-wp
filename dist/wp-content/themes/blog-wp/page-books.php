<?php
/*
  Template Name: Books Page
*/

get_header(); ?>

<div class="site-content">

    <div class="site-content__layout">

        <h1 class="page-title"><?php the_title(); ?></h1>

    </div>

    <div class="grid grid--twist">

        <div class="grid__layout">

            <?php $books = get_books(); ?>

            <?php foreach ($books as $book):
            $ID = $book->ID;
            $name = get_the_title($ID);
            $description = get_field('author', $ID);
            $link = get_field('link', $ID);
            $image = get_the_post_thumbnail_url($ID); ?>

            <article class="grid__item">

                <a class="grid__item-thumbnail" href="<?= $link; ?>" target="_blank">
                    <img src="<?= $image; ?>" alt="img" title="<?= $name; ?>">
                </a>

                <div class="grid__item-body">

                    <header>
                        <span class="grid__item-date"><?= $description; ?></span>
                        <h3 class="grid__item-title">
                            <a href="<?= $link; ?>" target="_blank" rel="bookmark"><?= $name; ?></a>
                        </h3>
                    </header>

                </div>

            </article>

            <?php endforeach;?>

        </div>

    </div>

</div>

<?php get_footer(); ?>
