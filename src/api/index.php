<?php 
require_once __DIR__ . '/../router/APIRouter.class.php';
require_once __DIR__ . '/../controllers/AlbumController.class.php';
require_once __DIR__ . '/../controllers/ArtistController.class.php';
require_once __DIR__ . '/../controllers/GenreController.class.php';
require_once __DIR__ . '/../controllers/LikesController.class.php';
require_once __DIR__ . '/../controllers/MusicController.class.php';
require_once __DIR__ . '/../controllers/UsersController.class.php';

$router = new APIRouter();


$router->put('/api/test', function($params) {
    echo("FOOBAR");
    echo(json_encode($params));
});

/* Album API */
$router->get('/api/albums', AlbumController::class .'::getAllAlbum');
$router->get('/api/album/{id_album}' ,AlbumController::class . '::getAlbumByAlbumId');
$router->put('/api/album/{id_album}', AlbumController::class . '::editAlbum');
$router->post('/api/album', AlbumController::class . '::insertAlbum');
$router->delete('/api/album/{id_album}', AlbumController::class . '::deleteAlbum');

/* Astist API */
$router->get('/api/artists', ArtistController::class .'::getAllArtist');
$router->get('/api/artists/{id_artist}' ,ArtistController::class . '::getArtistbyArtistId');
$router->put('/api/artists', ArtistController::class . '::editArtist');
$router->post('/api/artists', ArtistController::class . '::insertArtist');
$router->delete('/api/artists/{id_artist}', ArtistController::class . '::deleteArtist');

/* Genre API */
$router->get('/api/genres', GenreController::class .'::getAllGenre');
$router->get('/api/genres/{id_genre}' ,GenreController::class . '::getGenreByGenreId');
$router->put('/api/genres', GenreController::class . '::editGenre');
$router->post('/api/genres', GenreController::class . '::insertGenre');
$router->delete('/api/genres/{id_genre}', GenreController::class . '::deleteGenre');

/* Likes API */
$router->post('/api/users/{id_user}/likes/{id_music}', LikesController::class .'::likes');
$router->delete('/api/users/{id_user}/likes/{id_music}', LikesController::class .'::unlikes');

/* Music API */
$router->get('/api/musics', MusicController::class .'::getAllMusic');
$router->get('/api/musics/{id_genre}' ,MusicController::class . '::getMusicByMusicId');
$router->put('/api/musics', MusicController::class . '::editMusic');
$router->post('/api/musics', MusicController::class . '::insertMusic');
$router->delete('/api/musics/{id_genre}', MusicController::class . '::deleteMusic');

/* Users API */

/* Other API  */



$router->run();