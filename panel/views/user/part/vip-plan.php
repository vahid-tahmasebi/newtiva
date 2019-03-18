<?php
$date = new jDateTime(true, true, 'Asia/Tehran');
// EDITED IN TIVA V5.5.2
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/admin-panel/admin-dashboard"><?php _e('داشبورد', 'tiva'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('عضویت ویژه', 'tiva'); ?></span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php _e('خرید / تمدید عضویت ویژه', 'tiva'); ?></span>
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
<br>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa fa-diamond" aria-hidden="true"></i>
                    <span class="caption-subject bold uppercase"><?php _e('پلن های عضویت ویژه', 'tiva') ?></span>
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <div class="vip-plane-wrapper">
                    <div class="vip-plan-inner">
                        <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp ">
                            <div class="vip-plan-dis">
                                <span class="vip-lable">عضویت ویژه</span>
                                <h4 class="vip-plan-title">با عضویت ویژه یک قدم از دیگران جلوتر باشید.</h4>
                                <p class="vip-plan-dis">
                                    با عضویت ویژه به مقالات و فایل ها و ویدیو های مخصوص کاربران ویژه سایت دسترسی خواهید
                                    داشت و می توانید بدون محدودیت آن ها را تماشا و مطالعه و دانلود کنید.
                                    <br>
                                    با عضویت ویژه یک قدم از دیگران جلوتر خواهید بود.

                                </p>
                                <a target="_blank"
                                   href="<?php echo (isset($tiva_options['vip-register']['vip-register-term'])) ? get_page_link((int)$tiva_options['vip-register']['vip-register-term']) : '#' ?>"
                                   class="price-plan-btn vip-plan-term-link">شرایط و قوانین</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp bronze-plan">
                            <div class="u-pricing-v1">
                                <header class="u-pricing-v1__header">
                                    <h3 class="h4 mb-1">پلن برنزی</h3>
                                    <span class="d-block">
                     <span class="month"><?php echo tiva_get_vip_plan_mount('bronze') ?></span>
                    <span class="display-4 font-weight-bold amount-plan"><?php echo tiva_change_number(number_format((int)tiva_get_vip_plan_price('bronze'))) ?></span>
                    <span class="align-top toman">تومان</span>

                  </span>
                                    <!-- SVG Shape -->
                                    <figure class="w-100 position-absolute-bottom-0">
                                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="20 -20 300 100"
                                             style="margin-bottom: -8px;" xml:space="preserve">
                      <path class="u-fill-white" opacity=".4" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                  c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z"></path>
                                            <path class="u-fill-white" opacity=".4" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                  c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z"></path>
                                            <path class="u-fill-white" opacity="0" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                  H42.401L43.415,98.342z"></path>
                                            <path class="u-fill-white" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                  c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z"></path>
                    </svg>
                                    </figure>
                                    <!-- End SVG Shape -->
                                </header>
                                <!-- Content -->
                                <div class="u-pricing-v1__content">
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                                         <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به مقالات ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به ویدیوهای ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به مطالب دانلودی ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            <?php echo tiva_change_number(number_format((int)tiva_get_vip_plan_gift_credit('bronze'))) ?>
                                            تومان هدیه کیف
                                            پول
                                        </li>
                                    </ul>
                                    <a href="<?php echo site_url() . '/user-panel/buy-plan?type=bronze' ?> "
                                       class="price-plan-btn">شروع کن</a>
                                </div>
                                <!-- End Content -->
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp gold-plan">
                            <div class="u-pricing-v1">
                                <header class="u-pricing-v1__header">
                                    <h3 class="h4 mb-1">پلن طلایی</h3>
                                    <span class="d-block">
                     <span class="month"><?php echo tiva_get_vip_plan_mount('gold') ?></span>
                    <span class="display-4 font-weight-bold amount-plan"><?php echo tiva_change_number(number_format((int)tiva_get_vip_plan_price('gold'))) ?></span>
                    <span class="align-top toman">تومان</span>

                  </span>
                                    <!-- SVG Shape -->
                                    <figure class="w-100 position-absolute-bottom-0">
                                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="20 -20 300 100"
                                             style="margin-bottom: -8px;" xml:space="preserve">
                      <path class="u-fill-white" opacity=".4" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                  c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z"></path>
                                            <path class="u-fill-white" opacity=".4" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                  c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z"></path>
                                            <path class="u-fill-white" opacity="0" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                  H42.401L43.415,98.342z"></path>
                                            <path class="u-fill-white" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                  c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z"></path>
                    </svg>
                                    </figure>
                                    <!-- End SVG Shape -->
                                </header>
                                <!-- Content -->
                                <div class="u-pricing-v1__content">
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                                         <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به مقالات ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به ویدیوهای ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به مطالب دانلودی ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>


                                            <?php echo tiva_change_number(number_format((int)tiva_get_vip_plan_gift_credit('gold'))) ?>
                                            تومان هدیه کیف
                                            پول
                                        </li>
                                    </ul>
                                    <a href="<?php echo site_url() . '/user-panel/buy-plan?type=gold' ?>"
                                       class="price-plan-btn">شروع کن</a>
                                </div>
                                <!-- End Content -->
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp silver-plan">
                            <div class="u-pricing-v1">
                                <header class="u-pricing-v1__header">
                                    <h3 class="h4 mb-1">پلن نقره ای</h3>
                                    <span class="d-block">
                     <span class="month"><?php echo tiva_get_vip_plan_mount('silver') ?></span>
                    <span class="display-4 font-weight-bold amount-plan"><?php echo tiva_change_number(number_format((int)tiva_get_vip_plan_price('silver'))) ?></span>
                    <span class="align-top toman">تومان</span>

                  </span>
                                    <!-- SVG Shape -->
                                    <figure class="w-100 position-absolute-bottom-0">
                                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="20 -20 300 100"
                                             style="margin-bottom: -8px;" xml:space="preserve">
                      <path class="u-fill-white" opacity=".4" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                  c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z"></path>
                                            <path class="u-fill-white" opacity=".4" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                  c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z"></path>
                                            <path class="u-fill-white" opacity="0" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                  H42.401L43.415,98.342z"></path>
                                            <path class="u-fill-white" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                  c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z"></path>
                    </svg>
                                    </figure>
                                    <!-- End SVG Shape -->
                                </header>
                                <!-- Content -->
                                <div class="u-pricing-v1__content">
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                                         <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به مقالات ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به ویدیوهای ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            دسترسی به مطالب دانلودی ویژه
                                        </li>
                                        <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                            <?php echo tiva_change_number(number_format((int)tiva_get_vip_plan_gift_credit('silver'))) ?>
                                            تومان هدیه کیف
                                            پول
                                        </li>
                                    </ul>
                                    <a href="<?php echo site_url() . '/user-panel/buy-plan?type=silver' ?>"
                                       class="price-plan-btn">شروع کن</a>
                                </div>
                                <!-- End Content -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
