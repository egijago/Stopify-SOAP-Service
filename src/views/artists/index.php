<?php
require_once(PROJECT_ROOT_PATH . "/src/views/partials/side_bar.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/font.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/artist_input.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/artist_card.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/font.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/artist_input.js"></script>
    <?php echo Font(); ?>
    <title>Stopify - Artists</title>
</head>
<body>
  <div class="dialog-section"></div>
  <div class="whole-wrapper">
        <?php echo SideBar("Artists");?>
      <div class="page-wrapper" id="page-wrapper">
        <div class="artists-section">
          <div class="section-header">
            <p class="section-title"> Artists </p>  
            <div class="add-artist add-btn">
            </div>
          </div>
          <hr>
          <div class="artist-result" id="123">
            <?php artistCard(1); ?>
            <?php artistCard(2); ?>
            <?php artistCard(3); ?>
            <?php artistCard(4); ?>
            <?php artistCard(5); ?>
          </div>
        </div>
    </div>
  </div>
</body>
</html>
