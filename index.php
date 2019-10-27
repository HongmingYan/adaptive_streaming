<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <title>HLS Streaming</title>
    </head>
    <body background="images/textured_stripes.png">
        <div align="center">
        <h1>HLS Streaming</h1>
        <br><br><br><br>
        <!--
        <a href="videos/demo.mp4" download>Demo MP4</a>
        <br><br>
        <video controls>
            <source src="segmented_videos/demo/master.m3u8" type="video/mp4">
        </video>
        -->
        <br><br>
        <?php
            $dir    = 'seg_files';
            $video_files = [];
            foreach(glob($dir.'/*') as $file) {
                foreach(glob($file.'/*') as $seg_file) {
                    $file_parts = pathinfo($seg_file);
                    if ($file_parts['extension'] == "m3u8"){
                        echo "seg_file $seg_file";
                        echo "<br>";
                        $ext = array_pop(explode('/', $seg_file));
                        if($ext == "master.m3u8") {
                            echo("ext $ext<br>");
                            echo "<video controls>";
                            echo "<source src=". $seg_file ." type='video/mp4'>";
                            echo "</video><br/>";
                            echo "<br>";
                        }
                    }
                }
            }
        ?>
        <br><br><br><br>
        <br><br><br><br>
        </div>
    </body>
</html>

