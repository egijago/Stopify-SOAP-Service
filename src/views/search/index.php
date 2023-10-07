<?php
    require_once(PROJECT_ROOT_PATH . "/src/views/partials/side_bar.php");
    require_once(PROJECT_ROOT_PATH . "/src/views/partials/album_input.php");
    require_once(PROJECT_ROOT_PATH . "/src/views/partials/font.php");
    require_once(PROJECT_ROOT_PATH . "/src/views/partials/genre_card.php");
    require_once(PROJECT_ROOT_PATH . "/src/views/partials/artist_card.php");
    require_once(PROJECT_ROOT_PATH . "/src/views/partials/search_util.php");

    require_once(PROJECT_ROOT_PATH . "/src/views/partials/album_input.php");



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo Font(); ?>
  <title>Search - Stopify</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/table.css">
  <script src="js/music_input.js"></script>
  <script src="js/album_input.js"></script>
  <script src="js/artist_input.js"></script>
  <script src="js/genre_input.js"></script>

  <script src="js/search.js"></script>
  

</head>
<body>
  <div class="dialog-section"></div>
  <div class="whole-wrapper"> 
    <?php echo SideBar(); ?>
    <div class="page-wrapper">
      <div class="padding" style="height:10px;">
      </div>
      <div class="search-section">
        <input class="search-bar" type="text" placeholder="What do you want to listen to?">
        <div class="search-settings">
          <?php searchBy();?>
          <?php yearFilter();?>
          <?php genreFilter();?>
          <?php sortBy();?>
        </div>
      </div>

      <div class="search-result">
      </div>
      <div class="genre-section">
        <div class="section-header">
          <p class="section-title">Genres</p>        
          <div class="add-genre add-btn"></div>
        </div>
        <hr>
        <div class="genres">
        <?php genreCard(1); ?>
        <?php genreCard(2); ?>
        <?php genreCard(3); ?>
        <?php genreCard(4); ?>
        <?php genreCard(5); ?>
      </div>
      <div class="artists-section">
        <div class="section-header">
          <p class="section-title"> Artists </p>  
          <div class="add-artist add-btn"></div>
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
</body>
</html>
