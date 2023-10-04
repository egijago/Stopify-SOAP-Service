<?php
require_once(__DIR__ . "/../../../public/partials/side_bar.php");
require_once(__DIR__ . "/../../../public/partials/song_item.php");
require_once(__DIR__ . "/../../../public/partials/icon.php");
require_once(__DIR__ . "/../../../public/partials/font.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/music.css">
    <link rel="stylesheet" href="../../../public/css/icon.css">

    <?php echo Font(); ?>

    <title><?php echo $this->params["id"]?></title>
</head>
<body>
    <div class="whole-wrapper">
         <?php echo SideBar();?>
        <div class="page-wrapper">
            <?php echo icon("vieri"); ?>
            <h1 style="margin-top: 5vw;">Good morning, vieri</h1>
            <div class="play-song-container">
                <img src="../../../public/image/senja.jpg" alt="">
                <div class="play-song-detail">
                    <h3>Album</h3>
                    <h4>judul</h4>
                    <br>
                    <p>Genre</p>
                    <p>Pencipta</p>
                </div>
            </div>
            <div class="audio-player">
                <audio controls>
                    <source src="../../../public/song/1.mp3" type="audio/mpeg">
                </audio>
                
            </div>
        </div>
    </div>
</body>
</html>
