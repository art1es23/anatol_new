$(document).ready(function() {
    var swiper = {};
    
    var swiperAttr = {
        direction: 'vertical',
        slidesPerView: 1,
        mousewheel: true,
        // loop: true,
        speed: 900,
        parallax: true, 
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    };

    $screenWidth = $( window ).width();
    if ( $screenWidth > 654 ) {
        swiper = new Swiper('.swiper-container', swiperAttr);
        desktopVideo();
    }
    changeParallaxAttr();

    //differrent design for desktop and mobile
    $( window ).resize(function() {
        $screenWidth = $( window ).width();
        if ( $screenWidth > 654 ) {  //for desktop
            if ( isEmpty(swiper) ) {
                swiper = new Swiper('.swiper-container', swiperAttr);
                desktopVideo();
            }
        }
        else {  //for mobile
            if ( !isEmpty(swiper) ) {
                swiper.destroy( false, true );
                swiper = {};
                $('.media-container').attr('style', '');
                pauseAllVideo();
            }
        }
        changeParallaxAttr();
    });

    //check object for empty
    function isEmpty( obj ) {
        for (var prop in obj) {
            if ( obj.hasOwnProperty(prop) )
                return false
        }
        return true;
    }

    //set true value for attribute data-swiper-parallax in different window height
    function changeParallaxAttr() {
        $screenHeight = $( window ).height();
        if ( $screenHeight < 600 ) {
            $(".media-container").attr("data-swiper-parallax", $screenHeight);
        }
    }

    //video
        //video in slider
        function desktopVideo() {
            //play first video after page load
            $activeSlide = $('.swiper-slide-active');
            if ( $activeSlide.has('.video')[0] ) {
                $activeSlide.children('.media-container').children('.video')[0].play();
            }

            //play(pause) video after change slide
            if ( !isEmpty(swiper) ) {
                swiper.on('slideChangeTransitionEnd', function() {
                    $activeSlide = $('.swiper-slide-active');
                    $otherSlides = $('.swiper-slide:not(.swiper-slide-active)');
        
                    $otherSlides.each( function() {
                        $video = $(this).children('.media-container').children('.video')[0];
                        if ( $video ) {
                            $video.pause();
                        }
                    });
        
                    if ( $activeSlide.has('.video')[0] ) {
                        $activeSlide.children('.media-container').children('.video')[0].play();
                    }
                });
            }
        }

        //video not in slider
        function mobileVideo() {
            $('.media-container').has('.video').click(function() {
                $mediaContainer = $(this);
                $controls = $mediaContainer.children(".controls");
                $video = $mediaContainer.children(".video");
                $video = $video[0];
        
                if ( $video.paused ) {
                    $video.play();
                    $controls.toggle();
                }
                else {
                    $video.pause();
                    $controls.toggle();
                }
            });
        }
        mobileVideo();

        function pauseAllVideo() {
            $controls = $(".media-container .controls");
            $controls.css("display", "block");

            $(".video").each( function() {
                if ( $(this)[0].play ) {
                    $(this)[0].pause();
                }
            });

        }
    //end video

});