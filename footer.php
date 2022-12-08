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
        <?php get_template_part('templates/forms/get-a-quote-forms'); ?>
        <?php get_template_part('templates/forms/subscribe-us-forms'); ?>
    </div>
    </div>
    </div>

    <div id="moboverlay"></div>

    <!-- end main container -->
    <a id="scrollToTop" class="scroll-to-top-button" href="#"></a>
    <?php wp_footer(); ?>

    <!-- INIT YOUTUBE VIDEOS -->
    <script src="<?php echo get_template_directory_uri();?>/js/initVideo.js"></script>

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
    <!-- <script defer src="https://www.google.com/recaptcha/api.js?render=6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db"></script> -->

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
        À: "A",
        Á: "A",
        Â: "A",
        Ã: "A",
        Ä: "A",
        Å: "A",
        Æ: "AE",
        Ç: "C",
        È: "E",
        É: "E",
        Ê: "E",
        Ë: "E",
        Ì: "I",
        Í: "I",
        Î: "I",
        Ï: "I",
        Ð: "D",
        Ñ: "N",
        Ò: "O",
        Ó: "O",
        Ô: "O",
        Õ: "O",
        Ö: "O",
        Ő: "O",
        Ø: "O",
        Ù: "U",
        Ú: "U",
        Û: "U",
        Ü: "U",
        Ű: "U",
        Ý: "Y",
        Þ: "TH",
        ß: "ss",
        à: "a",
        á: "a",
        â: "a",
        ã: "a",
        ä: "a",
        å: "a",
        æ: "ae",
        ç: "c",
        è: "e",
        é: "e",
        ê: "e",
        ë: "e",
        ì: "i",
        í: "i",
        î: "i",
        ï: "i",
        ð: "d",
        ñ: "n",
        ò: "o",
        ó: "o",
        ô: "o",
        õ: "o",
        ö: "o",
        ő: "o",
        ø: "o",
        ù: "u",
        ú: "u",
        û: "u",
        ü: "u",
        ű: "u",
        ý: "y",
        þ: "th",
        ÿ: "y",

        // Latin symbols
        "©": "(c)",

        // Greek
        Α: "A",
        Β: "B",
        Γ: "G",
        Δ: "D",
        Ε: "E",
        Ζ: "Z",
        Η: "H",
        Θ: "8",
        Ι: "I",
        Κ: "K",
        Λ: "L",
        Μ: "M",
        Ν: "N",
        Ξ: "3",
        Ο: "O",
        Π: "P",
        Ρ: "R",
        Σ: "S",
        Τ: "T",
        Υ: "Y",
        Φ: "F",
        Χ: "X",
        Ψ: "PS",
        Ω: "W",
        Ά: "A",
        Έ: "E",
        Ί: "I",
        Ό: "O",
        Ύ: "Y",
        Ή: "H",
        Ώ: "W",
        Ϊ: "I",
        Ϋ: "Y",
        α: "a",
        β: "b",
        γ: "g",
        δ: "d",
        ε: "e",
        ζ: "z",
        η: "h",
        θ: "8",
        ι: "i",
        κ: "k",
        λ: "l",
        μ: "m",
        ν: "n",
        ξ: "3",
        ο: "o",
        π: "p",
        ρ: "r",
        σ: "s",
        τ: "t",
        υ: "y",
        φ: "f",
        χ: "x",
        ψ: "ps",
        ω: "w",
        ά: "a",
        έ: "e",
        ί: "i",
        ό: "o",
        ύ: "y",
        ή: "h",
        ώ: "w",
        ς: "s",
        ϊ: "i",
        ΰ: "y",
        ϋ: "y",
        ΐ: "i",

        // Turkish
        Ş: "S",
        İ: "I",
        Ç: "C",
        Ü: "U",
        Ö: "O",
        Ğ: "G",
        ş: "s",
        ı: "i",
        ç: "c",
        ü: "u",
        ö: "o",
        ğ: "g",

        // Russian
        А: "A",
        Б: "B",
        В: "V",
        Г: "G",
        Д: "D",
        Е: "E",
        Ё: "Yo",
        Ж: "Zh",
        З: "Z",
        И: "I",
        Й: "J",
        К: "K",
        Л: "L",
        М: "M",
        Н: "N",
        О: "O",
        П: "P",
        Р: "R",
        С: "S",
        Т: "T",
        У: "U",
        Ф: "F",
        Х: "H",
        Ц: "C",
        Ч: "Ch",
        Ш: "Sh",
        Щ: "Sh",
        Ъ: "",
        Ы: "Y",
        Ь: "",
        Э: "E",
        Ю: "Yu",
        Я: "Ya",
        а: "a",
        б: "b",
        в: "v",
        г: "g",
        д: "d",
        е: "e",
        ё: "yo",
        ж: "zh",
        з: "z",
        и: "i",
        й: "y",
        к: "k",
        л: "l",
        м: "m",
        н: "n",
        о: "o",
        п: "p",
        р: "r",
        с: "s",
        т: "t",
        у: "u",
        ф: "f",
        х: "h",
        ц: "ts",
        ч: "ch",
        ш: "sh",
        щ: "sh",
        ъ: "",
        ы: "y",
        ь: "",
        э: "e",
        ю: "yu",
        я: "ya",

        // Ukrainian
        Є: "Ye",
        І: "I",
        Ї: "Yi",
        Ґ: "G",
        є: "ye",
        і: "i",
        ї: "yi",
        ґ: "g",

        // Czech
        Č: "C",
        Ď: "D",
        Ě: "E",
        Ň: "N",
        Ř: "R",
        Š: "S",
        Ť: "T",
        Ů: "U",
        Ž: "Z",
        č: "c",
        ď: "d",
        ě: "e",
        ň: "n",
        ř: "r",
        š: "s",
        ť: "t",
        ů: "u",
        ž: "z",

        // Polish
        Ą: "A",
        Ć: "C",
        Ę: "e",
        Ł: "L",
        Ń: "N",
        Ó: "o",
        Ś: "S",
        Ź: "Z",
        Ż: "Z",
        ą: "a",
        ć: "c",
        ę: "e",
        ł: "l",
        ń: "n",
        ó: "o",
        ś: "s",
        ź: "z",
        ż: "z",

        // Latvian
        Ā: "A",
        Č: "C",
        Ē: "E",
        Ģ: "G",
        Ī: "i",
        Ķ: "k",
        Ļ: "L",
        Ņ: "N",
        Š: "S",
        Ū: "u",
        Ž: "Z",
        ā: "a",
        č: "c",
        ē: "e",
        ģ: "g",
        ī: "i",
        ķ: "k",
        ļ: "l",
        ņ: "n",
        š: "s",
        ū: "u",
        ž: "z",
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