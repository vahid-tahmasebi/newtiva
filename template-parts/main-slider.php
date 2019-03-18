<?php
$tiva_options = get_option('tiva_options');
?>
<div class="hamyar-main-slider card-wrapper">
    <?php if (!empty($tiva_options['main-slider']['shSlide1_img'])): ?>
        <div class="slide-1 card-wrapper">
            <a title="<?php echo (isset($tiva_options['main-slider']['shSlide1_alt'])) ? $tiva_options['main-slider']['shSlide1_alt'] : ''; ?>" href="<?php echo (isset($tiva_options['main-slider']['shSlide1_url'])) ? $tiva_options['main-slider']['shSlide1_url'] : ''; ?>">
                <img class="h-slide"
                     title="<?php echo (isset($tiva_options['main-slider']['shSlide1_alt'])) ? $tiva_options['main-slider']['shSlide1_alt'] : ''; ?>"
                     src="<?php echo (isset($tiva_options['main-slider']['shSlide1_img'])) ? $tiva_options['main-slider']['shSlide1_img'] : ''; ?>"
                     alt="<?php echo (isset($tiva_options['main-slider']['shSlide1_alt'])) ? $tiva_options['main-slider']['shSlide1_alt'] : ''; ?>">
            </a>
        </div>
    <?php endif; ?>
    <?php if (!empty($tiva_options['main-slider']['shSlide2_img'])): ?>
        <div class="slide-2 card-wrapper">
            <a title="<?php echo (isset($tiva_options['main-slider']['shSlide2_alt'])) ? $tiva_options['main-slider']['shSlide2_alt'] : ''; ?>" href="<?php echo (isset($tiva_options['main-slider']['shSlide2_url'])) ? $tiva_options['main-slider']['shSlide2_url'] : ''; ?>"><img
                        class="h-slide"
                        title="<?php echo (isset($tiva_options['main-slider']['shSlide2_alt'])) ? $tiva_options['main-slider']['shSlide2_alt'] : ''; ?>"
                        src="<?php echo (isset($tiva_options['main-slider']['shSlide2_img'])) ? $tiva_options['main-slider']['shSlide2_img'] : ''; ?>"
                        alt="<?php echo (isset($tiva_options['main-slider']['shSlide2_alt'])) ? $tiva_options['main-slider']['shSlide2_alt'] : ''; ?>">
            </a>
        </div>
    <?php endif; ?>
    <?php if (!empty($tiva_options['main-slider']['shSlide3_img'])): ?>
        <div class="slide-3 card-wrapper">
            <a title="<?php echo (isset($tiva_options['main-slider']['shSlide3_alt'])) ? $tiva_options['main-slider']['shSlide3_alt'] : ''; ?>" href="<?php echo (isset($tiva_options['main-slider']['shSlide3_url'])) ? $tiva_options['main-slider']['shSlide3_url'] : ''; ?>">
                <img class="h-slide"
                     title="<?php echo (isset($tiva_options['main-slider']['shSlide3_alt'])) ? $tiva_options['main-slider']['shSlide3_alt'] : ''; ?>"
                     src="<?php echo (isset($tiva_options['main-slider']['shSlide3_img'])) ? $tiva_options['main-slider']['shSlide3_img'] : ''; ?>"
                     alt="<?php echo (isset($tiva_options['main-slider']['shSlide3_alt'])) ? $tiva_options['main-slider']['shSlide3_alt'] : ''; ?>">
            </a>
        </div>
    <?php endif; ?>
</div>

