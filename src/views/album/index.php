<?php
require_once(__DIR__ . "/../../../public/partials/side_bar.php");
require_once(__DIR__ . "/../../../public/partials/icon.php");
require_once(__DIR__ . "/../../../public/partials/album_container.php");
require_once(__DIR__ . "/../../../public/partials/font.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/album.css">
    <link rel="stylesheet" href="../../../public/css/icon.css">

    <?php echo Font(); ?>
    
    <title>Document</title>
</head>
<body>
    <div class="whole-wrapper">
         <?php echo SideBar();?>
        <div class="page-wrapper">
            <?php echo icon("vieri"); ?>
            <h1 style="margin-top: 5vw;">Good morning, vieri</h1>
            <?php echo AlbumContainer("../../../public/image/senja.jpg", "Senja", "Maliq");?>
        </div>
    </div>
</body>
</html>
