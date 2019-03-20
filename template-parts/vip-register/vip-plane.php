<?php $tiva_options = get_option('tiva_options') ?>
<div class="row">
    <div class="col-lg-12 col-md-12 ">
        <div class="vip-plane-wrapper card-wrapper ">
            <div class="vip-plan-inner">
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp ">
                    <div class="vip-plan-dis">
                        <a href="https://karsazsho.com/login-user" target="_blank"><span class="vip-lable">عضویت ویژه کارسازشو</span></a>
                        <span class="vip-plan-title">با عضویت ویژه بدون محدودیت به تمام قسمت های سایت کارسازشو دسترسی داشته باشید.</span>
                        <p class="vip-plan-dis">
                                با عضویت ویژه به مقالات و فایل ها و ویدیو های مخصوص کاربران ویژه سایت دسترسی خواهید
                            داشت و می توانید بدون محدودیت آن ها را تماشا و مطالعه و دانلود کنید.
                            <br>
                            <strong>  برای تهیه هر کدام از پلن های ابتدا باید در سایت لاگین کرده باشید</strong>
                        </p>
                        <a target="_blank"
                           href="<?php echo (isset($tiva_options['vip-register']['vip-register-term'])) ? get_page_link((int)$tiva_options['vip-register']['vip-register-term']) : '#' ?>"
                           class="price-plan-btn vip-plan-term-link">شرایط و قوانین</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp gold-plan">
                    <div class="u-pricing-v1">
                        <header class="u-pricing-v1__header">
                            <span class="h4 mb-1">پلن طلایی</span>
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

                                <li class="d-flex align-items-center u-pricing-v1__list-item py-2">
                      <span class="u-icon u-icon-primary--air u-icon--xs rounded-circle mr-3">
                        <span class="fa fa-check u-icon__inner"></span>
                      </span>
                                    امکان دانلود قالب وافزونه حرفه ای

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
                            <a href="<?php echo (is_user_logged_in()) ? site_url() . '/user-panel/buy-plan?type=gold' : '#' ?>" <?php echo tiva_get_modal_user_login(); ?>
                               class="price-plan-btn">این پلن را میخواهم</a>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp silver-plan">
                    <div class="u-pricing-v1">
                        <header class="u-pricing-v1__header">
                            <span class="h4 mb-1">پلن نقره ای</span>
                            <span class="d-block">
                     <span class="month"><?php echo tiva_get_vip_plan_mount('silver') ?></span>
                    <span class="display-4 font-weight-bold amount-plan"><?php echo tiva_change_number(number_format(tiva_get_vip_plan_price('silver'))) ?></span>
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
                                    امکان دانلود قالب وافزونه حرفه ای

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
                            <a href="<?php echo (is_user_logged_in()) ? site_url() . '/user-panel/buy-plan?type=silver' : '#' ?>" <?php echo tiva_get_modal_user_login(); ?>
                               class="price-plan-btn">این پلن را میخواهم</a>
                        </div>

                        <!-- End Content -->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInUp bronze-plan">
                    <div class="u-pricing-v1">
                        <header class="u-pricing-v1__header">
                            <span class="h4 mb-1">پلن برنزی</span>
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
                                    امکان دانلود قالب وافزونه حرفه ای

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
                            <a href="<?php echo (is_user_logged_in()) ? site_url() . '/user-panel/buy-plan?type=bronze' : '#' ?>" <?php echo tiva_get_modal_user_login(); ?>
                               class="price-plan-btn">این پلن را میخواهم</a>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
