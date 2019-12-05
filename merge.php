<!DOCTYPE html>
<html>
    <body>
        <!-- <video loop autoplay controls="true" id="myVideo" width="400" height="200" src="//BigBuck.mp4" type="video/mp4"></video> -->
        <div align=center>
            <video controls="true" id="mp4_vid" width="320" height="176"  >
                <source src="./videos/bbb_sf_1080p_60fps.mp4" type="video/mp4"> 
                Your browser does not support HTML5 video.
            </video>
            <p>HTML5 mp4 video<p>
            <video controls="true" id="adap_str_vid" width="1920" height="1080"  >
                <source src="seg_files/bbb_sf_1080p_60fps/master.m3u8" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <p>HLS Adaptive Streaming video</p>
        </div>
        <script>
            //
            function init_video(video_name)
            {
                var video = document.getElementById(video_name);
                var array = [[,],[,]];
                var observer = false;

                video.addEventListener("pause", function(e){
                    console.log("Video Paused at  " + video.currentTime);
                    //alert("video paused")
                });

                video.addEventListener("ended", function() {
                    //alert("The video has ended");
                    if(video.ended) {
                        console.table(array);
                    }
                });
                //console.log( Date.now())

                video.addEventListener("play", function(e) {
                    //console.log("Video Play - Enter  ");
                    //alert("video playing")
                    if(!observer) {
                        var startTime = 0.0;
                        //console.log("Video Played at  " + video.currentTime);
                        var checkInterval = 500
                        var lastPlayPos = 0
                        var currentPlayPos = 0
                        var buffEnd1;
                        setInterval(checkBuffering, checkInterval)
                        if(video.played) {
                            startTime = Date.now()
                            //console.log(startTime)
                        }
                        //
                        function checkBuffering() {
                            if(video.buffered.length>0) {
                                var buffEnd = video.buffered.end(0);
                                currentPlayPos = video.currentTime
                                buffEnd1 = buffEnd;
                                lastPlayPos = currentPlayPos;
                                console.log((Date.now() - startTime) / 1000 + ", " + buffEnd1 + ", "+ lastPlayPos );
                                array.push([lastPlayPos, buffEnd1]);
                            }
                        }
                    }
                    //console.log("Play-End");
                    observer = true;
                });
            }
            //
            function init_videos() {
                var videos = ["mp4_vid", "adap_str_vid"]
                for(var i = 0; i < videos.length; i++) 
                    init_video(videos[i])
            }
            init_videos();
        </script>
    </body>
</html>

