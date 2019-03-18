<div class="h-rss-inner">
    <div class="row">
        <div class="col-sm-8">
            <p class="text-right">اگر می‌خواهید از آخرین و محبوب‌ترین مقالات ما در ایمیل خود مطلع شوید، همین الان ایمیل خود را در کادر زیر وارد کنید</p>
            <?php echo do_shortcode('[mailpoet_form id="1"]') ; ?>
        </div>
        <div class="col-sm-4">
            <p class="center">تعداد علاقه‌مندانی که تاکنون عضو خبرنامه ما شده‌اند</p>
            <p class="center">
                <strong><?php echo tiva_change_number(darsam_rss_count_subscribers()) ; ?></strong>
            </p>
        </div>
    </div>
</div>