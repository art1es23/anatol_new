<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <?php if ($_SERVER['HTTP_HOST'] == 'anatol.com') {	?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-62469130-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-62469130-1', {
        'optimize_id': 'GTM-58FBJLQ'
    });
    </script>
    <?php } ?>

    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="ahrefs-site-verification" content="3a93b26d16976bdc94172d46fe52763f208e7dafd31c5dfd5d4eba96f37a2db7">
    <meta name="msvalidate.01" content="D505C0D5167549708B5792012618DAD6" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="IHxTwy-m1HOtpvAyuh_5F_KP-ZtqDutub0uDTAnh81A" />
    <meta name="keywords"
        content="screen printing, anatol, Anatol Equipment, Screen Printing Machine, Anatol screen printing equipment, screen printing equipment, Anatol, screen printing machines, Textile Printing, Textile Screen Printing, graphic screen printing, t-shirt printing, textile printing, t-shirt press, electric screen printing machine, Automatic Screen Printing Machine, Presses, Conveyor Dryers, Flash Cure Units, Pre-press, Accessories">
    <meta property="og:image" content="/wp-content/themes/anatol/images/anatol-flag.png" />

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/new-style.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css-new/homepage.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/stylecss.css" type="text/css" /> -->

    <link rel="icon" type="image/x-icon" href="<?php bloginfo("template_url"); ?>/images/favicon.ico" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Roboto+Condensed:wght@300;400;700&display=swap"
        rel="stylesheet">

    <?php 
        global $user_ip, $user_country, $SxGeo;
        require_once( trailingslashit( get_stylesheet_directory() ) . 'SxGeo.php' );
        $SxGeo = new SxGeo( trailingslashit( get_stylesheet_directory() ) . 'SxGeo.dat' );
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $user_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $user_ip = $_SERVER['REMOTE_ADDR'];
        }
        $user_country = $SxGeo->getCountry($user_ip);
    ?>
    <?php if ($user_country === 'US') { ?>

    <script>
    (function(w, d, s, o, f, js, fjs) {
        w['Cit-Widget'] = o;
        w[o] = w[o] || function() {
            (w[o].q = w[o].q || []).push(arguments)
        };
        js = d.createElement(s), fjs = d.getElementsByTagName(s)[0];
        js.id = o;
        js.src = f;
        js.async = 1;
        fjs.parentNode.insertBefore(js, fjs);
    }(window, document, 'script', 'cit', ' https://cdn.directcapital.com/scripts/widget.js?v=' + Math.random()));
    cit('init', {
        mode: "prod",
        partnerId: "EAAAAPyLOcmYv8g/vzLCGY7NdNhoBjI67+do2rbZ38qQaI98FL8/kgGAJSUvSUm+IiIZMlvNRJArd9hxJLqszcqHUHE=",
        term: "60"
    });
    cit('cit-widget-inline-button', null);
    </script>

    <?php } ?>

    <?php wp_head(); ?>
    <script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script>
    const observer = lozad(); // lazy loads elements with default selector as ".lozad"
    observer.observe();
    </script>
    <script type='text/javascript'>
    window.smartlook || (function(d) {
        var o = smartlook = function() {
                o.api.push(arguments)
            },
            h = d.getElementsByTagName('head')[0];
        var c = d.createElement('script');
        o.api = new Array();
        c.async = true;
        c.type = 'text/javascript';
        c.charset = 'utf-8';
        c.src = 'https://web-sdk.smartlook.com/recorder.js';
        h.appendChild(c);
    })(document);
    smartlook('init', '89bb348c3a90f25c4e84b3dbc8f185dfe683952c', {
        region: 'eu'
    });
    </script>
</head>


