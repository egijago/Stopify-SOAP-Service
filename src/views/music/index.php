<?php
require_once(PROJECT_ROOT_PATH . "/src/views/partials/side_bar.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/song_item.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/icon.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/font.php");
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
            <?php echo icon($_SESSION["username"]); ?>
            <h1 style="margin-top: 5vw;">Good morning, <?php echo $_SESSION["username"]?></h1>
            <div class="play-song-container">
            </div>
            <div class="audio-player">
            </div>
        </div>
    </div>
</body>
</html>
<script src="/public/js/music.js"></script>