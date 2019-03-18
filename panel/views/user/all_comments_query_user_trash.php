<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
//$comment_action = get_query_var('delete_comment');
if (isset($_GET['delete_comment'])) {
    do_action('tiva_user_delete_end_comment_action');
}elseif (isset($_GET['recycle-comment'])){
    do_action('tiva_user_recycle_comment_action');
}
$current_user = wp_get_current_user();
$comments_per_page = 5;
$all_comments = wp_count_comments();
//var_dump($all_comments);
$all_comments_approved = tiva_get_user_comment_count($current_user->ID,'user-trash');
//var_dump($all_comments_approved);
$paged = tiva_get_current_page();
$offset = ($paged - 1) * $comments_per_page;
//var_dump($offset);
$max_num_pages = ceil($all_comments_approved / $comments_per_page);
//var_dump($max_num_pages);
$args = array(
    'user_id' => wp_get_current_user()->ID,
    'status' => 'user-trash',
    'number' => $comments_per_page,
    'offset' => $offset,
    'post_type' => array('post', 'download','product','video'),

);

// The Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query($args);
global $comment;
if ($comments):?>
    <?php foreach ($comments as $comment): ?>
        <div class="mt-comment" data-id="<?php echo get_comment_ID(); ?>">
            <div class="mt-comment-img">
                <img class="comment-avatar" src="<?php echo tiva_get_user_avatar($current_user->ID); ?>"/>
            </div>
            <div class="mt-comment-body">
                <div class="mt-comment-info">
                    <span class="mt-comment-author"><?php _e('کامنت شما در :', 'tiva'); ?><?php echo get_the_title($comment->comment_post_ID); ?></span>
                    <span class="mt-comment-date"><?php echo get_comment_date('g:i Y/m/d'); ?> <i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
                <div class="mt-comment-text" data-id="<?php echo get_comment_ID(); ?>">
                    <?php echo $comment->comment_content; ?>
                </div>
                <div class="mt-comment-details">
                    <span class="label comment-status label-danger"> <?php _e('حذف شده توسط من', 'tiva'); ?> </span>
                    <ul class="mt-comment-actions">
                        <li>
                            <a href="?delete_comment=<?php echo urlencode(base64_encode(get_comment_ID())); ?>"
                               class="btn btn-sm red"> <?php _e('حذف نهایی', 'tiva'); ?>
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="?recycle-comment=<?php echo urlencode(base64_encode(get_comment_ID())); ?>" class="btn btn-warning btn-sm"> <?php _e('بازگردانی', 'tiva'); ?>
                                <i class="fa fa-recycle" aria-hidden="true"></i>
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
    $html .= 'کاربر گرامی دیدگاهی از طرف شما تاکنون حذف نشده است.';
    $html .= '</p>';
    $html .= '</div>';
    echo $html;
     ?>
<?php endif; ?>
<div class="tiva-pagination-wrapper">
    <div class="box tiva-pagination">
        <?php
        /*Set current page for pagination*/
        $current_page = max(1, get_query_var('paged'));
        /*Echo paginate links*/
        echo paginate_links(array(
            'base' => tiva_clean_page_arg(),
            'format' => '&page=%#%',
            'current' => max(1, tiva_get_current_page()),
            'total' => $max_num_pages,
            'prev_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            'next_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
        ));
        ?>
    </div>
</div>
