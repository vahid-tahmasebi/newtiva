<?php $tiva_options = get_option('tiva_options'); ?>
<div class="tab-title-wrraper">
    <b class="tab-title"><?php _e('تنظیمات عضویت ویژه', 'tiva'); ?></b>
    <div class="btn-submit well-sm" style="padding:0 !important;  margin-right: 685px;">
        <button type="submit" name="op-panel-submit"
                class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات پلن طلایی', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e('از این طریق می توانید مدت زمان این پلن را مشخص کنید.', 'tiva'); ?>
                </div>
                <div class="">
                    <label for="catSelect"></label>
                    <select name='gold_plan_month' id="catSelect" class="form-control">
                        <?php
                        for ($i = 1; $i <= 12; $i++):
                            ?>
                            <option <?php selected((isset($tiva_options['vip-register']['gold-plan-month']) ? $tiva_options['vip-register']['gold-plan-month'] : ''), $i); ?>
                                    value="<?php echo $i; ?>"><?php echo tiva_change_number($i) . ' ماهه ' ?></option>
                        <?php
                        endfor;
                        ?>
                    </select>
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e(' از این طریق می توانید قیمت این پلن را مشخص کنید ، لطفا به تومان وارد کنید.', 'tiva'); ?>
                </div>
                <div class="form-group">
                    <label for="input3"><?php _e('قیمت این پلن', 'tiva'); ?></label>
                    <input type="number" class="form-control" id="input3" name="gold_plan_price"
                           value="<?php echo (!empty($tiva_options['vip-register']['gold-plan-price'])) ? $tiva_options['vip-register']['gold-plan-price'] : ''; ?>">
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e(' از این طریق می توانید اعتبار هدیه کیف پول کاربر هنگام خرید این پلن را مشخص کنید ، لطفا به تومان وارد کنید.', 'tiva'); ?>
                </div>
                <div class="form-group">
                    <label for="input3"><?php _e('اعتبار هدیه کیف پول کاربر', 'tiva'); ?></label>
                    <input type="number" class="form-control" id="input3" name="gold-plan-gift-credit"
                           value="<?php echo (!empty($tiva_options['vip-register']['gold-plan-gift-credit'])) ? $tiva_options['vip-register']['gold-plan-gift-credit'] : ''; ?>">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات پلن نقره ای', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e('از این طریق می توانید مدت زمان این پلن را مشخص کنید.', 'tiva'); ?>
                </div>
                <div class="">
                    <label for="catSelect"></label>
                    <select name='silver_plan_month' id="catSelect" class="form-control">
                        <?php
                        for ($i = 1; $i <= 12; $i++):
                            ?>
                            <option <?php selected((isset($tiva_options['vip-register']['silver-plan-month']) ? $tiva_options['vip-register']['silver-plan-month'] : ''), $i); ?>
                                    value="<?php echo $i; ?>"><?php echo tiva_change_number($i) . ' ماهه ' ?></option>
                        <?php
                        endfor;
                        ?>
                    </select>
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e(' از این طریق می توانید قیمت این پلن را مشخص کنید ، لطفا به تومان وارد کنید.', 'tiva'); ?>
                </div>
                <div class="form-group">
                    <label for="input3"><?php _e('قیمت این پلن', 'tiva'); ?></label>
                    <input type="number" class="form-control" id="input3" name="silver_plan_price"
                           value="<?php echo (!empty($tiva_options['vip-register']['silver-plan-price'])) ? $tiva_options['vip-register']['silver-plan-price'] : ''; ?>">
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e(' از این طریق می توانید اعتبار هدیه کیف پول کاربر هنگام خرید این پلن را مشخص کنید ، لطفا به تومان وارد کنید.', 'tiva'); ?>
                </div>
                <div class="form-group">
                    <label for="input3"><?php _e('اعتبار هدیه کیف پول کاربر', 'tiva'); ?></label>
                    <input type="number" class="form-control" id="input3" name="silver-plan-gift-credit"
                           value="<?php echo (!empty($tiva_options['vip-register']['silver-plan-gift-credit'])) ? $tiva_options['vip-register']['silver-plan-gift-credit'] : ''; ?>">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e('تنظیمات پلن برنزی', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e('از این طریق می توانید مدت زمان این پلن را مشخص کنید.', 'tiva'); ?>
                </div>
                <div class="">
                    <label for="catSelect"></label>
                    <select name='bronze_plan_month' id="catSelect" class="form-control">
                        <?php
                        for ($i = 1; $i <= 12; $i++):
                            ?>
                            <option <?php selected((isset($tiva_options['vip-register']['bronze-plan-month']) ? $tiva_options['vip-register']['bronze-plan-month'] : ''), $i); ?>
                                    value="<?php echo $i; ?>"><?php echo tiva_change_number($i) . ' ماهه ' ?></option>
                        <?php
                        endfor;
                        ?>
                    </select>
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e(' از این طریق می توانید قیمت این پلن را مشخص کنید ، لطفا به تومان وارد کنید.', 'tiva'); ?>
                </div>
                <div class="form-group">
                    <label for="input3"><?php _e('قیمت این پلن', 'tiva'); ?></label>
                    <input type="number" class="form-control" id="input3" name="bronze_plan_price"
                           value="<?php echo (!empty($tiva_options['vip-register']['bronze-plan-price'])) ? $tiva_options['vip-register']['bronze-plan-price'] : ''; ?>">
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>راهنمایی
                        !</strong> <?php _e(' از این طریق می توانید اعتبار هدیه کیف پول کاربر هنگام خرید این پلن را مشخص کنید ، لطفا به تومان وارد کنید.', 'tiva'); ?>
                </div>
                <div class="form-group">
                    <label for="input3"><?php _e('اعتبار هدیه کیف پول کاربر', 'tiva'); ?></label>
                    <input type="number" class="form-control" id="input3" name="bronze-plan-gift-credit"
                           value="<?php echo (!empty($tiva_options['vip-register']['bronze-plan-gift-credit'])) ? $tiva_options['vip-register']['bronze-plan-gift-credit'] : ''; ?>">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-info red"><?php _e(' تنظیمات دکمه شرایط و قوانین', 'tiva'); ?></div>
    <div class="panel-body">
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>راهنمایی
                !</strong> <?php _e('از این طریق می توانید برگه مورد نظر خود برای دکمه  را تنظیم کنید.', 'tiva'); ?>
        </div>
        <div class="">
            <label for="pageSelect">برگه شرایط و قوانین</label>
            <select name='vip_register_term' id="pageSelect" class="form-control">
                <option> برگه مورد نظر خود را انتخاب کنید</option>
                <?php
                $pages = get_pages();
                foreach ($pages as $page):
                    ?>
                    <option <?php selected((isset($tiva_options['vip-register']['vip-register-term'])) ? $tiva_options['vip-register']['vip-register-term'] : '', $page->ID); ?>
                            value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>
</div>

<div class="well-sm" style="text-align: left;">
    <button type="submit" name="op-panel-submit" class="btn btn-success"><?php _e('ذخیره تنظیمات', 'tiva'); ?></button>
</div>
