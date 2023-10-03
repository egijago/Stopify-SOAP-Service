<?php 
require_once __DIR__ . '/../router/APIRouter.php';
require_once __DIR__ . '/../controllers/AlbumController.class.php';

$router = new APIRouter();


$router->get('/api/albums', function($params=null) {
    AlbumController::getInstance()->getAllAlbums($params);
});
$router->get('/api/album/{id}', function($params=null) {
    AlbumController::getInstance()->getAlbumByAlbumId($params);
});
$router->put('/api/album', function($params=null) {
    AlbumController::getInstance()->editAlbum($params);
});
$router->post('/api/album', function($params=null) {
    AlbumController::getInstance()->insertAlbum($params);
});
$router->delete('/api/album/{id}', function($params=null) {
    AlbumController::getInstance()->deleteAlbum($params);
});

$router->run();