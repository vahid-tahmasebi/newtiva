<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        <?php
        $tiva_options = get_option('tiva_options');; ?>
        <h6><?php echo (isset($tiva_options['index-page']['tiva_copy_right_op'])) ? $tiva_options['index-page']['tiva_copy_right_op'] : ''; ?></h6>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/jquery.min.js' ?>" type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/custom-plugin.js' ?>" type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/bootstrap.min.js' ?>"
        type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/lobibox.min.js' ?>"
        type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/jquery.validate.min.js' ?>"
        type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/additional-methods.min.js' ?>"
        type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/jquery.slimscroll.min.js' ?>"
        type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/jquery.blockui.min.js' ?>"
        type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/app.js' ?>" type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/quick-nav.js' ?>" type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/layout.js' ?>" type="text/javascript"></script>
<script src="<?PHP echo get_template_directory_uri() . '/panel/assets/js/custom.js' ?>" type="text/javascript"></script>
<?php wp_footer(); ?>

<script type="text/javascript">
    // BEGIN OVERRIDE NOTIFICATION OPTION
    var panel_patch = '/panel/assets/js/sounds/';
    Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
        iconSource: "fontAwesome",
        soundPath: data.temp_patch + panel_patch
    });
    // END OVERRIDE NOTIFICATION OPTION
</script>