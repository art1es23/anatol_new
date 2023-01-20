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
    <meta property="og:image" content="/wp-content/themes/anatol/assets/images/anatol-flag.png" />

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

    <link rel="icon" type="image/x-icon" href="<?php bloginfo("template_url"); ?>/assets/images/favicon.ico" />

    <link rel="preload" as="image" href="<?php bloginfo('template_directory'); ?>/assets/images/logo_new.svg">
    <link rel="preload" as="image" href="<?php bloginfo('template_directory'); ?>/assets/images/anatol-logo-ico.svg">

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

    <!-- <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/libs/lozad//lozad.min.js">
    </script> -->

    <script>
    !(function(t, e) {
        "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" ==
            typeof define && define.amd ? define(e) : t.lozad = e()
    })(this, (function() {
        "use strict";
        var t = "undefined" != typeof document && document.documentMode,
            e = {
                rootMargin: "0px",
                threshold: 0,
                load: function(e) {
                    if ("picture" === e.nodeName.toLowerCase()) {
                        var r = e.querySelector("img"),
                            a = !1;
                        null === r && (r = document.createElement("img"), a = !0), t && e.getAttribute(
                            "data-iesrc") && (r.src = e.getAttribute("data-iesrc")), e.getAttribute(
                            "data-alt") && (r.alt = e.getAttribute("data-alt")), a && e.append(r)
                    }
                    if ("video" === e.nodeName.toLowerCase() && !e.getAttribute("data-src") && e.children) {
                        for (var o = e.children, i = void 0, n = 0; n <= o.length - 1; n++)(i = o[n]
                            .getAttribute("data-src")) && (o[n].src = i);
                        e.load()
                    }
                    e.getAttribute("data-poster") && (e.poster = e.getAttribute("data-poster")), e
                        .getAttribute("data-src") && (e.src = e.getAttribute("data-src")), e.getAttribute(
                            "data-srcset") && e.setAttribute("srcset", e.getAttribute("data-srcset"));
                    var d = ",";
                    if (e.getAttribute("data-background-delimiter") && (d = e.getAttribute(
                            "data-background-delimiter")), e.getAttribute("data-background-image")) e.style
                        .backgroundImage = "url('" + e.getAttribute("data-background-image").split(d).join(
                            "'),url('") + "')";
                    else if (e.getAttribute("data-background-image-set")) {
                        var u = e.getAttribute("data-background-image-set").split(d),
                            g = u[0].substr(0, u[0].indexOf(" ")) || u[0];
                        g = -1 === g.indexOf("url(") ? "url(" + g + ")" : g, 1 === u.length ? e.style
                            .backgroundImage = g : e.setAttribute("style", (e.getAttribute("style") || "") +
                                "background-image: " + g + "; background-image: -webkit-image-set(" + u +
                                "); background-image: image-set(" + u + ")")
                    }
                    e.getAttribute("data-toggle-class") && e.classList.toggle(e.getAttribute(
                        "data-toggle-class"))
                },
                loaded: function() {}
            };

        function r(t) {
            t.setAttribute("data-loaded", !0)
        }
        var a = function(t) {
                return "true" === t.getAttribute("data-loaded")
            },
            o = function(t) {
                var e = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : document;
                return t instanceof Element ? [t] : t instanceof NodeList ? t : e.querySelectorAll(t)
            };
        return function() {
            var t, i, n = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : ".lozad",
                d = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {},
                u = Object.assign({}, e, d),
                g = u.root,
                s = u.rootMargin,
                c = u.threshold,
                l = u.load,
                b = u.loaded,
                f = void 0;
            "undefined" != typeof window && window.IntersectionObserver && (f = new IntersectionObserver((
                t = l, i = b,
                function(e, o) {
                    e.forEach((function(e) {
                        (0 < e.intersectionRatio || e.isIntersecting) && (o
                            .unobserve(e.target), a(e.target) || (t(e.target), r(e
                                .target), i(e.target)))
                    }))
                }), {
                root: g,
                rootMargin: s,
                threshold: c
            }));
            for (var A, m = o(n, g), v = 0; v < m.length; v++)(A = m[v]).getAttribute(
                "data-placeholder-background") && (A.style.background = A.getAttribute(
                "data-placeholder-background"));
            return {
                observe: function() {
                    for (var t = o(n, g), e = 0; e < t.length; e++) a(t[e]) || (f ? f.observe(t[e]) : (
                        l(t[e]), r(t[e]), b(t[e])))
                },
                triggerLoad: function(t) {
                    a(t) || (l(t), r(t), b(t))
                },
                observer: f
            }
        }
    }));
    </script>

    <script>
    const observer = lozad(); // lazy loads elements with default selector as ".lozad"
    observer.observe();
    </script>

    <!-- <script type='text/javascript'>
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
    </script> -->
</head>


