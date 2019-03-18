<?php
$current_user_id = wp_get_current_user()->ID;
$date = new jDateTime( true, true, 'Asia/Tehran' );

if ( isset( $_POST['wallet_charge'] ) ) {
	do_action( 'tiva_user_wallet_charge_action' );
}
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/user-panel/dashboard"><?php _e( 'داشبورد', 'tiva' ); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e( 'مدیریت کیف پول', 'tiva' ); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e( 'شارژ کیف پول', 'tiva' ); ?></span>
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
<h1 class="page-title"><?php _e( 'شارژ کیف پول', 'tiva' ); ?>
    <small><?php _e( 'شارژ کیف پول شما از طریق درگاه بانکی ', 'tiva' ); ?></small>
</h1>
<!-- END PAGE TITLE-->

<div class="" style="display: block; margin: 0 auto">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="alert alert-info text-center">
                <span> کاربر محترم</span> موجودی کیف پول شما
                <strong><?php echo tiva_change_number( number_format( tiva_get_user_wallet_balance( get_current_user_id() ) ) ) . ' تومان '; ?></strong>
                می باشد
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="alert alert-danger text-center">
                <strong>کاربر محترم جهت پیگیری تراکنش های خود مشخصات کاربری خود را ثبت کنید</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption">
                        <i class="icon-bubbles font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase"><?php _e( 'شارژ کیف پول شما', 'tiva' ); ?></span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_comments_1">
                            <div class="alert alert-info text-center">
                                <span>توجه داشته باشید که مبلغ مورد نظر را به تومان وارد کنید</span>
                            </div>
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">مبلغ</label>
                                        <div class="col-md-9">
                                            <div class="input-inline input-medium">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                                    <input type="number" name="wallet_amount" class="form-control" placeholder="مبلغ شارژ کیف پول"></div>
                                            </div>
                                            <span class="help-inline">تومان </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" name="wallet_charge" class="btn green">اتصال به درگاه
                                                بانک و پرداخت
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption">
                        <i class="icon-bubbles font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase"><?php _e( 'سوالات متداول شارژ کیف پول', 'tiva' ); ?></span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="faq-page faq-content-1">
                        <div class="faq-content-container">
                            <div class="faq-section " style="padding-top: 0 !important">
                                <div class="panel-group accordion faq-content" id="accordion1">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <i class="fa fa-circle"></i>
                                                <a class="accordion-toggle" data-toggle="collapse"
                                                   data-parent="#accordion1" href="#collapse_1">کیف پول چیست؟ </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>
 حساب مجازی شما در سایت است که هنگام خرید محصولات و ارتقاع پلن کاربری خود و ... می توانید از موجودی آن استفاده کنید.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <i class="fa fa-circle"></i>
                                                <a class="accordion-toggle" data-toggle="collapse"
                                                   data-parent="#accordion1" href="#collapse_2">
                                                    امکان برداشت موجودی کیف پول وجود دارد؟ </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>خیر. شما تنها می توانید با موجودی کیف پول خود نسبت به خرید محصولات سایت و ارتقاع پلن کاربری خود اقدام کنید.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <i class="fa fa-circle"></i>
                                                <a class="accordion-toggle" data-toggle="collapse"
                                                   data-parent="#accordion1" href="#collapse_3">
                                                    چرا باید کیف پول خود را شارژ کنم؟
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>ممکن است مبلغ موجودی کیف پول شما نسبت به قیمت محصولات مد نظرتان کمتر
                                                    باشد. با افزایش موجودی حساب کیف پول خود می توانید با موجودی آن نسبت
                                                    به خرید محصولات سایت و ... اقدام نمایید.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <i class="fa fa-circle"></i>
                                                <a class="accordion-toggle" data-toggle="collapse"
                                                   data-parent="#accordion1" href="#collapse_4">
                                                    موجودی کیف پول تاریخ مصرف دارد؟ </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>خیر. موجودی کیف پول شما بدون تاریخ مصرف و محدودیت زمانی قابل استفاده
                                                    خواهد بود و در حساب شما محفوظ می ماند.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>