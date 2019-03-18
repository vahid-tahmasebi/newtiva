<!doctype html>
<?php $tiva_options = get_option('tiva_options'); ?>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_nonce" content="<?php echo wp_create_nonce('login-ajax'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    BEGIN TIVA FAVICON ADD IN V5.5-->
    <link rel="icon" sizes="16x16" type="image/png"
          href="<?php echo (!empty($tiva_options['seo-page']['tiva-favicon'])) ? $tiva_options['seo-page']['tiva-favicon'] : ''; ?>"/>
    <!-- Windows 8 Tiles -->
    <meta name="application-name" content="Scotch Scotch scotch">
    <meta name="msapplication-TileImage"
          content="<?php echo (!empty($tiva_options['seo-page']['tiva-favicon'])) ? $tiva_options['seo-page']['tiva-favicon'] : ''; ?>">
    <meta name="msapplication-TileColor" content="#2A2A2A">

    <!-- iOS Settings -->
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="viewport" content="width=device-width">
    <meta name="mobile-web-app-capable" content="yes">


    <link rel="icon" sizes="192x192"
          href="<?php echo (!empty($tiva_options['seo-page']['tiva-favicon'])) ? $tiva_options['seo-page']['tiva-favicon'] : ''; ?>">
    <link href="<?php echo (!empty($tiva_options['seo-page']['tiva-favicon'])) ? $tiva_options['seo-page']['tiva-favicon'] : ''; ?>"
          rel="shortcut icon" type="image/x-icon"/>

    <!--    END TIVA FAVICON ADD IN V5.5-->
    <!--BEGIN CSS STYLESHEET INCLUDE-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/custom-style.css' ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <!--END CSS STYLESHEET -->
    <?php wp_head(); ?>
</head>
<body>