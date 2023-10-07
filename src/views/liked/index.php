<?php
require_once(__DIR__ . "/../../../public/partials/side_bar.php");
require_once(__DIR__ . "/../../../public/partials/song_item.php");
require_once(__DIR__ . "/../../../public/partials/icon.php");
require_once(__DIR__ . "/../../../public/partials/font.php");
require_once(__DIR__ . "/../../../public/partials/table.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UFT-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/icon.css">
        <link rel="stylesheet" href="css/liked.css">
        <link rel="stylesheet" href="css/table.css">
        <link rel="stylesheet" href="css/pagination.css">

        <?php echo Font(); ?>
        <title>Stopify</title>
    </head>
    <body>
        <div class="whole-wrapper">
            <?php echo SideBar(); ?>
            <div class="page-wrapper">
                <?php echo icon($_SESSION["username"]); ?>
                <input type="hidden" id="id_user" value="<?php echo $_SESSION["id_user"] ?>">
                <div class="liked-detail">
                    <img src="image/senja.jpg">
                    <div class="liked-detail-text">
                        <h1>PLAYLIST</h1>
                        <h2>Liked Songs</h1>
                    </div>
                </div>
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
                <div class="table-container" id="container-pagination"></div>
                
                <div class="pagination-item">
                    <p>Page <span id="current-page">1</span> of <span id="max-page"></span></p>
                    <img src="assets/icon_pagination/left.png" alt="left" id="left">
                    <img src="assets/icon_pagination/right.png" alt="right" id="right">
                </div>

            </div>
        </div>
    </div>
    </body>
</html>
<script src="js/liked.js"></script>