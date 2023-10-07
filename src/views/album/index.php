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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/album.css">
    <link rel="stylesheet" href="css/icon.css">
    <link rel="stylesheet" href="css/pagination.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/limit_page.css">

    <?php echo Font(); ?>
    
    <title>Document</title>
</head>
<body>
    <div class="whole-wrapper">
        <?php echo SideBar();?>
        <div class="page-wrapper">
            <?php echo icon($_SESSION["username"]); ?>
            <h1 style="margin-top: 5vw;">Good morning, <?php echo ($_SESSION["username"]) ?></h1>
            <?php echo AlbumContainer("image/senja.jpg", "Senja", "Maliq");?>
            <div class="limit-page">
                <p>Limit: </p>
                <select name="limit_page" id="limit">
                    <?php
                        for($i = 1; $i <= 10; $i++){
                            $res= $i * 5;
                            echo "<option value=$res>$res</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="container-pagination table-section" id="container-pagination"></div>
            <p>Page <span id="current-page">1</span> of <span id="max-page"></span></p>
            <div class="pagination-item">
                <img src="assets/icon_pagination/left.png" alt="left" id="left">
                <img src="assets/icon_pagination/right.png" alt="right" id="right">
            </div>
        </div>
    </div>
</body>
</html>
<script src="js/album.js"></script>
