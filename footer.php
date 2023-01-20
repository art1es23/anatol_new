    <div class="footer">
        <div class="footer--wrapper container">
            <div class="footer__item widget-1">

                <h3 class="widget_title">Anatol Equipment Manufacturing Co.</h3>
                <p class="footer_description">
                    <?php _e('Anatol screen printing machines are currently helping printers produce high quality work with speed, efficiency and reliability in over 70 countries on six continents.', 'anatol'); ?>
                </p>

                <div class="footer_subscribe">
                    <button class="button subscribe-button draw-white"><?php _e('Subscribe', 'anatol');?></button>
                    <button class="get_a_quote button red-button draw-red"><?php _e('Get a Quote', 'anatol');?></button>
                </div>

                <div class="footer_social">
                    <!-- <div class="widget_title"><?php echo get_field('fsi_title', 'option'); ?></div> -->
                    <div class="social-media social-media--footer">
                        <?php if(!empty(get_field('fsi_instagram', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_instagram', 'option'); ?>" target="_blank"
                            class="social-media__link svg-icon-instagram item_instagram">
                        </a><?php } ?>
                        <?php if(!empty(get_field('fsi_facebook', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_facebook', 'option'); ?>" target="_blank"
                            class="social-media__link svg-icon-facebook item_facebook">
                        </a><?php } ?>
                        <?php if(!empty(get_field('fsi_twitter', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_twitter', 'option'); ?>" target="_blank"
                            class="social-media__link svg-icon-twitter item_twitter">
                        </a><?php } ?>
                        <?php if(!empty(get_field('fsi_linked_in', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_linked_in', 'option'); ?>" target="_blank"
                            class="social-media__link svg-icon-linkedIn item_linked_in">
                        </a><?php } ?>
                        <a href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank"
                            class="social-media__link svg-icon-youtube item_youtube">
                        </a>
                        <a href="https://www.tiktok.com/@anatolequipment" target="_blank"
                            class="social-media__link svg-icon-tiktok item_tiktok">
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer__item widget-2">
                <h3 class="widget_title"><?php _e('Equipment', 'anatol');?></h3>
                <div class="menu-footer-menu-container">
                    <?php if ( is_active_sidebar( 'footer-equipment' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-equipment' ); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer__item widget-3">
                <div class="widget_title"><?php _e('Info', 'anatol');?></div>
                <?php if ( is_active_sidebar( 'footer-info' ) ) : ?>
                <?php dynamic_sidebar( 'footer-info' ); ?>
                <?php endif; ?>
            </div>

        </div>
        <div class="copyright">
            <div class="copyright--wrapper container">

                <a href="/" class="copyright__item footer-logo">
                    <img loading="lazy" class="lozad logo-img site-logo-img"
                        src="<?php bloginfo('template_directory'); ?>/assets/images/logo_new.svg"
                        alt="Anatol Equipment Manufacturing Co. - Screen Printing Equipment" width="200" height="40">
                </a>
                <p class="copyright__item copytext">
                    <?php _e('© 2018', 'anatol'); ?>-<?php echo date('Y'); ?>
                    <?php _e('Anatol Equipment Manufacturing Co. All Rights Reserved.', 'anatol'); ?>
                </p>
                <ul class="copyright__item policy-terms">
                    <li class="policy-terms__item">
                        <a class="policy-terms__link" href="/privacy-policy/">Privacy
                            Policy</a>
                    </li>
                    <li class="policy-terms__item">
                        <a class="policy-terms__link" href="#">Terms of Service</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="popupWrapper" class="form--wrapper hidden">
        <?php get_template_part('templates/components/forms/form-template'); ?>
    </div>

    </div>
    </div>
    </div>

    <!-- end main container -->
    <a id="scrollToTop" class="scroll-to-top-button" href="#">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" viewBox="0 0 284.815 284.815" style="enable-background:new 0 0 284.815 284.815;"
            xml:space="preserve">
            <g>
                <path d="M255.9,228.08c-7.725,0-14.987-3.014-20.45-8.471l-93.048-93.054l-93.041,93.048c-5.456,5.463-12.719,8.471-20.45,8.471
			s-14.994-3.008-20.457-8.471c-11.273-11.273-11.273-29.621,0-40.894L121.952,65.205c5.456-5.463,12.719-8.471,20.444-8.471
			c7.719,0,14.987,3.008,20.45,8.471l113.498,113.504c5.469,5.463,8.471,12.719,8.471,20.45c0,7.719-3.008,14.987-8.471,20.45
			C270.888,225.066,263.626,228.08,255.9,228.08z M142.403,108.381l102.135,102.142c6.073,6.073,16.645,6.073,22.719,0
			c3.04-3.04,4.704-7.076,4.704-11.363s-1.671-8.323-4.704-11.363L153.47,74.016c-6.073-5.797-16.453-5.701-22.423,0.276
			L17.542,187.797c-6.266,6.266-6.266,16.459,0,22.719c6.073,6.073,16.658,6.073,22.725,0L142.403,108.381z" />
            </g>
        </svg>
    </a>
    <?php wp_footer(); ?>

    <!-- MAIN MODULE JS-FILE -->
    <!-- <script defer type="module" src="<?php echo get_template_directory_uri().'/js/main.js'?>"></script> -->

    <script>
const scrollButton = document.querySelector('#scrollToTop');

window.addEventListener('mousewheel', e => {
    (document.documentElement.scrollTop >= 500) ? scrollButton.classList.add('visible'): scrollButton.classList
        .remove('visible');
});

scrollButton.addEventListener('click', e => {
    e.preventDefault();

    scrollTo({
        top: 0,
        behavior: 'smooth',
    })
});
    </script>

    <script>
function yesnoCheck(that) {
    if (that.value == "United States") {
        document.getElementById("ifYes").style.display = "block";
        document.getElementById("state_required").setAttribute("required", "");
        document.querySelectorAll('.usa_state').forEach(item => item.style.display = 'block');
        document.querySelectorAll('.canadian_province').forEach(item => item.style.display = 'none');

    } else if (that.value == "Canada") {
        document.getElementById("ifYes").style.display = "block";
        document.querySelectorAll('.usa_state').forEach(item => item.style.display = 'none');
        document.querySelectorAll('.canadian_province').forEach(item => item.style.display = 'block');
    } else {
        document.getElementById("ifYes").style.display = "none";
        document.getElementById("state_required").removeAttribute("required");
    }
}

// function yesnoChecks(that) {
//     if (that.value === "United States") {
//         document.getElementById("ifYess").style.display = "block";
//         document.getElementById("state_required").setAttribute("required", "");
//         // $('.usa_state').show();
//     } else if (that.value === "Canada") {
//         document.getElementById("ifYess").style.display = "block";
//         // $('.canadian_province').show();
//         // $('.usa_state').hide();
//     } else {
//         document.getElementById("ifYess").style.display = "none";
//         document.getElementById("state_required").removeAttribute("required");

//     }
// }


// const smoothLinks = document.querySelectorAll('a[href^="#"]');
// for (let smoothLink of smoothLinks) {
//     smoothLink.addEventListener("click", function(e) {
//         e.preventDefault();
//         const id = smoothLink.getAttribute("href");

//         document.querySelector(id).scrollIntoView({
//             behavior: "smooth",
//             block: "start",
//         });
//     });
// }
    </script>


    <!-- <script async defer src="https://www.google.com/recaptcha/api.js?render=6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db">
    </script> -->

    <!-- <?php $SITE_KEY="6LcUBm0jAAAAAMVNjonvkvJpJv-tHzob8hHCsfzz"?>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=<?php echo $SITE_KEY?>">
    </script>

    <script>
grecaptcha.enterprise.ready(function() {
    grecaptcha.enterprise.execute(<?php echo $SITE_KEY?>, {
        action: 'login'
    }).then(function(token) {
        console.log('====================================');
        console.log('TOKEN: ', token);
        console.log('====================================');
    });
});
    </script> -->

    <script async type='text/javascript' data-cfasync='false'>
setTimeout(() => {
    window.purechatApi = {
        l: [],
        t: [],
        on: function() {
            this.l.push(arguments);
        }
    };

    (function() {
        var done = false;
        var script = document.createElement('script');
        script.async = true;
        script.type = 'text/javascript';
        script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';
        document.getElementsByTagName('HEAD').item(0).appendChild(script);
        script.onreadystatechange = script.onload = function(e) {
            if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState ==
                    'complete')) {
                var w = new PCWidget({
                    c: '06a77c40-853c-4008-894a-a95390ddfe15',
                    f: true
                });
                done = true;
            }
        };

    })();


}, 10000);
    </script>
    </body>

    </html>