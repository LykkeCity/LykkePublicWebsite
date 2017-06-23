var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubeIframeAPIReady() {
    initPlayer();
}

function onPlayerReady(event) {
    var playButton = document.getElementById("btn_video");
    playButton.addEventListener("click", function () {
        player.playVideo();
        $('.landing--video').addClass('video_played');
    });
}

function initPlayer() {
    player = new YT.Player('player', {
        //videoId : 'h5T2gRGcMso' - home,
        //videoId : 'Le3b6km81uc' - corp,
        videoId: $('#player').data('video-id'),
        height: '390',
        width: '640',
        events: {
            'onReady': onPlayerReady
        }
    });
}

setTimeout(initPlayer, 3000);