<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2MZJTG" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header id="header" class="header">
        <div class="header-bg"></div>

        <div class="header--wrapper container">
            <div class="header__item header-top">
                <div class="header-top__item">
                    <div class="social-media social-media--header">
                        <?php
                            $current_language_code = apply_filters( 'wpml_current_language', null );
                            if($current_language_code == 'en'){?>
                        <a class="social-media__link svg-icon-instagram item_instagram"
                            href="https://www.instagram.com/anatolequipment/" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-facebook item_facebook"
                            href="https://facebook.com/AnatolEquipment/" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-twitter item_twitter"
                            href="https://twitter.com/anatolequipment" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-linkedIn item_linked_in"
                            href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-youtube item_youtube"
                            href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-tiktok item_tiktok"
                            href="https://www.tiktok.com/@anatolequipment" target="_blank">
                        </a>

                        <?php } elseif($current_language_code == 'ru') {  ?>
                        <a class="social-media__link item_instagram" href="https://www.instagram.com/anatolequipment/"
                            target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-facebook item_facebook"
                            href="https://facebook.com/AnatolEquipment/" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-twitter item_twitter"
                            href="https://twitter.com/anatolequipment" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-linkedIn item_linked_in"
                            href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-youtube item_youtube"
                            href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-tiktok item_tiktok"
                            href="https://www.tiktok.com/@anatolequipment" target="_blank">
                        </a>

                        <?php } elseif($current_language_code == 'es'){?>
                        <a class="social-media__link item_instagram" href="https://www.instagram.com/anatollatam/"
                            target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-facebook item_facebook"
                            href="https://www.facebook.com/AnatolLatam/" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-twitter item_twitter"
                            href="https://twitter.com/anatolequipment" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-linkedIn item_linked_in"
                            href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-youtube item_youtube"
                            href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank">
                        </a>
                        <a class="social-media__link svg-icon-tiktok item_tiktok"
                            href="https://www.tiktok.com/@anatolequipment" target="_blank">
                        </a>
                        <?php }?>
                    </div>

                    <?php if(ICL_LANGUAGE_CODE == 'es'): ?>
                    <a class="header-contacts" href="tel:+573167696697">
                        <span class="svg-wrapper svg-phone"></span>
                        <span>+57 316 7696697</span>
                    </a>
                    <?php else: ?>
                    <a class="header-contacts" href="tel:+18473679760">
                        <span class="svg-wrapper svg-phone"></span>
                        <span>+1 (847) 367-9760</span>
                    </a>
                    <?php endif; ?>

                </div>

                <div class="header-top__item">
                    <?php
                        if( has_nav_menu('top_line_menu') ){
                            wp_nav_menu( array( 'theme_location' => 'top_line_menu', 'container'=> false, 'items_wrap' => '<ul class="top-menu">%3$s</ul>', ) );
                        }?>
                    <div class="lang_swither">
                        <?PHP echo language_selector_flags(); ?>
                    </div>

                    <div class="topmenu-cart">
                        <?php global $woocommerce; ?>
                        <a class="menu-cart" href="<?php echo wc_get_cart_url(); ?>"
                            title="<?php _e('Cart View', 'woothemes'); ?>">
                            <i class="fa fa-shopping-cart"></i>
                            <span
                                class="mini_count"><?php echo sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>
                        </a>

                        <div class="mini_cart_content">
                            <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart();?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header__item header-main">
                <div id="logo-container" class="header-main__item logo-container">
                    <a class="logo" id="logo" href="<?php bloginfo('url'); ?>">
                        <img class="logo-img" src="<?php bloginfo('template_directory'); ?>/assets/images/logo_new.svg"
                            alt="Anatol screen printing equipment" width="200" height="40">
                    </a>

                    <div id="info_card" class="logo-infocard">
                        <div class="inf_cont">
                            <div class="inf_left">
                                <div>
                                    <img loading="lazy" class="lozad info-img"
                                        src="<?php bloginfo('template_directory'); ?>/assets/images/anatol-logo-ico.svg"
                                        alt="Anatol screen printing equipment logo" width="100" height="56">
                                </div>
                                <p><?php _e('Revolutionizing the screen printing industry through cutting-edge technology and quality service', 'anatol'); ?>
                                </p>
                            </div>

                            <div class="inf_right">
                                <div>
                                    <strong><?php _e('Phone', 'anatol'); ?>:</strong>
                                    <a href="tel:+18473679760">+1 (847) 367-9760</a>
                                </div>
                                <p><strong>Anatol Equipment Manufacturing Co.</strong></p>
                                <p> 919 Sherwood Drive<br>Lake Bluff, IL 60044</p>
                                <a href="https://g.page/AnatolEquipment?share" target="_blank" class="map-link">
                                    <span class="ico_location kl-icon-white svg-wrapper"></span>
                                    <span><strong><?php _e('Open in Google Maps', 'anatol'); ?></strong></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php get_template_part('templates/components/navigation/template-part-topnav'); ?>

                <div class="menu_icon">
                    <div class="menui top-line"></div>
                    <div class="menui mid-line"></div>
                    <div class="menui bottom-line"></div>
                </div>

                <div class="header-main__item site-header-main-right">
                    <div class="header-cart"></div>
                    <div class="button red-button draw-red header-quote get_a_quote">
                        <?php _e('Get a Quote', 'anatol'); ?></div>
                </div>

            </div>
        </div>


    </header>