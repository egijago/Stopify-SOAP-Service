<?php 
require_once(PROJECT_ROOT_PATH . "/src/models/GenreModel.class.php");
function genreCard($id)
{
    $genre_model = new GenreModel();
    $genre = $genre_model->getGenreByGenreId($id);
    $genre_name = $genre->name;
    $image_url = $genre->image_url;
    $value = $genre->id_genre;
    $color = $genre->color;
    $html = <<< "EOT"
        <div class="genre-card" value="$value" style="background-color:$color;">
            <p>$genre_name</p>
            <img src="$image_url">
            <div class="edit-genre edit-btn"></div>
        </div>
    EOT;

    echo($html);
}