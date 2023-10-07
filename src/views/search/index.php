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
  <script src="js/music_input.js"></script>
  <script src="js/search.js"></script>

</head>
<body>
  <div class="whole-wrapper">
    <?php albumInput([]);?>
    <?php echo SideBar(); ?>
    <div class="page-wrapper">
      <div class="padding" style="height:10px;">
      </div>
      <div class="search-section">
        <input class="search-bar" type="text" placeholder="What do you want to listen to?">
        <div class="search-settings">
          <select id="search-by" class="search-by-filter">
            <option value="title" selected>Search-by: title</option>
            <option value="artist">Search-by: artist</option>
          </select>
          <?php yearFilter();?>
          <?php genreFilter();?>
          <?php sortBy();?>
        </div>
      </div>


      <div class="browse-section">
        <p class="section-title"> Browse All </p>
        <hr>
        <div class="genres">
        <?php genreCard(65); ?>
        <?php genreCard(66); ?>
        <?php genreCard(67); ?>
        <?php genreCard(68); ?>
        <?php genreCard(69); ?>
          <!-- <div class="genre-card">
              <p>RnB</p>
              <img src="Rb-music.jpg">
          </div>
          <div class="genre-card">
              <p>RnB</p>
              <img src="Rb-music.jpg">
          </div>
          <div class="genre-card">
              <p>RnB</p>
              <img src="Rb-music.jpg">
          </div>          
          <div class="genre-card">
              <p>RnB</p>
              <img src="Rb-music.jpg">
          </div>  
          <div class="genre-card">
              <p>RnB</p>
              <img src="Rb-music.jpg">
          </div>  
          <div class="genre-card">
              <p>RnB</p>
              <img src="Rb-music.jpg">
          </div>  
          <div class="genre-card">
              <p>RnB</p>
              <img src="Rb-music.jpg">
          </div>     -->
    
      </div>
      <div class="artists-section">
        <p class="section-title"> Artists </p>
        <hr>
        <div class="artist-result" id="123">
            <?php artistCard(41); ?>
            <?php artistCard(42); ?>
            <?php artistCard(43); ?>
            <?php artistCard(44); ?>
            <?php artistCard(45); ?>
    
          <!--<div class="artist-card">
              <img src="Rb-music.jpg">
              <p class="artist-name">John Doe</p>
              <p class="card-type">Artist</p>
          </div> 
          <div class="artist-card">
              <img src="Rb-music.jpg">
              <p class="artist-name">John Doe</p>
              <p class="card-type">Artist</p>
          </div> 
          <div class="artist-card">
              <img src="Rb-music.jpg">
              <p class="artist-name">John Doe</p>
              <p class="card-type">Artist</p>
          </div> 
          <div class="artist-card">
              <img src="Rb-music.jpg">
              <p class="artist-name">John Doe</p>
              <p class="card-type">Artist</p>
          </div> 
          <div class="artist-card">
              <img src="Rb-music.jpg">
              <p class="artist-name">John Doe</p>
              <p class="card-type">Artist</p>
          </div> 
          <div class="artist-card">
              <img src="Rb-music.jpg">
              <p class="artist-name">John Doe</p>
              <p class="card-type">Artist</p>
          </div> -->
      </div>
    </div>
    <hr>
  </div>
  <button id="xhr" style="background-color:yellow; width: 100px; height:100px;">
  </button>
</body>
</html>
<script>
  document.getElementById("foo").addEventListener("click", function() {
      xhr = new XMLHttpRequest();
      const method = "GET";
      const url = "/element/music-input";
      xhr.open(method, url, false);
      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            let div = document.createElement("div");
            div.innerHTML = xhr.responseText;
            document.body.prepend(div);
          } else {
            console.error("Request failed with response:", xhr.responseText);
          }
      };
    xhr.send();
  });
</script>