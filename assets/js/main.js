$(document).ready(function() {
    //menu and submenu
    
    //defines current page on menu and submenu
        var url = document.location.href;
        $.each($(".desktop-menu .nav-a"), function() {
            if (this.href == url) {
                $(this).addClass('current');
            };
        });

        $.each($(".header .right-submenu"), function() {
            if (this.href == url) {
                $(this).addClass('current');
                $('header .nav-a:nth-child(2)').addClass('current');
            };
        });
    //end defines current page on menu and submenu
    
    $('header .nav-a:nth-child(2)').hover(function() {
        $(this).addClass("active");
        if ( !$('header').hasClass("open-submenu") ) {
            $('header').toggleClass("open-submenu");
            $('.right-menu').toggleClass("active");
        }
    });

    //hide submenu
        $('header .right-menu').mouseleave( closeSubMenu );
        $('.main').click( closeSubMenu );

        function closeSubMenu() {
            if ( $('header').hasClass("open-submenu") ) {
                $('header').removeClass("open-submenu");
                $('.right-menu').removeClass("active");
                $('.nav-a').removeClass("active");
            }
        }
    //end hide submenu
    
    //no click on item "Переваги"
    $(".header .nav-a:nth-child(2)").click(function(event) {
        event.preventDefault();
    });
    

    //mobile menu
        $(".header .mobile-icon").click(function() {
            $(".header").toggleClass("open-mobile-menu");
        });
        
        $(".phone-menu .menu-item-has-children").click(function(event) {
            $(this).toggleClass("open");
            //$(this).children(".sub-menu").toggle();
        });

        $(".phone-menu .menu-item-has-children > a").click(function(event) {
            event.preventDefault();
        });
    //end mobile menu

    //end menu and submenu

    //end go top
        var goTop = function() {
            if ($(this).scrollTop() > 800) {
                $('.go-top').addClass('show');
            } else {
                $('.go-top').removeClass('show');
            }
            $(window).scroll(function() {
                if ($(this).scrollTop() > 800) {
                    $('.go-top').addClass('show');
                } else {
                    $('.go-top').removeClass('show');
                }
            });

            $('.go-top').on('click', function() {
                $("html, body").animate({scrollTop: 0}, 1000);
                return false;
            });
        };
        goTop();
    //go top button


});
