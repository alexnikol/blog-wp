<?php $categories = get_main_categories_list(); ?>
    <?php if (!is_null($categories)): ?>
    <ul class="tags">
        <?php foreach ($categories as $category): ?>
            <li><a href="<?= get_category_link($category->term_id); ?>"><?= $category->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
