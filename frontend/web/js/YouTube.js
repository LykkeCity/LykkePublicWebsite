var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        videoId : $('#player').data('video-id'),
        height: '390',
        width: '640',
        events: {
            'onReady': onPlayerReady(),
        }
    });

}

function onPlayerReady(event) {
    var playButton = document.getElementById("btn_video");
    playButton.addEventListener("click", function(event) {
        if(typeof player.playVideo == 'function')
        {
            player.playVideo();
        }
        $('.landing--video').addClass('video_played');
        event.preventDefault();
    });

}