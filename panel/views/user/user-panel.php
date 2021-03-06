
<!doctype html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php include get_template_directory() . '/panel/views/public/header.php'; ?>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!-- BEGIN HEADER -->
<?php //include get_template_directory().'/user-panel/views/partials/top-bar.php'; ?>
<!-- END HEADER -->
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <?php include get_template_directory() . '/panel/views/user/user-top-bar.php'; ?>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <?php include get_template_directory() . '/panel/views/user/user-sidebar-menu.php'; ?>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- END CONTAINER -->
                <?php
                $current_panel = $GLOBALS['current_panel'];
                $white_list_panels = tiva_get_panels_white_list();
//                dd($current_panel);
                if (in_array($current_panel, $white_list_panels)) {
                    $file_path = SL_THEME_USER_PANEL_VIEWS . 'user/part/' . $current_panel . '.php';
                    if (is_file($file_path) && file_exists($file_path)) {
                        include $file_path;
                    } else {
                        include SL_THEME_USER_PANEL_VIEWS . '/errors/404.php';
                    }
                }else{
                    include SL_THEME_USER_PANEL_VIEWS . '/errors/404.php';
                }
                ?>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->

</div>
<!-- BEGIN FOOTER -->
<?php include get_template_directory() . '/panel/views/public/footer.php'; ?>
<!-- END FOOTER -->
</body>
</html>


