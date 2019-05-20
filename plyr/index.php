<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>A Simple Player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://unpkg.com/plyr@3/dist/plyr.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <video controls crossorigin playsinline poster="https://bitdash-a.akamaihd.net/content/sintel/poster.png">
            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">
            <source src="http://stream.b2mwap.com:8080/m3ugen/segsrc/mp4/chayachobi/test-720.mp4" type='video/mp4' size="720">
            <source src="http://stream.b2mwap.com:8080/m3ugen/segsrc/mp4/chayachobi/Ajke_Ami_Sarabela-Rokte_Veja_Bangladesh_L-576.mp4" type='video/mp4' size="576">
        </video>
    </div>

    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.4/plyr.js"></script> -->
    <script src="plyr.js"></script>
    <script src="https://cdn.rawgit.com/video-dev/hls.js/18bb552/dist/hls.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // const source = 'http://210.4.66.11:8080/m3ugen/segsrc/mp4/chayachobi/test.mp4';
            // const source = 'https://d2zihajmogu5jn.cloudfront.net/bipbop-advanced/bipbop_16x9_variant.m3u8';
            var source = 'http://stream.b2mwap.com:8080/m3ugen/segsrc/mp4/chayachobi/test.mp4';
            const video = document.querySelector('video');

            $("source").select(function() {
                alert("Handler for .change() called.");
            });

            const controls = [
                'play-large', // The large play button in the center
                'restart', // Restart playback
                'rewind', // Rewind by the seek time (default 10 seconds)
                'play', // Play/pause playback
                'fast-forward', // Fast forward by the seek time (default 10 seconds)
                'progress', // The progress bar and scrubber for playback and buffering
                'current-time', // The current time of playback
                'duration', // The full duration of the media
                'volume', // Volume control
                'captions', // Toggle captions
                'settings', // Settings menu
                'fullscreen' // Toggle fullscreen
            ];

            const player = new Plyr(video, {
                controls
            });

            // player.source = {
            //     type: 'video',
            //     sources: [{
            //         src: 'http://stream.b2mwap.com:8080/m3ugen/segsrc/mp4/chayachobi/test.mp4',
            //         type: 'video/mp4',
            //         size: 360,
            //     }, {
            //         src: 'http://stream.b2mwap.com:8080/m3ugen/segsrc/mp4/chayachobi/Ajke_Ami_Sarabela-Rokte_Veja_Bangladesh_L.mp4',
            //         type: 'video/mp4',
            //         size: 720,
            //     }, ],
            // };

            // player.on('qualitychange', event => {
            //     source = '';
            //     const instance = event.detail.plyr;
            //     var quality = instance.quality;
            //     console.log(quality);
            //     play_video(source);
            // });

            function play_video(source) {
                if (!Hls.isSupported()) {
                    video.src = source;
                    console.log('isSupported')
                } else {
                    const hls = new Hls();
                    hls.loadSource(source);
                    hls.attachMedia(video);

                    window.hls = hls;

                    // Handle changing captions
                    player.on('languagechange', () => {
                        setTimeout(() => hls.subtitleTrack = player.currentTrack, 50);
                    });
                }

                window.player = player;
            }

            play_video(source);
        });
    </script>
</body>

</html>