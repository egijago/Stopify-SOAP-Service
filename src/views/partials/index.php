<?php

include_once(PROJECT_ROOT_PATH . "/src/router/APIRouter.class.php");

$partials = glob(PROJECT_ROOT_PATH . '/src/views/partials/*.php');
foreach($partials as $partial) {
    include_once($partial);
}

$router = new APIRouter();


$router->get('/api/partials/table', 'table');

$router->get('/element/genre-input', 'genreInput');
$router->get('/element/genre-input/{id_genre}', 'genreInput');
$router->get('/element/music-input', 'musicInput');
$router->get('/element/music-input/{id_music}', 'musicInput');
$router->get('/element/album-input', 'albumInput');
$router->get('/element/album-input/{id_album}', 'albumInput');
$router->get('/element/artist-input', 'artistInput');
$router->get('/element/artist-input/{id_artist}', 'artistInput');

$router->run();
