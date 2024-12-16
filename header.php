<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$elem = new ContentElements();
$logo = get_field('logo', 'option');
$secondaryLogo = get_field('secondary_logo', 'option');
$headScripts = get_field('head_scripts', 'option');
$bodyScripts = get_field('body_scripts', 'option');
?>
<head>
    <!-- Page title and meta data -->
    <title><?php wp_title(''); ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/7f308f2602.js" crossorigin="anonymous"></script>    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Stylesheets -->
    <!-- IE 6/7/8 support for HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <!-- Favicon(s) -->
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" sizes="48x48">
    <?php wp_head() ?>
    <!-- Analytics -->
    <?php if ($headScripts) {
        echo $headScripts;
    }
    ?>
</head>

<body <?php body_class(); ?>>
<!--[if lte IE 9]>
<div class="legacy-browser-notice">
    <p class="notice">Important Notice</p>
    <p>You are using an <strong>out of date</strong> version of Internet Explorer!</p>
    <p>This browser may prevent this website from displaying and functioning as intended.</p>
    <p>Please <a href="http://www.browsehappy.com" target="_blank">click here</a> to upgrade.</p>
</div>
<![endif]-->
<?php if ($bodyScripts) {
    echo $bodyScripts;
}
?>
<header id="header"
        x-data="{ sticky: false, showPopup: false }"
        x-init="window.addEventListener('scroll', () => sticky = window.scrollY > 50)"
        :class="{ 'bg-[#020304]': sticky, 'bg-transparent': !sticky }"
        class="py-[15px] transition-all duration-300 header fixed top-0 left-0 z-[999] w-[100vw] text-white">
    <div class="container clearfix">
        <div class="flex justify-between items-center">
            <div class="header__left">
                <?php if ($logo) {
                    ?>
                    <div class="header__logo">
                        <a href="<?php echo home_url('/') ?>">
                            <div id="logo-wrap"
                                 :class="{ 'max-w-[150px]': sticky, 'max-w-[190px]': !sticky }"
                                 class="w-full transition-all duration-300">
                                <?php $elem->drawImage($logo['url'], $logo['alt'], 'w-full'); ?>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="header__right">
                <nav id="main-nav">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'menu_class' => 'main-menu'
                    ]);
                    ?>
                </nav>
                <a id="nav-toggle" class="hamburger" href="#"><span></span></a>
            </div>
        </div>
    </div>
</header><!-- END header -->
<main>
    <?php get_template_part('components/hero'); ?>
    <div id="content-wrapper" class="content-wrapper">