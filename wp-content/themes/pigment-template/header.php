<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title('');?><?php if(wp_title('', false)) {echo ': ';} ?> <?php bloginfo('name');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<meta name="format-detection" content="telephone=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    $header = get_field('header', 2);
    
    ?>
    <div class="preloader">
        <img src="<?php echo get_template_directory_uri() ;?>/src/images/ajax-loader.gif" alt="">
    </div>
    <header class="header">
        <div class="header__wrapper">
            <div class="header__inner">
                <div class="header__inner--logo">
                    <a href="<?php echo home_url() ;?>">
                        <img src="<?= ($header['logo']['url']) ;?> ">
                    </a>
                </div>
                <div class="right-menu">
                    <div class="hamburger-wrapper">
                        <button class="hamburger hamburger--squeeze" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav aria-label="Main Menu" class="header__menu">
                <div class="header__menu--main">
                    <?php wp_nav_menu( array('menu' => 'Main Menu') ); ?>
                </div>
                <div class="header__menu--number">
                    <img class="icon" src="<?=get_template_directory_uri()?>/src/images/icons/phone.svg" /> 
                    <a href="tel:+48785474588">Zadzwoń: <br>+48 785 474 588</a>
                </div>
            </nav>
        </div>
        </div>
    </header>