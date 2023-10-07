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
    <link rel="stylesheet" href="../../../public/css/pagination.css">
    <link rel="stylesheet" href="../../../public/css/song.css">
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
            <h3>Nama Album</h3>
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
            <div class="container-pagination" id="container-pagination">
            </div>
            <p>Page <span id="current-page">1</span> of <span id="max-page"></span></p>
            <div class="pagination-item">
                <img src="../../../public/assets/icon_pagination/left.png" alt="left" id="left">
                <img src="../../../public/assets/icon_pagination/right.png" alt="right" id="right">
            </div>
        </div>
    </div>
</body>
</html>
<script src="/public/js/albums.js"></script>
