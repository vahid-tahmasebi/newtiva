<?php
/**
 * edited by mohammad reza shirnejad
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php

$GLOBALS['comment'] = $comment;

switch ($comment->comment_type) :

case 'pingback' :

case 'trackback' :

// Display trackbacks differently than normal comments.

?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

    <p>
        pingback <?php comment_author_link(); ?> <?php edit_comment_link(__('ویرایش'), '<p>', '</p>'); ?>
    </p>

    <?php

    break;

    default :

    // Proceed with normal comments.

    global $post;

    ?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <div class="comment comment_container">
        <div class="comment-avatar" <?php echo $comment->user_id; ?>>
            <img src=" <?php echo esc_url(tiva_get_user_avatar($comment->user_id)); ?>" alt="" height="70"
                 width="70" class="avatar">
        </div>
        <div class="comment-content" id="comment-<?php comment_ID(); ?>">
            <?php
            if (is_user_logged_in()) {

                if ($comment->comment_approved == '0') {
                    echo '<p class="bg-danger comment-awaiting-moderation">دیدگاه شما در انتظار بررسی و تایید است شما می توانید از طریق دکمه زیر دیدگاه خود را ویرایش کنید.  </p>';
                };

                if ($comment->comment_approved == '0') {
                    echo '<p class="edit-link"><a class="comment-edit-link" href="/user-panel/comments-hold"><span>ویرایش دیدگاه شما</span></a></p>';
                };
            } else {
                if ($comment->comment_approved == '0') {
                    echo '<p class="bg-danger comment-awaiting-moderation">دیدگاه شما در انتظار بررسی و تایید است. </p>';
                };
            }
            ?>

            <div class="comment-author">
                <?php printf('<cite class="fn %2$s">%1$s</cite>', get_comment_author_link(), ($comment->user_id === $post->post_author) ? 'author' : ''); ?>
                <div class="commentmeta"><?php echo get_comment_date('g:i Y/m/d   '); ?></div>
            </div>

            <?php
            $tiva_options = get_option('tiva_options');
            comment_text();
            ?>

            <?php if (!empty($tiva_options['comment-like']['comment_like_show']) && $tiva_options['comment-like']['comment_like_show'] === 'true' || !isset($tiva_options['comment-like']['comment_like_show'])) : ?>
                <div class="comment-action-bn">
                    <div class="comment-link comment-link-btn" data-id="<?php echo get_comment_ID();; ?>"
                         data-toggle="tooltip-copy-comment<?php echo get_comment_ID();; ?>"
                         data-placement="left"
                         title="لینک دیدگاه شما ">
                        <a class="comment-link-btn" data-clipboard-text="<?php echo get_comment_link(); ?>">
                            <i data-clipboard-target="#comment-link" class="fa fa-link " aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="tiva-comment-like">

                        <a data-toggle="tiva-comment-like-down-tooltip" title="مخالفم" data-placement="top"
                           href="#"
                           class="tiva-comment-like-down <?php echo is_user_liked_down_comment(get_comment_ID(), tiva_get_current_user()); ?>"
                           data-id="<?php comment_ID(); ?>" data-rel="<?php echo get_comment_ID(); ?>">
                                    <span class="comment-like-down-cunt"
                                          data-rel="<?php echo get_comment_ID(); ?>"><?php echo tiva_change_number(tiva_get_comment_likes_down(get_comment_ID())) ?></span><span
                                    class="like-down-plus"
                                    data-rel="<?php echo get_comment_ID(); ?>"><?php echo tiva_change_number(tiva_get_comment_likes_down(get_comment_ID(), true)) ?></span>
                            <img src="<?php echo get_template_directory_uri() . '/images/ajax-loader.gif'; ?>"
                                 alt="ajax-loader" height="13" width="13"
                                 class="ajax-loader-comment-like-down hidden"
                                 data-rel="<?php echo get_comment_ID(); ?>">
                            <i class="fa  fa-thumbs-down" aria-hidden="true"></i>
                        </a>

                        <a data-toggle="tiva-comment-like-down-tooltip" title="موافقم" data-placement="top"
                           href="#"
                           class="tiva-comment-like-up <?php echo is_user_liked_up_comment(get_comment_ID(), tiva_get_current_user()); ?>"
                           data-id="<?php echo get_comment_ID() ?>"
                           data-rel="<?php echo get_comment_ID(); ?>"><span
                                    class="comment-like-up-cunt"
                                    data-rel="<?php echo get_comment_ID(); ?>"><?php echo tiva_change_number(tiva_get_comment_likes_up(get_comment_ID())) ?></span><span
                                    class="like-up-plus"
                                    data-rel="<?php echo get_comment_ID(); ?>"><?php echo tiva_change_number(tiva_get_comment_likes_up(get_comment_ID(), true)) ?></span>
                            <img src="<?php echo get_template_directory_uri() . '/images/ajax-loader.gif'; ?>"
                                 alt="ajax-loader" height="13" width="13"
                                 class="ajax-loader-comment-like-up hidden"
                                 data-rel="<?php echo get_comment_ID(); ?>">
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </a>

                    </div>
                </div>
            <?php endif; ?>

        </div><!-- #comment-## -->
        <div class="reply">
            <?php comment_reply_link(array_merge($args, array('reply_text' => '<span class="reply">پاسخ دادن</span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
        </div>

    </div>
    <?php

    break;

    endswitch; // end comment_type check
    ?>
