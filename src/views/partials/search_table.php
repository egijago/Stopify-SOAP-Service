<?php
include_once(PROJECT_ROOT_PATH . "/src/models/MusicModel.class.php");

function searchTable($params)
{

    echo json_encode($params);

    $model = new MusicModel();
    $musics = $model->searchMusic($params["sub_str"], $params["sub_str_param"], $params["year"], $params["genre"],  $params["sort_by"], $params["current_page"], $params["limit"]);
    $limit = $params["limit"];
    // // $musics = $model->searchMusic($title, $genre, $artist, $year, $sort_by, $current_page, $limit);
    // echo json_encode($musics);
    $trs = "";
    foreach ($musics as $i=>$music) 
    {
        $title = '<a href="/music?id=' . $music->id_music . '">' . $music->music_title . '</a>';
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
    $length = count($model->searchMusic($params["sub_str"], $params["sub_str_param"], $params["year"], $params["genre"],  $params["sort_by"], 1, 1000));
    $html .= pagination_item($params["current_page"], ceil($length / $limit));
    echo($html);
}