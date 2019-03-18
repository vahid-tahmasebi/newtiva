<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
$comment_action = get_query_var('delete_comment');
if (isset($_GET['delete_comment'])) {
    do_action('tiva_user_delete_comment_action');
}
$current_user = wp_get_current_user();
$comments_per_page = 4;
$all_comments = wp_count_comments();
//var_dump($all_comments);
$all_comments_approved = tiva_get_user_comment_count($current_user->ID,'1');
//var_dump($all_comments_approved);
$paged = tiva_get_current_page();
$offset = ($paged - 1) * $comments_per_page;
//var_dump($offset);
$max_num_pages = ceil($all_comments_approved / $comments_per_page);
//var_dump($max_num_pages);
$args = array(
    'user_id' => wp_get_current_user()->ID,
    'status' => 'approve',
    'number' => $comments_per_page,
    'offset' => $offset
);

// The Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query($args);
global $comment;
if ($comments):?>
    <?php foreach ($comments as $comment): ?>
        <div class="mt-comment">
            <div class="mt-comment-img">
                <img class="comment-avatar" src="<?php echo tiva_get_user_avatar($current_user->ID); ?>"/>
            </div>
            <div class="mt-comment-body">
                <div class="mt-comment-info">
                    <span class="mt-comment-author"><?php _e('کامنت شما در :', 'tiva'); ?><?php echo get_the_title($comment->comment_post_ID); ?></span>
                    <span class="mt-comment-date"><?php echo get_comment_date('g:i Y/m/d'); ?> <i class="fa fa-calendar"
                                                                                                  aria-hidden="true"></i></span>
                </div>
                <div class="mt-comment-text">
                    <?php echo $comment->comment_content; ?>
                </div>
                <div class="mt-comment-details">
                    <span class="label comment-status label-primary"> <?php _e('تایید شده', 'tiva'); ?> </span>
                    <ul class="mt-comment-actions">
                        <li>
                            <a href="?delete_comment=<?php echo urlencode(base64_encode(get_comment_ID())); ?>"
                               class="btn btn-sm red"> <?php _e('حذف موقت', 'tiva'); ?>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo get_comment_link(); ?>"
                               class="btn btn-sm green"> <?php _e('نمایش', 'tiva'); ?>
                                <i class="fa fa-eye " aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <?php
    $html = '';
    $html .= '<div class="note note-danger">';
    $html .= ' <h4 class="block">';
    $html .= 'متاسفیم !';
    $html .= '</h4>';
    $html .= '<p>';
    $html .= 'کاربر گرامی هیچ دیدگاه تایید شده از طرف شما در سایت موجود نمی باشد';
    $html .= '</p>';
    $html .= '</div>';
    echo $html;
     ?>
<?php endif; ?>
