<?php 
require_once __DIR__ . '/../router/APIRouter.class.php';
require_once __DIR__ . '/../controllers/AlbumController.class.php';
require_once __DIR__ . '/../controllers/ArtistController.class.php';
require_once __DIR__ . '/../controllers/GenreController.class.php';
require_once __DIR__ . '/../controllers/LikesController.class.php';
require_once __DIR__ . '/../controllers/MusicController.class.php';
require_once __DIR__ . '/../controllers/UsersController.class.php';

require_once __DIR__ . '/../../public/partials/genre_input.php';
require_once __DIR__ . '/../../public/partials/music_input.php';
require_once __DIR__ . '/../../public/partials/album_input.php';
require_once __DIR__ . '/../../public/partials/artist_input.php';

$router = new APIRouter();


$router->get('/element/genre-input', 'genreInput');
$router->get('/element/genre-input/{id_genre}', 'genreInput');
$router->get('/element/music-input', 'musicInput');
$router->get('/element/music-input/{id_music}', 'musicInput');
$router->get('/element/album-input', 'albumInput');
$router->get('/element/album-input/{id_album}', 'albumInput');
$router->get('/element/artist-input', 'artistInput');
$router->get('/element/artist-input/{id_artist}', 'artistInput');




// $router->get('/api/test', function($params) {
//     echo("HOST: " . $_SERVER['HTTP_HOST']);   
// });

/* Album API */
$router->get('/api/albums', AlbumController::class .'::getAllAlbum');
$router->get('/api/albums/{id_album}' ,AlbumController::class . '::getAlbumByAlbumId');
$router->post('/api/albums/{id_album}', AlbumController::class . '::editAlbum'); // TODO: PARSE INPUT MANUALLY FOR PUT METHOD
$router->post('/api/albums', AlbumController::class . '::insertAlbum');
$router->delete('/api/albums/{id_album}', AlbumController::class . '::deleteAlbum');

/* Artist API */
$router->get('/api/artists', ArtistController::class .'::getAllArtist');
$router->get('/api/artists/{id_artist}' ,ArtistController::class . '::getArtistbyArtistId');
$router->post('/api/artists/{id_artist}', ArtistController::class . '::editArtist'); // TODO: PARSE INPUT MANUALLY FOR PUT METHOD
$router->post('/api/artists', ArtistController::class . '::insertArtist');
$router->delete('/api/artists/{id_artist}', ArtistController::class . '::deleteArtist');

/* Genre API */
$router->get('/api/genres', GenreController::class .'::getAllGenre');
$router->get('/api/genres/{id_genre}' ,GenreController::class . '::getGenreByGenreId');
$router->post('/api/genres/{id_genre}', GenreController::class . '::editGenre'); // TODO: PARSE INPUT MANUALLY FOR PUT METHOD
$router->post('/api/genres', GenreController::class . '::insertGenre');
$router->delete('/api/genres/{id_genre}', GenreController::class . '::deleteGenre');

/* Likes API */
$router->post('/api/users/{id_user}/likes/{id_music}', LikesController::class .'::likes');
$router->delete('/api/users/{id_user}/likes/{id_music}', LikesController::class .'::unlikes');

/* Music API */
$router->get('/api/musics', MusicController::class .'::getAllMusic');
$router->get('/api/musics/{id_music}' ,MusicController::class . '::getMusicByMusicId');
$router->post('/api/musics/{id_music}', MusicController::class . '::editMusic'); // TODO: PARSE INPUT MANUALLY FOR PUT METHOD
$router->post('/api/musics', MusicController::class . '::insertMusic');
$router->delete('/api/musics/{id_music}', MusicController::class . '::deleteMusic');

/* Users API */

/* Other API  */




$router->run();