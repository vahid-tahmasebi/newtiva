<div class="author-about-wrapper card-wrapper">
    <div class="author-about">
        <?php

        $author = get_queried_object();
        $author_id = $author->ID;

        ?>
        <span class="author-date-registered hidden-xs"><i class="fa fa-user-plus" aria-hidden="true"></i>
            <?php
            $date = new jDateTime(true, true, 'Asia/Tehran');
            $user_register = get_the_author_meta('user_registered',$author_id);
            _e('عضویت از : ', 'tiva');
            echo $date->date('Y/m/d', strtotime($user_register));
            ?>
         </span>
        <img src="<?php echo esc_url(tiva_get_user_avatar($author_id)); ?>" alt="" class="single-author-avatar">
        <span class="single-author-name">
            <?php echo get_the_author_meta('display_name',$author_id); ?>
        </span>
        <p class="single-author-disc">
            <?php echo get_the_author_meta('description',$author_id); ?>
        </p>
        <div class="user-social-network-icon">
            <ul>
                <li>
                    <?php echo tiva_get_user_social_network_icon_frontEnd('web',$author_id); ?>
                </li>
                <li>
                    <?php echo tiva_get_user_social_network_icon_frontEnd('telegram',$author_id); ?>

                </li>
                <li>
                    <?php echo tiva_get_user_social_network_icon_frontEnd('instagram',$author_id); ?>
                </li>
                <li>
                    <?php echo tiva_get_user_social_network_icon_frontEnd('linkedin',$author_id); ?>
                </li>
            </ul>
        </div>
    </div>
</div>
