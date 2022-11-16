$(document).ready(function() {
    //video on homepage
    $('#video').click(function() {
        this.paused ? this.play() : this.pause();
    });

        // var fillVideo = function(vid){
        //     var video = $(vid);
        //     var actualRatio = vid.videoWidth/vid.videoHeight;
        //     var targetRatio = video.width()/video.height();
        //     var adjustmentRatio = targetRatio/actualRatio;
        //     var scale = actualRatio < targetRatio ? targetRatio / actualRatio : actualRatio / targetRatio;
        //     video.css('-webkit-transform','scale(' + scale  + ')');
        //     video.css('-webkit-transform','scale(' + scale  + ')');
        //     video.css('-moz-transform','scale(' + scale  + ')');
        //     video.css('-ms-transform','scale(' + scale  + ')');
        //     video.css('-o-transform','scale(' + scale  + ')');
        //     video.css('transform','scale(' + scale  + ')');
        // };

        // var vid = document.getElementsByTagName("video")[0];
        // fillVideo(vid);
    //end video on homepage
});