$(document).ready(function() {
    //video
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
    //end video
});