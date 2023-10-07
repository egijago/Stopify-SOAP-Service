<?php
include_once(PROJECT_ROOT_PATH . "/src/models/MusicModel.php");

function searchTable($params){
    $title = $params["sub_str"];
    $genre = $params["sub_str_param"];
    $artist = $params["year"];
    $year = $params["genre"];
    $sort_by = $params["sort_by"];
    $current_page = $params["current_page"];
    $limit = 5;

    $model = new MusicModel();
    $musics = $model->searchMusic($title, $genre, $artist, $year, $sort_by, $current_page, $limit);
    $trs = "";
    foreach ($musics as $i=>$music) 
    {
        $title = $music->music_title;
        $name = $music->artist_name;
        $genre = $music->genre_name;
        $year = $music->release_year;

        $trs .= <<< "EOT"
        <tr>
            <td>$i</td>
            <td>$title</td>
            <td>$name</td>
            <td>$genre</td>
            <td>$year</td>
        </tr>

        EOT;
    }
    
    $html=<<<EOT
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                $trs
            </tbody>
        </table>
    EOT;
    $length = count($model->searchMusic($title, $genre, $artist, $year, $sort_by, 1, 1000));
    $html .= pagination_item(1, ceil($length/$limit));
    echo($html);
}