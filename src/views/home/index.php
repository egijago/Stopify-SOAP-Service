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
    <link rel="stylesheet" href="../../../public/css/home.css">
    <link rel="stylesheet" href="../../../public/css/icon.css">
    <link rel="stylesheet" href="../../../public/css/song.css">

    <?php echo Font(); ?>
    <title>Document</title>
</head>
<body>
    <div class="whole-wrapper">
        <?php echo SideBar();?>
        <div class="page-wrapper">
            <?php echo icon("vieri"); ?>
            <h1 style="margin-top: 5vw;">Good morning, vieri</h1>
            <br>
            <h1>Recommended for you</h1>
            <div class="recommended-container">
                <div class="top-song-first">
                    <?php echo big("../../../public/image/senja.jpg", "Senja", "Maliq");?>
                </div>
                <div class="top-song-second">
                    <?php echo long("../../../public/image/senja.jpg", "Senja", "Maliq");?>
                    <?php echo long("../../../public/image/senja.jpg", "Senja", "Maliq");?>
                    <?php echo long("../../../public/image/senja.jpg", "Senja", "Maliq");?>
                    <?php echo long("../../../public/image/senja.jpg", "Senja", "Maliq");?>
                </div>
            </div>
            <h3>New Realase Song</h3>
            <div class="new-song">
                <?php echo medium("../../../public/image/senja.jpg","Senja","Maliq") ?>
                <?php echo medium("../../../public/image/senja.jpg","Senja","Maliq") ?>
                <?php echo medium("../../../public/image/senja.jpg","Senja","Maliq") ?>
                <?php echo medium("../../../public/image/senja.jpg","Senja","Maliq") ?>
            </div>
        </div>
    </div>
</body>
</html>
