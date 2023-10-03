<?php

class PageRouter
{
    private $page;
    private $router;

    public function __construct($page)
    {
        $parsedUrl = parse_url($page);
        $pathSegments = explode('/', trim($parsedUrl['path'], '/'));
        $this->page = $pathSegments[0];
        require_once __DIR__ . '/../router/APIRouter.php';
        require_once __DIR__ . '/../controllers/AlbumController.class.php';

        $this->router = new APIRouter();
    }

    public function isMatch($page)
    {
        if (file_exists("src/views/$page/index.php")) {
            return true;
        } else {
            return false;
        }
    }

    public function getPage()
    {
        if ($this->isMatch($this->page)) {
            require_once "src/views/$this->page/index.php";
        } 
        else if($this->page == "api"){
            
            

            $this->router->get('/api/albums', function($params=null) {
                AlbumController::getInstance()->getAllAlbums($params);
            });
            $this->router->get('/api/album/{id}', function($params=null) {
                AlbumController::getInstance()->getAlbumByAlbumId($params);
            });
            $this->router->put('/api/album', function($params=null) {
                AlbumController::getInstance()->editAlbum($params);
            });
            $this->router->post('/api/album', function($params=null) {
                AlbumController::getInstance()->insertAlbum($params);
            });
            $this->router->delete('/api/album/{id}', function($params=null) {
                AlbumController::getInstance()->deleteAlbum($params);
            });

            $this->router->run();
        }
        else {
            require_once "src/views/404/index.php";
        }
    }
}