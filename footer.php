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
                            class="social-media__link item_instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                <path
                                    d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z" />
                            </svg>
                        </a><?php } ?>
                        <?php if(!empty(get_field('fsi_facebook', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_facebook', 'option'); ?>" target="_blank"
                            class="social-media__link item_facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M12,27V15H8v-4h4V8.852C12,4.785,13.981,3,17.361,3c1.619,0,2.475,0.12,2.88,0.175V7h-2.305C16.501,7,16,7.757,16,9.291V11 h4.205l-0.571,4H16v12H12z" />
                            </svg>
                        </a><?php } ?>
                        <?php if(!empty(get_field('fsi_twitter', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_twitter', 'option'); ?>" target="_blank"
                            class="social-media__link item_twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z" />
                            </svg>
                        </a><?php } ?>
                        <?php if(!empty(get_field('fsi_linked_in', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_linked_in', 'option'); ?>" target="_blank"
                            class="social-media__link item_linked_in">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="50px" height="50px">
                                <path
                                    d="M9,25H4V10h5V25z M6.501,8C5.118,8,4,6.879,4,5.499S5.12,3,6.501,3C7.879,3,9,4.121,9,5.499C9,6.879,7.879,8,6.501,8z M27,25h-4.807v-7.3c0-1.741-0.033-3.98-2.499-3.98c-2.503,0-2.888,1.896-2.888,3.854V25H12V9.989h4.614v2.051h0.065 c0.642-1.18,2.211-2.424,4.551-2.424c4.87,0,5.77,3.109,5.77,7.151C27,16.767,27,25,27,25z" />
                            </svg>
                        </a><?php } ?>
                        <a href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank"
                            class="social-media__link item_youtube">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                <path
                                    d="M 24.402344 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.402344 16.898438 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.902344 40.5 17.898438 41 24.5 41 C 31.101563 41 37.097656 40.5 40.597656 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.097656 35.5 C 45.5 33 46 29.402344 46.097656 24.902344 C 46.097656 20.402344 45.597656 16.800781 45.097656 14.300781 C 44.699219 12.101563 42.800781 10.5 40.597656 10 C 37.097656 9.5 31 9 24.402344 9 Z M 24.402344 11 C 31.601563 11 37.398438 11.597656 40.199219 12.097656 C 41.699219 12.5 42.898438 13.5 43.097656 14.800781 C 43.699219 18 44.097656 21.402344 44.097656 24.902344 C 44 29.199219 43.5 32.699219 43.097656 35.199219 C 42.800781 37.097656 40.800781 37.699219 40.199219 37.902344 C 36.597656 38.601563 30.597656 39.097656 24.597656 39.097656 C 18.597656 39.097656 12.5 38.699219 9 37.902344 C 7.5 37.5 6.300781 36.5 6.101563 35.199219 C 5.300781 32.398438 5 28.699219 5 25 C 5 20.398438 5.402344 17 5.800781 14.902344 C 6.101563 13 8.199219 12.398438 8.699219 12.199219 C 12 11.5 18.101563 11 24.402344 11 Z M 19 17 L 19 33 L 33 25 Z M 21 20.402344 L 29 25 L 21 29.597656 Z" />
                            </svg>
                        </a>
                        <a href="https://www.tiktok.com/@anatolequipment" target="_blank"
                            class="social-media__link item_tiktok">
                            <svg width="50px" height="50px" viewBox="0 0 30 25" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 1.5V0H12V16.5C12 18.9818 9.98181 21 7.5 21C5.01819 21 3 18.9818 3 16.5C3 14.0182 5.01819 12 7.5 12H9V9H7.5C3.36438 9 0 12.3644 0 16.5C0 20.6356 3.36438 24 7.5 24C11.6356 24 15 20.6356 15 16.5V7.48572C16.2554 8.43164 17.8103 9 19.5 9H21V6H19.5C17.0182 6 15 3.98181 15 1.5Z" />
                            </svg>
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
                        src="<?php bloginfo('template_directory'); ?>/images/logo_new.svg"
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
        <?php 
            get_template_part('templates/components/forms/get-a-quote-form');
            get_template_part('templates/components/forms/subscribe-us-form');
            get_template_part('templates/components/forms/download-ebook-form');
            get_template_part('templates/components/forms/join-us-form');
            get_template_part('templates/components/forms/register-warranty-form');
            get_template_part('templates/components/forms/vacancy-contact-form');

            // function is_tree( $pid ){
            //     global $post;

            //     // если мы уже на указанной странице выходим
            //     if (is_archive( $pid ) == 'vacancies') {
            //         get_template_part('page-template/components/forms/vacancy-contact-form');
            //         return true;
            //     } elseif ( is_page( $pid ) == 1228 ) {            
            //         get_template_part('page-template/components/forms/join-us-form');
            //     }

            //     // $anc = get_post_ancestors( $post->ID );
            //     // foreach ( $anc as $ancestor ) {
            //     //     if( (is_page() && $ancestor == $pid ) || (is_archive() && $ancestor == $pid ) ) {
            //     //         get_template_part('page-template/components/forms/vacancy-contact-form');
            
            //     //         return true;
            //     //     }
            //     // }

            //     return false;
            // };

            // is_tree(1228);
            // is_tree('vacancies');
        ?>
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