<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2MZJTG" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header id="header" class="header">
        <div class="header-bg "></div>
        <div class="header--wrapper container">
            <div class="header-top">
                <!-- <div class="container"> -->
                <div class="flex site-header-top">
                    <div class="site-header-col-left site-header-top-left fx_row">
                        <div class="header_social_icons">
                            <?php
                            $current_language_code = apply_filters( 'wpml_current_language', null );
                            if($current_language_code == 'en'){?>
                            <a href="https://www.instagram.com/anatolequipment/" target="_blank"
                                class="item_instagram"><i class="wicon-instagram"></i></a>
                            <a href="https://facebook.com/AnatolEquipment/" target="_blank" class="item_facebook"><i
                                    class="wicon-facebook"></i></a>
                            <a href="https://twitter.com/anatolequipment" target="_blank" class="item_twitter"><i
                                    class="wicon-twitter"></i></a>
                            <a href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank"
                                class="item_linked_in"><i class="wicon-linked-in"></i></a>
                            <a href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank"
                                class="item_youtube"><span class="wicon-youtube"></span></a>
                            <a href="https://www.tiktok.com/@anatolequipment" target="_blank" class="item_tiktok"><span
                                    class="wicon-tiktok"></span></a>
                            <?php 
                            } elseif($current_language_code == 'ru') {  ?>
                            <a href="https://www.instagram.com/anatolequipment/" target="_blank"
                                class="item_instagram"><i class="wicon-instagram"></i></a>
                            <a href="https://facebook.com/AnatolEquipment/" target="_blank" class="item_facebook"><i
                                    class="wicon-facebook"></i></a>
                            <a href="https://twitter.com/anatolequipment" target="_blank" class="item_twitter"><i
                                    class="wicon-twitter"></i></a>
                            <a href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank"
                                class="item_linked_in"><i class="wicon-linked-in"></i></a>
                            <a href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank"
                                class="item_youtube"><span class="wicon-youtube"></span></a>
                            <a href="https://www.tiktok.com/@anatolequipment" target="_blank" class="item_tiktok"><span
                                    class="wicon-tiktok"></span></a>
                            <?php
                            } elseif($current_language_code == 'es'){?>
                            <a href="https://www.instagram.com/anatollatam/" target="_blank" class="item_instagram"><i
                                    class="wicon-instagram"></i></a>
                            <a href="https://www.facebook.com/AnatolLatam/" target="_blank" class="item_facebook"><i
                                    class="wicon-facebook"></i></a>
                            <a href="https://twitter.com/anatolequipment" target="_blank" class="item_twitter"><i
                                    class="wicon-twitter"></i></a>
                            <a href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank"
                                class="item_linked_in"><i class="wicon-linked-in"></i></a>
                            <a href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank"
                                class="item_youtube"><span class="wicon-youtube"></span></a>
                            <a href="https://www.tiktok.com/@anatolequipment" target="_blank" class="item_tiktok"><span
                                    class="wicon-tiktok"></span></a>
                            <?php
                            }?>
                        </div>

                        <div class="header-contacts header_top_block fx_row">
                            <div class="top_phone">
                                <?php if(ICL_LANGUAGE_CODE == 'es'): ?>
                                <a href="tel:+573167696697"><span class="icon-phone"></span>+57 316 7696697</a>
                                <?php else: ?>
                                <a href="tel:+18473679760"><span class="icon-phone"></span>+1 (847) 367-9760</a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <div class="fx_row site-header-col-right site-header-top-right">
                        <?php
                            if( has_nav_menu('top_line_menu') ){
                                wp_nav_menu( array( 'theme_location' => 'top_line_menu', 'container'=> false, 'items_wrap' => '<ul class="top-menu">%3$s</ul>', ) );
                            }?>
                        <div class="lang-header-menu">
                            <div class="lang_swither">
                                <div class="lang_swither_inner1">
                                    <?PHP echo language_selector_flags(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="topmenu-cart">
                            <?php global $woocommerce; ?>
                            <a class="menu-cart" href="<?php echo wc_get_cart_url(); ?>"
                                title="<?php _e('Cart View', 'woothemes'); ?>"><i class="fa fa-shopping-cart"></i><span
                                    class="mini_count"><?php echo sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>
                            </a>

                            <div class="mini_cart_content">
                                <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart();?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="separator site-header-separator "></div> -->
            </div>

            <div class="header-main">
                <!-- <div class="container flex"> -->
                <div id="logo-container" class="header-main__item logo-container hasHoverMe">
                    <!-- <div > -->
                    <a class="site-logo logo site-logo-anch" id="logo" href="<?php bloginfo('url'); ?>">
                        <img loading="lazy" class="lozad logo-img site-logo-img"
                            src="<?php bloginfo('template_directory'); ?>/images/logo_new.svg"
                            alt="Anatol screen printing equipment" width="200" height="40">
                    </a>
                    <!-- </div> -->
                    <div id="info_card" class="logo_infocard">
                        <div class="inf_cont">
                            <div class="inf_left">
                                <!-- <div class="infocard-wrapper text-center"> -->
                                <div><img loading="lazy" class="lozad info-img"
                                        src="<?php bloginfo('template_directory'); ?>/images/anatol-logo-ico.svg"
                                        alt=""></div>
                                <p><?php _e('Revolutionizing the screen printing industry through cutting-edge technology and quality service', 'anatol'); ?>
                                </p>
                                <!-- </div> -->
                            </div>

                            <div class="inf_right">
                                <!-- <div class="custom contact-details"> -->
                                <dive><strong><?php _e('Phone', 'anatol'); ?>:
                                        <a href="tel:+18473679760">+1 (847) 367-9760</a></strong>
                                </dive>
                                <p><strong>Anatol Equipment Manufacturing Co.</strong></p>
                                <p> 919 Sherwood Drive<br>Lake Bluff, IL 60044</p>
                                <a href="https://g.page/AnatolEquipment?share" target="_blank" class="map-link"><span
                                        class="ico_location kl-icon-white"></span>
                                    <span><strong><?php _e('Open in Google Maps', 'anatol'); ?></strong></span>
                                </a>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-main__item site-header-main-center">
                    <div class="main-menu-wrapper">
                        <?php get_template_part('template-parts/template-part-topnav'); ?>
                    </div>
                </div>

                <div class="site-header-main-right">
                    <div class="header-cart"></div>
                    <div class="header-quote">
                        <div class="get_a_quote "><span><?php _e('Get a Quote', 'anatol'); ?></span></div>
                    </div>
                </div>

                <div class="header-main__item menu_icon">
                    <div class="menui top-line"></div>
                    <div class="menui mid-line"></div>
                    <div class="menui bottom-line"></div>
                </div>
                <!-- </div> -->
            </div>
        </div>

    </header>