<?php
$date = new jDateTime( true, true, 'Asia/Tehran' );
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/admin-panel/admin-dashboard"><?php _e( 'داشبورد', 'tiva' ); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e( 'مدیریت گزارش ها', 'tiva' ); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e( 'تراکنش های کیف پول کاربران', 'tiva' ); ?></span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="pull-right btn-sm" data-container="body" data-placement="bottom">
            <i class="icon-calendar date-icon-dashboard"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
			<?php _e( '  امروز :', 'tiva' ); ?><?php echo $date->date( "l j F Y " ); ?>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"><?php _e( 'گزارش تراکنش های کیف پول کاربران', 'tiva' ); ?>
    <small><?php _e( 'نمایش تمام گزارش تراکنش های کیف پول کاربران', 'tiva' ); ?></small>
</h1>
<!-- END PAGE TITLE-->
<br>
<div class="row">
    <div class="note note-info">
        <h4 class="block">راهنمایی !</h4>
        <p>مدیر محترم شما می توانید از طریق این لیست ،تراکنش های کیف پول کاربران را بررسی و پیگیری کنید.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-envelope-o font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e( 'لیست تراکنش های کیف پول کاربران', 'tiva' ) ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>نام کاربر</th>
                        <th>مبلغ</th>
                        <th>وضعیت</th>
                        <th>تاریخ و ساعت</th>
                        <th>شماره تراکنش بانک</th>
                        <th>توضیحات</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					//                    dd('ok');
					global $wpdb;
					$db_prefix             = $wpdb->prefix;
					$tiva_user_wallet_logs = $db_prefix . 'tiva_user_wallet_logs';
					//					dd($tiva_pay_handel);
					$current_user = get_current_user_id();
					//					dd($current_user);
					$result = $wpdb->get_results( "SELECT * FROM {$tiva_user_wallet_logs} " );
					//					dd( $result );
					foreach ( $result as $print ) {
						$user_info = get_userdata( (int) $print->user_id );
						?>
                        <tr>
                            <td><?php echo tiva_change_number( $print->id ) . '#' ?></td>
                            <td><?php echo $user_info->display_name ?></td>
                            <td>
	                            <?php if ( $print->type == 1 ): ?>
                                    <span class="label label-sm label-success label-mini"><?php echo tiva_change_number( number_format( $print->amount ) ) . ' تومان ' ?></span>
	                            <?php endif; ?>
	                            <?php if ( $print->type == 2 ): ?>
                                    <span class="label label-sm label-danger label-mini"><?php echo tiva_change_number( number_format( $print->amount ) ) . ' تومان ' ?></span>
	                            <?php endif; ?>
	                            <?php if ( $print->type == 3 ): ?>
                                    <span class="label label-sm label-info label-mini"><?php echo tiva_change_number( number_format( $print->amount ) ) . ' تومان ' ?></span>
	                            <?php endif; ?>
                            </td>
                            <td>
								<?php if ( $print->type == 1 ): ?>
                                    <span class="label label-sm label-success label-mini">شارژ کیف پول</span>
								<?php endif; ?>
	                            <?php if ( $print->type == 2 ): ?>
                                    <span class="label label-sm label-danger label-mini">کسر از موجودی</span>
	                            <?php endif; ?>
	                            <?php if ( $print->type == 3 ): ?>
                                    <span class="label label-sm label-info label-mini">هدیه کیف پول</span>
	                            <?php endif; ?>
                            </td>
                            <td><?php echo jdate( "j F Y - H:i:s", $print->date ) ?></td>
                            <td><?php echo (empty($print->pay_refid)) ? '-' : tiva_change_number($print->pay_refid)?></td>
                            <td><?php echo $print->wallet_description ?></td>
                        </tr>
						<?php
					}
					?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
