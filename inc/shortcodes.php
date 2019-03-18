<?php
function related_posts_shortcode($atts)
{
    global $html;
    $atts = shortcode_atts(array(
        'max' => '1',
    ), $atts, 'relatedposts');

    global $post;
    $reset_post = $post;

    $post_cats = wp_get_post_categories($post->ID);


    if ($post_cats) {
        $post_cat_ids = array();
        foreach ($post_cats as $post_cat) {
            $post_cat_ids[] = $post_cat;
        }
        $args = array(
            'category__in' => $post_cat_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => $atts['max'],
            'orderby' => 'comment_count'
        );
        $related_query = new wp_query($args);
        if (intval($related_query->post_count) === 0) return '';

        $html = '<div class="relatedposts"><h3>' . __('داغ ترین مقاله مرتبط', 'tiva') . '</h3>';

        while ($related_query->have_posts()) {
            $related_query->the_post();
            $html .= '<span class="relatedthumb"><a class="relatedthumb-link" rel="external" href="' . get_the_permalink() . '">';
            $html .= get_the_title() . '</a>';
            $html .= '</span>';
        }
    }


    $post = $reset_post;
    wp_reset_query();

    $html .= '</ul></div>';

    return $html;
}

add_shortcode('hot_posts', 'related_posts_shortcode');

// Alerts
function bootstrap_alerts($atts, $content = null)
{
    extract(shortcode_atts(array(
        'type' => 'info', /* alert-info, alert-success, alert-error */
    ), $atts));

    $out = '<div class="alert alert-box-bold alert-' . $type . ' alert-dismissable fade in ">';
    $out .= do_shortcode($content);
    $out .= '</div>';

    return $out;
}

add_shortcode('alert', 'bootstrap_alerts');


// private content
function private_content($att, $content = null)
{
    if ((!is_user_logged_in() && !is_null($content)) || is_feed()) {

        $html = '<div class="tiva-private-content-wrapper">';
        $html .= '<div class="error-text-wrraper">';
        $html .= '<i class="fa fa-lock text-error-icon" aria-hidden="true"></i>';
        $html .= '<span class="text-error-shortcode">';
        $html .= ' این قسمت از محتوا مخصوص کاربران عضو سایت است. برای نمایش کامل محتوا باید در سایت عضو شوید یا وارد حساب کاربری خود شوید ! ';
        $html .= '</span>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    } else {
        return $content;
    }
}

add_shortcode('private_content', 'private_content');


//short code to get the woocommerce recently viewed products
function tiva_custom_track_product_view()
{
    if (!is_singular('product')) {
        return;
    }
    global $post;
    if (empty($_COOKIE['woocommerce_recently_viewed']))
        $viewed_products = array();
    else
        $viewed_products = (array)explode('|', $_COOKIE['woocommerce_recently_viewed']);
    if (!in_array($post->ID, $viewed_products)) {
        $viewed_products[] = $post->ID;
    }
    if (sizeof($viewed_products) > 5) {
        array_shift($viewed_products);
    }
    // Store for session only
    wc_setcookie('woocommerce_recently_viewed', implode('|', $viewed_products));
}
add_action('template_redirect', 'tiva_custom_track_product_view', 20);

function tiva_woocommerce_recently_viewed_products($atts, $content = null)
{
    // Get shortcode parameters
    extract(shortcode_atts(array(
        "per_page" => '5'
    ), $atts));
    // Get WooCommerce Global
    global $woocommerce;
    // Get recently viewed product cookies data
    $viewed_products = !empty($_COOKIE['woocommerce_recently_viewed']) ? (array)explode('|', $_COOKIE['woocommerce_recently_viewed']) : array();
    $viewed_products = array_filter(array_map('absint', $viewed_products));
    // If no data, quit
    if (empty($viewed_products))
        return __('کالایی توسط شما مشاهده نشده است', 'tiva');
    // Create the object
    ob_start();
    // Get products per page
    if (!isset($per_page) ? $number = 5 : $number = $per_page)
        // Create query arguments array
        $query_args = array(
            'posts_per_page' => $number,
            'no_found_rows' => 1,
            'post_status' => 'publish',
            'post_type' => 'product',
            'post__in' => $viewed_products,
//            'orderby' => 'rand'
        );
    // Add meta_query to query args
    $query_args['meta_query'] = array();
    // Check products stock status
    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
    // Create a new query
    $r = new WP_Query($query_args);
    // ----
    if (empty($r)) {

        return __('کالایی توسط شما مشاهده نشده است', 'tiva');
    } ?>
    <?php while ($r->have_posts()) : $r->the_post();
    ?>
    <!-- //put your theme html loop hare -->
    <div class="wcrvInner">
        <a href="<?php the_permalink() ?>" class="item">
            <img class=wcrv-product-slid-thumbnail" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
            <h3 class="wcrv-product-slid-title"><?php the_title(); ?></h3>
        </a>
    </div>
    <!-- end html loop  -->
<?php endwhile; ?>

    <?php wp_reset_postdata();
    return '' . ob_get_clean() . '</div>';
    // ----
    // Get clean object
    $content .= ob_get_clean();
    // Return whole content
    return $content;
}
// Register the shortcode
add_shortcode("woocommerce_recently_viewed_products", "tiva_woocommerce_recently_viewed_products");