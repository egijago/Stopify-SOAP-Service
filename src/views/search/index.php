<?php
require_once(__DIR__ . "/../../../public/partials/side_bar.php");
require_once(__DIR__ . "/../../../public/partials/album_input_dialog.php");
require_once(__DIR__ . "/../../../public/partials/font.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo Font(); ?>
  <title>Search - Stopify</title>
</head>
<body>
  <?php echo AlbumInputDialog();?>
  <div class="whole-wrapper">
    <?php echo SideBar(); ?>
    <div class="page-wrapper">
      <div class="padding" style="height:10px;">
      </div>
      <div class="search-section">
        <input class="search-bar" type="text" placeholder="What do you want to listen to?">
        <div class="search-settings">
          <button class=search-by-filter onclick="handler()">
            Artist
          </button>
          <button class=search-by-filter>
            Song
          </button>
          <div class="setting-button" >
            <img src="../../../public/assets/svg/SettingButton.svg" width="25px">
          </div>
        </div>
      </div>


      <div class="browse-section">
        <p class="section-title"> Browse All </p>
        <hr>
        <div class="genres">
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
          </div>  
          <div class="genre-card">
              <p>RnB</p>
              <img src="Rb-music.jpg">
          </div>    
      </div>
      <div class="artists-section">
        <p class="section-title"> Artists </p>
        <hr>
        <div class="artist-result">
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
          </div> 
          <div class="artist-card">
              <img src="Rb-music.jpg">
              <p class="artist-name">John Doe</p>
              <p class="card-type">Artist</p>
          </div> 
      </div>
    </div>
    <hr>
  </div>
</body>

</html>
<script>
document.getElementsByClassName("dialog-wrapper")[0].addEventListener(onclik)

  function closeDialog() {
    document.getElementsByClassName("dialog-wrapper")[0].style.display = "none";
  }
</script>