<?php

global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
    'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'before_page_number'
) );
