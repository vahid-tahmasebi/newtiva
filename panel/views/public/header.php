<head>
    <?php $tiva_options = get_option('tiva_options'); ?>
    <meta charset="utf-8"/>
    <title>پنل کاربری</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content=" پنل کاربری" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" type="text/css">
    <link href="<?php echo get_template_directory_uri() . '/panel/assets/css/bootstrap-rtl.min.css'; ?>" rel="stylesheet" type="text/css"/>

    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo get_template_directory_uri() . '/panel/assets/css/components-rtl.min.css'; ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri() . '/panel/assets/css/plugins-rtl.min.css'; ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri() . '/panel/assets/css/lobibox.min.css'; ?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo get_template_directory_uri() . '/panel/assets/css/layout-rtl.css'; ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri() . '/panel/assets/css/darkblue-rtl.min.css'; ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri() . '/panel/assets/css/custom-plugin.css'; ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri() . '/panel/assets/css/custom.css'; ?>" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="<?php echo (!empty($tiva_options['seo-page']['tiva-favicon'])) ? $tiva_options['seo-page']['tiva-favicon'] : ''; ?>"/>

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href=""/>

    <?php wp_head();?>
    <script type="text/javascript">
        new WOW().init();
        function show_alert(msg, status) {
            Lobibox.notify(status, {
                title: false,
                width: 420,
                msg: msg,
                showClass: 'bounceIn',
                hideClass: 'bounceOut',
                position: 'top right',
                delay: 4500
            });
            return this;
        }
    </script>

</head>