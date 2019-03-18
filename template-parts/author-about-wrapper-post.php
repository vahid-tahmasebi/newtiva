<div class="author-about-wrapper card-wrapper">
    <?php
    $author = get_queried_object();
    $author_id = $author->ID;
    $tiva_options = get_option('tiva_options');
    ?>
    <div class="author-about">
                           <span class="author-date-registered hidden-xs">
                               <i class="fa fa-user-plus" aria-hidden="true"></i>
                               <?php
                               $date = new jDateTime(true, true, 'Asia/Tehran');
                               $user_register = get_the_author_meta('user_registered', $post->post_author);
                               _e('عضویت از : ', 'tiva');
                               echo $date->date('Y/m/d', strtotime($user_register));
                               ?>
                           </span>
        <img src="<?php echo esc_url(tiva_get_user_avatar($post->post_author)); ?>" alt=""
             class="single-author-avatar">
        <span class="single-author-name">
            <?php echo get_the_author_posts_link(); ?>
        </span>
        <p class="single-author-disc">
            <?php echo get_the_author_meta('description'); ?>
        </p>
        <div class="user-social-network-icon">
            <ul>
                <li>
                    <?php echo tiva_get_user_social_network_icon_frontEnd('web', $author_id); ?>
                </li>
                <li>
                    <?php echo tiva_get_user_social_network_icon_frontEnd('telegram', $author_id); ?>

                </li>
                <li>
                    <?php echo tiva_get_user_social_network_icon_frontEnd('instagram', $author_id); ?>
                </li>
                <li>
                    <?php echo tiva_get_user_social_network_icon_frontEnd('linkedin', $author_id); ?>
                </li>
            </ul>
        </div>

    </div>
    <?php
    if (!empty($tiva_options['single-page']['post_chanel-box-tel_show']) && $tiva_options['single-page']['post_chanel-box-tel_show'] === 'true' || !isset($tiva_options['single-page']['post_chanel-box-tel_show'])):
        ?>
        <a href="<?php echo (!empty( $tiva_options['single-page']['tel-box-link']))?  $tiva_options['single-page']['tel-box-link'] : '#' ; ?>" class="tiva-single-telegram">
            <span class="chanel-des hidden-xs hidden-sm"><?php echo (!empty( $tiva_options['single-page']['tel-box-title']))?  $tiva_options['single-page']['tel-box-title'] : 'لطفا متن باکس تلگرام را از پنل تنظیمات ویرایش کنید ' ; ?></span>
            <span class="chanel-title pull-left"><?php echo (!empty( $tiva_options['single-page']['tel-box-btn-caption']))?  $tiva_options['single-page']['tel-box-btn-caption'] : 'کانال تلگرام' ; ?></span>
        </a>
        <?php
    endif;
    ?>

</div>
