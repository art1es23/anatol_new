    <div class="footer">
        <div class="footer--wrapper container">
            <!-- <div class="footer_widgets"> -->
            <div class="footer__item widget-1">

                <!-- <div class="widget_title"> -->
                <h3 class="widget_title">Anatol Equipment Manufacturing Co.</h3>
                <!-- </div> -->
                <p class="footer_description">
                    <?php _e('Anatol screen printing machines are currently helping printers produce high quality work with speed, efficiency and reliability in over 70 countries on six continents.', 'anatol'); ?>
                </p>

                <div class="footer_subscribe">
                    <button class="button subscribe-button draw-white"><?php _e('Subscribe', 'anatol');?></button>
                    <button class="get_a_quote button red-button draw-red"><?php _e('Get a Quote', 'anatol');?></button>
                </div>

                <div class="footer_social">
                    <div class="widget_title"><?php echo get_field('fsi_title', 'option'); ?></div>
                    <div class="footer_social_icons">
                        <?php if(!empty(get_field('fsi_instagram', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_instagram', 'option'); ?>" target="_blank"
                            class="item_instagram"><i class="wicon-instagram"></i></a><?php } ?>
                        <?php if(!empty(get_field('fsi_facebook', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_facebook', 'option'); ?>" target="_blank"
                            class="item_facebook"><i class="wicon-facebook"></i></a><?php } ?>
                        <?php if(!empty(get_field('fsi_twitter', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_twitter', 'option'); ?>" target="_blank"
                            class="item_twitter"><i class="wicon-twitter"></i></a><?php } ?>
                        <?php if(!empty(get_field('fsi_linked_in', 'option'))) { ?>
                        <a href="<?php echo get_field('fsi_linked_in', 'option'); ?>" target="_blank"
                            class="item_linked_in"><i class="wicon-linked-in"></i></a><?php } ?>
                        <a href="https://www.youtube.com/channel/UCcmF2LudDzC1MJyD2d7U2OA" target="_blank"
                            class="item_youtube"><span class="wicon-youtube"></span>
                        </a>
                        <a href="https://www.tiktok.com/@anatolequipment" target="_blank" class="item_tiktok"><span
                                class="wicon-tiktok"></span></a>
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
                <div class="widget_title"><span><?php _e('Info', 'anatol');?></span></div>
                <?php if ( is_active_sidebar( 'footer-info' ) ) : ?>
                <?php dynamic_sidebar( 'footer-info' ); ?>
                <?php endif; ?>
            </div>

            <!-- </div> -->
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="footer-logo"><a href="/" class="foot-logo"><img loading="lazy"
                        class="lozad logo-img site-logo-img"
                        src="<?php bloginfo('template_directory'); ?>/images/logo_new.svg"
                        alt="Anatol Equipment Manufacturing Co. - Screen Printing Equipment" width="200"
                        height="40"></a></div>
            <div class="copytext">
                <?php _e('?? 2018', 'anatol'); ?>-<?php echo date('Y'); ?>
                <?php _e('Anatol Equipment Manufacturing Co. All Rights Reserved.', 'anatol'); ?>
            </div>
            <ul class="policy-terms">
                <li class="policy-item"><a href="/privacy-policy/">Privacy Policy</a></li>
                <li class="policy-item"><a href="#">Terms of Service</a></li>
            </ul>
        </div>
    </div>
    </div>
    </div>

    <div id="moboverlay"></div>

    <!-- end main container -->
    <a id="scrollToTop" class="scroll-to-top-button" href="#"></a>
    <?php wp_footer(); ?>

    <script>
$(document).ready(function() {
    /*===== Sticky header======*/
    $(window).on('scroll', function(event) {
        var scroll = $(window).scrollTop();
        if (scroll < 200) {
            $(".header").removeClass("sticky");
        } else {
            $(".header").addClass("sticky");
        }
    });
});
    </script>


    <div class="popupp" style=""></div>

    <?php get_template_part('templates/forms/get-a-quote-forms'); ?>
    <?php get_template_part('templates/forms/subscribe-us-forms'); ?>

    <div id="succes_message">Your message was sent successfully. Thanks</div>


    <script>
function yesnoCheck(that) {
    if (that.value == "United States") {
        document.getElementById("ifYes").style.display = "block";
        document.getElementById("state_required").setAttribute("required", "");
        $('.usa_state').show();
    } else if (that.value == "Canada") {
        document.getElementById("ifYes").style.display = "block";
        $('.canadian_province').show();
        $('.usa_state').hide();
    } else {
        document.getElementById("ifYes").style.display = "none";
        document.getElementById("state_required").removeAttribute("required");
    }
}

function yesnoChecks(that) {
    if (that.value == "United States") {
        document.getElementById("ifYess").style.display = "block";
        document.getElementById("state_required").setAttribute("required", "");
        $('.usa_state').show();
    } else if (that.value == "Canada") {
        document.getElementById("ifYess").style.display = "block";
        $('.canadian_province').show();
        $('.usa_state').hide();
    } else {
        document.getElementById("ifYess").style.display = "none";
        document.getElementById("state_required").removeAttribute("required");

    }
}
    </script>
    <script defer src="https://www.google.com/recaptcha/api.js?render=6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db">
    </script>

    <script type="text/javascript">
$("#__vtigerWebForm.contactFormEbook").submit(function(e) {

    e.preventDefault();
    var form = $(this);
    var url = 'https://sale.anatol.com/modules/Webforms/capture.php';
    translate_kurul('#__vtigerWebForm.contactFormEbook');

    grecaptcha.ready(function() {
        grecaptcha.execute('6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db', {
            action: 'submit'
        }).then(function(token) {
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {
                    alert(data);
                }
            });
        });
    });
    $('.innerr').hide();
    $('.popupp').hide();
    //$('.download_click_btn .download_click').show();	
    setTimeout(() => {
        $('.download_click')[0].click();
    }, 1000);
});
$("#__vtigerWebForm.get_quote").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var url = 'https://sale.anatol.com/modules/Webforms/capture.php';
    translate_kurul('#__vtigerWebForm.get_quote');
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db', {
            action: 'submit'
        }).then(function(token) {
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {
                    alert(data);
                }
            });
        });
    });

    $('.innerr').hide();

    $('#succes_message').show(''),
        setTimeout(function() {
            $("#succes_message").hide('slow');

            $('.popupp').hide();
        }, 2000)
});

