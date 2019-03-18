<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
if (isset($_POST['send_ticket'])) {
//	var_dump( $_POST );
    tiva_user_send_ticket();
}

?>

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/user-panel/admin-dashboard"><?php _e('داشبورد', 'tiva'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('پشتیبانی', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('ثبت تیکت جدید', 'tiva'); ?></span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="pull-right btn-sm" data-container="body" data-placement="bottom">
            <i class="icon-calendar date-icon-dashboard"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <?php _e('  امروز :', 'tiva'); ?><?php echo $date->date("l j F Y "); ?>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"><?php _e('ثبت تیکت جدید', 'tiva'); ?>
    <small><?php _e('ثبت تیکت جدید در سیستم پشتیبانی', 'tiva'); ?></small>
</h1>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-ticket font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('ثبت تیکت جدید', 'tiva') ?></span>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="post" role="form" action="" id="send_ticket" name="send_ticket">
                    <div class="form-group">
                        <label class="control-label"><?php _e('موضوع تیکت ', 'tiva'); ?></label>
                        <input type="text" name="ticket_subject"
                               placeholder="<?php _e('موضوع تیکت را وارد کنید', 'tiva'); ?> " class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php _e('واحد پشتیبانی', 'tiva'); ?></label>
                        <select name="supporter_id" class="form-control">
                            <?php
                            $args = array(
                                'role' => 'supporter',
                                'orderby' => 'user_nicename',
                                'order' => 'ASC'
                            );
                            $users = get_users($args);

                            foreach ($users as $print) {
//								var_dump($print);
                                if (!empty(get_user_meta($print->ID, 'unit_supporter', true))) {
                                    $result = get_user_meta($print->ID, 'unit_supporter', true);
                                } else {
                                    $result = get_userdata($print->ID)->display_name;
                                }
                                if (get_current_user_id() !== $print->ID) {
                                    echo '<option value="' . $print->ID . '">' . $result . '</option> ';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php _e('متن تیکت', 'tiva'); ?></label>
                        <textarea name="ticket_content" class="form-control" rows="10"
                                  placeholder="متن تیکت را وارد کنید"></textarea>
                    </div>
                    <div class="input-group">
                        <!--                        <label class="control-label">-->
                        <?php //_e( 'بارگزاری فایل مورد نظر برای ارسال', 'tiva' ) ?><!--</label>-->
                        <input type="url" id="ticket_att" style="direction: ltr" name="ticket_url_att"
                               class="form-control" placeholder=" فایل پیوست تیکت را انتخاب کنید ...">
                        <span class="input-group-btn"><a id="up_ticket_att" href="#" class="btn red " type="button">انتخاب فایل</a></span>
                        <!-- /input-group -->
                    </div>
                    <br>
                    <br>
                    <div class="margiv-top-10">
                        <button type="submit" class="btn green"
                                name="send_ticket"><?php _e('ارسال تیکت', 'tiva'); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
