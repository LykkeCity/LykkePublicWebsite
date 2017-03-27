var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        videoId : $('#player').data('video-id'),
        height: '390',
        width: '640',
        events: {
            'onReady': onPlayerReady()
        }
    });
}

function onPlayerReady(event) {
    var playButton = document.getElementById("btn_video");
    if ((playButton === null) || (playButton === undefined)) {
        return;
    }
    playButton.addEventListener("click", function (event) {
        if (typeof player.playVideo == 'function') {
            player.playVideo();
        } else {
            console.log(player)
        }
        $('.landing--video').addClass('video_played');
    });
}

$('#btn_video').click(function () {
    $('.landing--video').addClass('video_played');
});
