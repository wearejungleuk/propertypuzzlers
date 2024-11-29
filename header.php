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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
<header class="header">
    <div class="container clearfix">
        <?php if ($logo) {
            ?>
            <div class="header__logo">
                <a href="<?php echo home_url('/') ?>">
                    <div id="logo-wrap">
                        <?php $elem->drawImage($logo['url'], $logo['alt']); ?>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>
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
</header><!-- END header -->
<main>
    <div id="content-wrapper" class="content-wrapper">