<?php
require_once(__DIR__ . "/../../../public/partials/side_bar.php");
require_once(__DIR__ . "/../../../public/partials/song_item.php");
require_once(__DIR__ . "/../../../public/partials/icon.php");
require_once(__DIR__ . "/../../../public/partials/font.php");
?>

<?php
    if(isset($_SESSION))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/music.css">
    <link rel="stylesheet" href="css/icon.css">

    <?php echo Font(); ?>

    <title><?php echo $this->params["id"]?></title>
    
</head>
<body>
    <div class="whole-wrapper">
         <?php echo SideBar();?>
        <div class="page-wrapper">
            <?php echo icon($_SESSION["username"]); ?>
            <h1 style="margin-top: 5vw;">Good morning, <?php echo $_SESSION["username"]?></h1>
            <input type="hidden" id="id_user" value="<?php echo $_SESSION["id_user"] ?>">
            <div class="play-song-container">
            </div>
            <div class="audio-player">
            </div>
        </div>
    </div>
</body>
</html>
<script src="js/music.js"></script>