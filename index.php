<?php
get_header();
$tiva_options = get_option('tiva_options');
get_template_part('template-parts/header');
get_template_part('template-parts/top-menu');
get_template_part('template-parts/main-content');
get_template_part('template-parts/footer');
get_footer();
