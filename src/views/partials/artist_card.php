<?php
require_once(PROJECT_ROOT_PATH . "/src/models/ArtistModel.class.php");

function artistCard ($id)
{
    $artist_model = new ArtistModel();
    $artist = $artist_model->getArtistByArtistId($id);
    $artist_name = $artist->name;
    $image_url = $artist->image_url;
    $value = $artist->id_artist;
    $html = <<< "EOT"
    <div class="artist-card" value="$value">
        <img src="$image_url">
        <p class="artist-name">$artist_name</p>
        <p class="card-type">Artist</p>
        <div class="edit-artist edit-btn"></div>
    </div> 
    EOT;

    echo($html);

}