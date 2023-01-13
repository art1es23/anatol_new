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

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

    <link rel="icon" type="image/x-icon" href="<?php bloginfo("template_url"); ?>/images/favicon.ico" />

    <link rel="preload" as="image" href="<?php bloginfo('template_directory'); ?>/images/logo_new.svg">
    <link rel="preload" as="image" href="<?php bloginfo('template_directory'); ?>/images/anatol-logo-ico.svg">

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
                        <a class="social-media__link item_instagram" href="https://www.instagram.com/anatolequipment/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                <path
                                    d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_facebook" href="https://facebook.com/AnatolEquipment/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M12,27V15H8v-4h4V8.852C12,4.785,13.981,3,17.361,3c1.619,0,2.475,0.12,2.88,0.175V7h-2.305C16.501,7,16,7.757,16,9.291V11 h4.205l-0.571,4H16v12H12z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_twitter" href="https://twitter.com/anatolequipment"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_linked_in"
                            href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M9,25H4V10h5V25z M6.501,8C5.118,8,4,6.879,4,5.499S5.12,3,6.501,3C7.879,3,9,4.121,9,5.499C9,6.879,7.879,8,6.501,8z M27,25h-4.807v-7.3c0-1.741-0.033-3.98-2.499-3.98c-2.503,0-2.888,1.896-2.888,3.854V25H12V9.989h4.614v2.051h0.065 c0.642-1.18,2.211-2.424,4.551-2.424c4.87,0,5.77,3.109,5.77,7.151C27,16.767,27,25,27,25z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_youtube"
                            href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                <path
                                    d="M 24.402344 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.402344 16.898438 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.902344 40.5 17.898438 41 24.5 41 C 31.101563 41 37.097656 40.5 40.597656 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.097656 35.5 C 45.5 33 46 29.402344 46.097656 24.902344 C 46.097656 20.402344 45.597656 16.800781 45.097656 14.300781 C 44.699219 12.101563 42.800781 10.5 40.597656 10 C 37.097656 9.5 31 9 24.402344 9 Z M 24.402344 11 C 31.601563 11 37.398438 11.597656 40.199219 12.097656 C 41.699219 12.5 42.898438 13.5 43.097656 14.800781 C 43.699219 18 44.097656 21.402344 44.097656 24.902344 C 44 29.199219 43.5 32.699219 43.097656 35.199219 C 42.800781 37.097656 40.800781 37.699219 40.199219 37.902344 C 36.597656 38.601563 30.597656 39.097656 24.597656 39.097656 C 18.597656 39.097656 12.5 38.699219 9 37.902344 C 7.5 37.5 6.300781 36.5 6.101563 35.199219 C 5.300781 32.398438 5 28.699219 5 25 C 5 20.398438 5.402344 17 5.800781 14.902344 C 6.101563 13 8.199219 12.398438 8.699219 12.199219 C 12 11.5 18.101563 11 24.402344 11 Z M 19 17 L 19 33 L 33 25 Z M 21 20.402344 L 29 25 L 21 29.597656 Z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_tiktok" href="https://www.tiktok.com/@anatolequipment"
                            target="_blank">
                            <svg width="50px" height="50px" viewBox="0 0 30 25" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 1.5V0H12V16.5C12 18.9818 9.98181 21 7.5 21C5.01819 21 3 18.9818 3 16.5C3 14.0182 5.01819 12 7.5 12H9V9H7.5C3.36438 9 0 12.3644 0 16.5C0 20.6356 3.36438 24 7.5 24C11.6356 24 15 20.6356 15 16.5V7.48572C16.2554 8.43164 17.8103 9 19.5 9H21V6H19.5C17.0182 6 15 3.98181 15 1.5Z" />
                            </svg>
                        </a>
                        <?php 
                            } elseif($current_language_code == 'ru') {  ?>
                        <a class="social-media__link item_instagram" href="https://www.instagram.com/anatolequipment/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                <path
                                    d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_facebook" href="https://facebook.com/AnatolEquipment/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M12,27V15H8v-4h4V8.852C12,4.785,13.981,3,17.361,3c1.619,0,2.475,0.12,2.88,0.175V7h-2.305C16.501,7,16,7.757,16,9.291V11 h4.205l-0.571,4H16v12H12z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_twitter" href="https://twitter.com/anatolequipment"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_linked_in"
                            href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M9,25H4V10h5V25z M6.501,8C5.118,8,4,6.879,4,5.499S5.12,3,6.501,3C7.879,3,9,4.121,9,5.499C9,6.879,7.879,8,6.501,8z M27,25h-4.807v-7.3c0-1.741-0.033-3.98-2.499-3.98c-2.503,0-2.888,1.896-2.888,3.854V25H12V9.989h4.614v2.051h0.065 c0.642-1.18,2.211-2.424,4.551-2.424c4.87,0,5.77,3.109,5.77,7.151C27,16.767,27,25,27,25z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_youtube"
                            href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                <path
                                    d="M 24.402344 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.402344 16.898438 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.902344 40.5 17.898438 41 24.5 41 C 31.101563 41 37.097656 40.5 40.597656 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.097656 35.5 C 45.5 33 46 29.402344 46.097656 24.902344 C 46.097656 20.402344 45.597656 16.800781 45.097656 14.300781 C 44.699219 12.101563 42.800781 10.5 40.597656 10 C 37.097656 9.5 31 9 24.402344 9 Z M 24.402344 11 C 31.601563 11 37.398438 11.597656 40.199219 12.097656 C 41.699219 12.5 42.898438 13.5 43.097656 14.800781 C 43.699219 18 44.097656 21.402344 44.097656 24.902344 C 44 29.199219 43.5 32.699219 43.097656 35.199219 C 42.800781 37.097656 40.800781 37.699219 40.199219 37.902344 C 36.597656 38.601563 30.597656 39.097656 24.597656 39.097656 C 18.597656 39.097656 12.5 38.699219 9 37.902344 C 7.5 37.5 6.300781 36.5 6.101563 35.199219 C 5.300781 32.398438 5 28.699219 5 25 C 5 20.398438 5.402344 17 5.800781 14.902344 C 6.101563 13 8.199219 12.398438 8.699219 12.199219 C 12 11.5 18.101563 11 24.402344 11 Z M 19 17 L 19 33 L 33 25 Z M 21 20.402344 L 29 25 L 21 29.597656 Z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_tiktok" href="https://www.tiktok.com/@anatolequipment"
                            target="_blank">
                            <svg width="50px" height="50px" viewBox="0 0 30 25" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 1.5V0H12V16.5C12 18.9818 9.98181 21 7.5 21C5.01819 21 3 18.9818 3 16.5C3 14.0182 5.01819 12 7.5 12H9V9H7.5C3.36438 9 0 12.3644 0 16.5C0 20.6356 3.36438 24 7.5 24C11.6356 24 15 20.6356 15 16.5V7.48572C16.2554 8.43164 17.8103 9 19.5 9H21V6H19.5C17.0182 6 15 3.98181 15 1.5Z" />
                            </svg>
                        </a>
                        <?php
                            } elseif($current_language_code == 'es'){?>
                        <a class="social-media__link item_instagram" href="https://www.instagram.com/anatollatam/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                <path
                                    d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_facebook" href="https://www.facebook.com/AnatolLatam/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M12,27V15H8v-4h4V8.852C12,4.785,13.981,3,17.361,3c1.619,0,2.475,0.12,2.88,0.175V7h-2.305C16.501,7,16,7.757,16,9.291V11 h4.205l-0.571,4H16v12H12z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_twitter" href="https://twitter.com/anatolequipment"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_linked_in"
                            href="https://www.linkedin.com/company/anatol-equipment-manufacturing-co" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M9,25H4V10h5V25z M6.501,8C5.118,8,4,6.879,4,5.499S5.12,3,6.501,3C7.879,3,9,4.121,9,5.499C9,6.879,7.879,8,6.501,8z M27,25h-4.807v-7.3c0-1.741-0.033-3.98-2.499-3.98c-2.503,0-2.888,1.896-2.888,3.854V25H12V9.989h4.614v2.051h0.065 c0.642-1.18,2.211-2.424,4.551-2.424c4.87,0,5.77,3.109,5.77,7.151C27,16.767,27,25,27,25z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_youtube"
                            href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                <path
                                    d="M 24.402344 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.402344 16.898438 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.902344 40.5 17.898438 41 24.5 41 C 31.101563 41 37.097656 40.5 40.597656 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.097656 35.5 C 45.5 33 46 29.402344 46.097656 24.902344 C 46.097656 20.402344 45.597656 16.800781 45.097656 14.300781 C 44.699219 12.101563 42.800781 10.5 40.597656 10 C 37.097656 9.5 31 9 24.402344 9 Z M 24.402344 11 C 31.601563 11 37.398438 11.597656 40.199219 12.097656 C 41.699219 12.5 42.898438 13.5 43.097656 14.800781 C 43.699219 18 44.097656 21.402344 44.097656 24.902344 C 44 29.199219 43.5 32.699219 43.097656 35.199219 C 42.800781 37.097656 40.800781 37.699219 40.199219 37.902344 C 36.597656 38.601563 30.597656 39.097656 24.597656 39.097656 C 18.597656 39.097656 12.5 38.699219 9 37.902344 C 7.5 37.5 6.300781 36.5 6.101563 35.199219 C 5.300781 32.398438 5 28.699219 5 25 C 5 20.398438 5.402344 17 5.800781 14.902344 C 6.101563 13 8.199219 12.398438 8.699219 12.199219 C 12 11.5 18.101563 11 24.402344 11 Z M 19 17 L 19 33 L 33 25 Z M 21 20.402344 L 29 25 L 21 29.597656 Z" />
                            </svg>
                        </a>
                        <a class="social-media__link item_tiktok" href="https://www.tiktok.com/@anatolequipment"
                            target="_blank">
                            <svg width="50px" height="50px" viewBox="0 0 30 25" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 1.5V0H12V16.5C12 18.9818 9.98181 21 7.5 21C5.01819 21 3 18.9818 3 16.5C3 14.0182 5.01819 12 7.5 12H9V9H7.5C3.36438 9 0 12.3644 0 16.5C0 20.6356 3.36438 24 7.5 24C11.6356 24 15 20.6356 15 16.5V7.48572C16.2554 8.43164 17.8103 9 19.5 9H21V6H19.5C17.0182 6 15 3.98181 15 1.5Z" />
                            </svg>
                        </a>
                        <?php
                            }?>
                    </div>

                    <?php if(ICL_LANGUAGE_CODE == 'es'): ?>
                    <a class="header-contacts" href="tel:+573167696697">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.167,16.155a2.5,2.5,0,0,0-3.535,0l-.385.384A46.692,46.692,0,0,1,7.458,10.75l.385-.385a2.5,2.5,0,0,0,0-3.536L5.721,4.708a2.5,2.5,0,0,0-3.535,0L1.022,5.872a3.51,3.51,0,0,0-.442,4.4A46.932,46.932,0,0,0,13.722,23.417a3.542,3.542,0,0,0,4.4-.442l1.165-1.164a2.5,2.5,0,0,0,0-3.535Z" />
                            <path
                                d="M11.5,0a1,1,0,0,0,0,2A10.512,10.512,0,0,1,22,12.5a1,1,0,1,0,2,0A12.515,12.515,0,0,0,11.5,0Z" />
                            <path
                                d="M11.5,6A6.508,6.508,0,0,1,18,12.5a1,1,0,0,0,2,0A8.51,8.51,0,0,0,11.5,4a1,1,0,1,0,0,2Z" />
                            <path
                                d="M11.5,10A2.5,2.5,0,0,1,14,12.5a1,1,0,0,0,2,0A4.505,4.505,0,0,0,11.5,8a1,1,0,1,0,0,2Z" />
                        </svg>
                        <span>+57 316 7696697</span>
                    </a>
                    <?php else: ?>
                    <a class="header-contacts" href="tel:+18473679760">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.167,16.155a2.5,2.5,0,0,0-3.535,0l-.385.384A46.692,46.692,0,0,1,7.458,10.75l.385-.385a2.5,2.5,0,0,0,0-3.536L5.721,4.708a2.5,2.5,0,0,0-3.535,0L1.022,5.872a3.51,3.51,0,0,0-.442,4.4A46.932,46.932,0,0,0,13.722,23.417a3.542,3.542,0,0,0,4.4-.442l1.165-1.164a2.5,2.5,0,0,0,0-3.535Z" />
                            <path
                                d="M11.5,0a1,1,0,0,0,0,2A10.512,10.512,0,0,1,22,12.5a1,1,0,1,0,2,0A12.515,12.515,0,0,0,11.5,0Z" />
                            <path
                                d="M11.5,6A6.508,6.508,0,0,1,18,12.5a1,1,0,0,0,2,0A8.51,8.51,0,0,0,11.5,4a1,1,0,1,0,0,2Z" />
                            <path
                                d="M11.5,10A2.5,2.5,0,0,1,14,12.5a1,1,0,0,0,2,0A4.505,4.505,0,0,0,11.5,8a1,1,0,1,0,0,2Z" />
                        </svg>
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
                        <img class="logo-img" src="<?php bloginfo('template_directory'); ?>/images/logo_new.svg"
                            alt="Anatol screen printing equipment" width="200" height="40">
                    </a>

                    <div id="info_card" class="logo-infocard">
                        <div class="inf_cont">
                            <div class="inf_left">
                                <div>
                                    <img loading="lazy" class="lozad info-img"
                                        src="<?php bloginfo('template_directory'); ?>/images/anatol-logo-ico.svg"
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
                                    <span class="ico_location kl-icon-white svg-wrapper">
                                        <!-- <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <g data-name="10-location" id="_10-location">
                                                <path class="cls-1"
                                                    d="M27,12A11,11,0,0,0,5,12C5,22,16,31,16,31S27,22,27,12Z" />
                                                <circle class="cls-1" cx="16" cy="12" r="5" />
                                            </g>
                                        </svg> -->
                                    </span>
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
                    <div class="button header-quote get_a_quote"><?php _e('Get a Quote', 'anatol'); ?></div>
                </div>

            </div>
        </div>


    </header>