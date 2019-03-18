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
            <span><?php _e( 'مدیریت کیف پول', 'tiva' ); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e( 'تراکنش های کیف پول شما', 'tiva' ); ?></span>
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
<h1 class="page-title"><?php _e( 'تراکنش های کیف پول شما', 'tiva' ); ?>
    <small><?php _e( 'نمایش تمام تراکنش های کیف پول شما ', 'tiva' ); ?></small>
</h1>
<!-- END PAGE TITLE-->
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="alert alert-info text-center">
            <span> کاربر محترم</span> موجودی کیف پول شما
            <strong><?php echo tiva_change_number( number_format( tiva_get_user_wallet_balance( get_current_user_id() ) ) ) . ' تومان '; ?></strong>
            .می باشد
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="alert alert-danger text-center">
            <strong> جهت استفاده از جست و جوی پیشرفته از persian (standard) keyboard استفاده کنید. </strong>

        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-envelope-o font-red-sunglo" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e( 'لیست تراکنش های کیف پول شما', 'tiva' ) ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th><?php _e( 'شماره تراکنش', 'tiva' ) ?> </th>
                        <th><?php _e( 'مبلغ', 'tiva' ) ?> </th>
                        <th><?php _e( 'تاریخ تراکنش', 'tiva' ) ?> </th>
                        <th><?php _e( 'توضیحات', 'tiva' ) ?> </th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
                    /********************************* BEGIN EDITED IN TIVA V5.8  ****************************/
					global $wpdb;
					$db_prefix                = $wpdb->prefix;
					$tiva_wallet_table_handel = $db_prefix . 'tiva_user_wallet_logs';
					$current_user             = get_current_user_id();
					$result                   = $wpdb->get_results( "SELECT * FROM {$tiva_wallet_table_handel} WHERE user_id={$current_user}  ORDER BY {$tiva_wallet_table_handel}.date DESC " );
					foreach ( $result as $print ) {
						?>
						<?php
						?>
                        <tr>
                            <td><?php echo tiva_change_number( $print->id ) . '#' ?></td>
                            <td>
                                <span class="label label-sm <?php echo ( $print->type == 1 || $print->type == 3 || $print->type == 4 ) ? 'label-success' : 'label-danger' ?> label-mini"><?php echo tiva_change_number( number_format( $print->amount ) ) . ' تومان ' ?></span>
                            </td>
                            <td><?php echo jdate( "j F Y - H:i:s", $print->date ) ?></td>
							<?php if ( $print->type == 1 ): ?>
                                <td><?php echo ' شارژ کیف پول شما به شماره تراکنش خرید ' . tiva_change_number( $print->pay_refid ); ?></td>
							<?php endif ?>
							<?php if ( $print->type == 2 ): ?>
                                <td><?php echo ' کسر از موجودی کیف پول شما به علت خرید ' . $print->wallet_description ?></td>
							<?php endif ?>
							<?php if ( $print->type == 3 ): ?>
                                <td><?php echo ' افزایش موجودی کیف پول شما به علت هدیه ' . $print->wallet_description; ?></td>
							<?php endif ?>
                            <?php if ($print->type == 4): ?>
                                <td><?php echo ' افزایش موجودی کیف پول شما توسط مدیر سایت '; ?></td>
                            <?php endif ?>
                            <?php if ($print->type == 5): ?>
                                <td><?php echo ' کسر از موجودی کیف پول شما توسط مدیر سایت'; ?></td>
                            <?php endif ?>
                        </tr>
					<?php }
                    /********************************* END EDITED IN TIVA V5.8 ******************************/
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
