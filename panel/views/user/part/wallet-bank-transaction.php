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
            <span><?php _e( 'تراکنش های بانکی', 'tiva' ); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e( 'تراکنش های بانکی شارژ کیف پول شما', 'tiva' ); ?></span>
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
<h1 class="page-title"><?php _e( 'تراکنش های بانکی شارژ کیف پول شما', 'tiva' ); ?>
    <small><?php _e( 'نمایش تمام تراکنش های بانکی شارژ کیف پول شما', 'tiva' ); ?></small>
</h1>
<!-- END PAGE TITLE-->
<br>
<div class="row">
    <div class="note note-info">
        <h4 class="block">راهنمایی !</h4>
        <p>کاربر محترم شما می توانید از این طریق تراکنش های بانکی شارژ کیف پول خود را بررسی و پیگیری کنید. </p>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-envelope-o font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e( 'لیست تراکنش های بانکی شارژ کیف پول شما', 'tiva' ) ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>مبلغ پرداختی</th>
                        <th>شماره تراکنش</th>
                        <th>شماره موبایل</th>
                        <th>ایمیل</th>
                        <th>تاریخ و ساعت</th>
                        <th>توضیحات</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					//                    dd('ok');
					global $wpdb;
					$db_prefix       = $wpdb->prefix;
					$tiva_pay_handel = $db_prefix . 'tiva_pay_handel';
					//					dd($tiva_pay_handel);
					$current_user = get_current_user_id();
					//					dd($current_user);
					$result = $wpdb->get_results( "SELECT * FROM {$tiva_pay_handel} where user_id={$current_user} and type=1" );
					//					dd( $result );
					foreach ( $result as $print ) {
						?>
						<?php if ( ! empty( $print->pay_refid ) ): ?>
                            <tr>
                                <td><?php echo tiva_change_number( $print->id ) . '#' ?></td>
                                <td>
                                    <span class="label label-sm label-success label-mini"><?php echo tiva_change_number( number_format( $print->pay_amount ) ) . ' تومان ' ?></span>
                                </td>
                                <td>
                                    <span class="label label-sm label-info label-mini"><?php echo tiva_change_number( $print->pay_refid ) ?></span>
                                </td>
                                <td><?php echo tiva_change_number($print->pay_mobile) ?></td>
                                <td><?php echo $print->pay_email?></td>
                                <td><?php echo jdate( "j F Y - H:i:s", $print->pay_date ) ?></td>
                                <td><?php echo $print->description ?></td>
                            </tr>
						<?php endif; ?>
					<?php }
					?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
