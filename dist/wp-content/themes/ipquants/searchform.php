<?php
    if ( !is_home() && !is_single() && !is_category() ){
?>

    <form role="search" method="get" id="searchform" class="searchform" action="<?= esc_url( home_url( '/' ) ) ?>">
        <div>
            <input type="text" value="<?= get_search_query() ?>" placeholder="<?= _x( 'Search for:', 'label' ) ?>" name="s" id="s" />
            <input type="submit" id="searchsubmit" value="<?= esc_attr_x( 'Search', 'submit button' ) ?>" />
        </div>
    </form>

<?php } else { ?>

    <form role="search" method="get" id="searchform" class="blog-search" action="<?= esc_url( home_url( '/' ) ) ?>">
        <button type="submit" id="searchsubmit">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 22 22" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                    <g transform="translate(-186.000000, -612.000000)" stroke="#FF7227" stroke-width="3">
                        <g transform="translate(188.000000, 614.000000)">
                            <path d="M18,9 C18,13.9712727 13.9696364,18 9,18 C4.03036364,18 0,13.9712727 0,9 C0,4.02872727 4.03036364,0 9,0 C13.9696364,0 18,4.02872727 18,9 Z" />
                            <path d="M18.25,18.25 C19,19 16,16 16,16" transform="translate(17.185185, 17.185185) rotate(-180.000000) translate(-17.185185, -17.185185) "/>
                        </g>
                    </g>
                </g>
            </svg>
        </button>
        <input type="text" value="<?= get_search_query() ?>" placeholder="<?= _x( 'Search', 'label' ) ?>" name="s" id="s" />
        <input type="hidden" value="post" name="post_type" />
    </form>

<?php } ?>
