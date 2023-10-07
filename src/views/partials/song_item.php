<?php

function big($img_url, $song_title, $artist){
    $html=<<<EOT
        <img class="first" src="$img_url" />
        <h2>$song_title</h2>
        <p>$artist</p>
EOT;
    return $html;
}
function long($img_url, $song_title, $artist){
    $html = <<<EOT
    <div class="song-item-long">
        <img class="second" src="$img_url"/>
        <div class="song-item-container">
            <h4>$song_title</h4>
            <p>$artist</p>
        </div>
    </div>
EOT;
  return $html;
}

function medium($img_url, $song_title, $artist){
    $html=<<<EOT
    <div class="song-item-medium">
        <img class="new-song" src=$img_url />
        <h3>$song_title</h3>
        <p>$artist</p>
    </div>
EOT;
    return $html;

}