function translate_kurul(a) {
    let formm = document.querySelector(a);
    formm.firstname.value = url_slug(formm.firstname.value);
    formm.lastname.value = url_slug(formm.lastname.value);
}

function translate_kurul_sub(a) {
    let formm = document.querySelector(a);
    formm.firstname.value = url_slug(formm.firstname.value);
    formm.lastname.value = url_slug(formm.lastname.value);
}

function url_slug(s, opt) {
    s = String(s);
    opt = Object(opt);

    var defaults = {
        delimiter: " ",
        limit: undefined,
        lowercase: false,
        replacements: {},
        transliterate: true,
    };

    // Merge options
    for (var k in defaults) {
        if (!opt.hasOwnProperty(k)) {
            opt[k] = defaults[k];
        }
    }

    var char_map = {
        // Latin
        ??: "A",
        ??: "A",
        ??: "A",
        ??: "A",
        ??: "A",
        ??: "A",
        ??: "AE",
        ??: "C",
        ??: "E",
        ??: "E",
        ??: "E",
        ??: "E",
        ??: "I",
        ??: "I",
        ??: "I",
        ??: "I",
        ??: "D",
        ??: "N",
        ??: "O",
        ??: "O",
        ??: "O",
        ??: "O",
        ??: "O",
        ??: "O",
        ??: "O",
        ??: "U",
        ??: "U",
        ??: "U",
        ??: "U",
        ??: "U",
        ??: "Y",
        ??: "TH",
        ??: "ss",
        ??: "a",
        ??: "a",
        ??: "a",
        ??: "a",
        ??: "a",
        ??: "a",
        ??: "ae",
        ??: "c",
        ??: "e",
        ??: "e",
        ??: "e",
        ??: "e",
        ??: "i",
        ??: "i",
        ??: "i",
        ??: "i",
        ??: "d",
        ??: "n",
        ??: "o",
        ??: "o",
        ??: "o",
        ??: "o",
        ??: "o",
        ??: "o",
        ??: "o",
        ??: "u",
        ??: "u",
        ??: "u",
        ??: "u",
        ??: "u",
        ??: "y",
        ??: "th",
        ??: "y",

        // Latin symbols
        "??": "(c)",

        // Greek
        ??: "A",
        ??: "B",
        ??: "G",
        ??: "D",
        ??: "E",
        ??: "Z",
        ??: "H",
        ??: "8",
        ??: "I",
        ??: "K",
        ??: "L",
        ??: "M",
        ??: "N",
        ??: "3",
        ??: "O",
        ??: "P",
        ??: "R",
        ??: "S",
        ??: "T",
        ??: "Y",
        ??: "F",
        ??: "X",
        ??: "PS",
        ??: "W",
        ??: "A",
        ??: "E",
        ??: "I",
        ??: "O",
        ??: "Y",
        ??: "H",
        ??: "W",
        ??: "I",
        ??: "Y",
        ??: "a",
        ??: "b",
        ??: "g",
        ??: "d",
        ??: "e",
        ??: "z",
        ??: "h",
        ??: "8",
        ??: "i",
        ??: "k",
        ??: "l",
        ??: "m",
        ??: "n",
        ??: "3",
        ??: "o",
        ??: "p",
        ??: "r",
        ??: "s",
        ??: "t",
        ??: "y",
        ??: "f",
        ??: "x",
        ??: "ps",
        ??: "w",
        ??: "a",
        ??: "e",
        ??: "i",
        ??: "o",
        ??: "y",
        ??: "h",
        ??: "w",
        ??: "s",
        ??: "i",
        ??: "y",
        ??: "y",
        ??: "i",

        // Turkish
        ??: "S",
        ??: "I",
        ??: "C",
        ??: "U",
        ??: "O",
        ??: "G",
        ??: "s",
        ??: "i",
        ??: "c",
        ??: "u",
        ??: "o",
        ??: "g",

        // Russian
        ??: "A",
        ??: "B",
        ??: "V",
        ??: "G",
        ??: "D",
        ??: "E",
        ??: "Yo",
        ??: "Zh",
        ??: "Z",
        ??: "I",
        ??: "J",
        ??: "K",
        ??: "L",
        ??: "M",
        ??: "N",
        ??: "O",
        ??: "P",
        ??: "R",
        ??: "S",
        ??: "T",
        ??: "U",
        ??: "F",
        ??: "H",
        ??: "C",
        ??: "Ch",
        ??: "Sh",
        ??: "Sh",
        ??: "",
        ??: "Y",
        ??: "",
        ??: "E",
        ??: "Yu",
        ??: "Ya",
        ??: "a",
        ??: "b",
        ??: "v",
        ??: "g",
        ??: "d",
        ??: "e",
        ??: "yo",
        ??: "zh",
        ??: "z",
        ??: "i",
        ??: "y",
        ??: "k",
        ??: "l",
        ??: "m",
        ??: "n",
        ??: "o",
        ??: "p",
        ??: "r",
        ??: "s",
        ??: "t",
        ??: "u",
        ??: "f",
        ??: "h",
        ??: "ts",
        ??: "ch",
        ??: "sh",
        ??: "sh",
        ??: "",
        ??: "y",
        ??: "",
        ??: "e",
        ??: "yu",
        ??: "ya",

        // Ukrainian
        ??: "Ye",
        ??: "I",
        ??: "Yi",
        ??: "G",
        ??: "ye",
        ??: "i",
        ??: "yi",
        ??: "g",

        // Czech
        ??: "C",
        ??: "D",
        ??: "E",
        ??: "N",
        ??: "R",
        ??: "S",
        ??: "T",
        ??: "U",
        ??: "Z",
        ??: "c",
        ??: "d",
        ??: "e",
        ??: "n",
        ??: "r",
        ??: "s",
        ??: "t",
        ??: "u",
        ??: "z",

        // Polish
        ??: "A",
        ??: "C",
        ??: "e",
        ??: "L",
        ??: "N",
        ??: "o",
        ??: "S",
        ??: "Z",
        ??: "Z",
        ??: "a",
        ??: "c",
        ??: "e",
        ??: "l",
        ??: "n",
        ??: "o",
        ??: "s",
        ??: "z",
        ??: "z",

        // Latvian
        ??: "A",
        ??: "C",
        ??: "E",
        ??: "G",
        ??: "i",
        ??: "k",
        ??: "L",
        ??: "N",
        ??: "S",
        ??: "u",
        ??: "Z",
        ??: "a",
        ??: "c",
        ??: "e",
        ??: "g",
        ??: "i",
        ??: "k",
        ??: "l",
        ??: "n",
        ??: "s",
        ??: "u",
        ??: "z",
    };

    // Make custom replacements
    for (var k in opt.replacements) {
        s = s.replace(RegExp(k, "g"), opt.replacements[k]);
    }

    // Transliterate characters to ASCII
    if (opt.transliterate) {
        for (var k in char_map) {
            s = s.replace(RegExp(k, "g"), char_map[k]);
        }
    }

    // Replace non-alphanumeric characters with our delimiter
    var alnum = RegExp("[^a-z0-9]+", "ig");
    s = s.replace(alnum, opt.delimiter);

    // Remove duplicate delimiters
    s = s.replace(RegExp("[" + opt.delimiter + "]{2,}", "g"), opt.delimiter);

    // Truncate slug to max. characters
    s = s.substring(0, opt.limit);

    // Remove delimiter from ends
    s = s.replace(
        RegExp("(^" + opt.delimiter + "|" + opt.delimiter + "$)", "g"),
        ""
    );

    return opt.lowercase ? s.toLowerCase() : s;
}
    </script>

    <!--CHAT-->
    <!-- <script defer type='text/javascript' data-cfasync='false'>
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
            if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                var w = new PCWidget({
                    c: '06a77c40-853c-4008-894a-a95390ddfe15',
                    f: true
                });
                done = true;
            }
        };
    })();
        </script> -->
    <!--End CHAT-->
    </body>

    </html>