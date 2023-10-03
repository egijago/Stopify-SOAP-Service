<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/AlbumModel.class.php");

class AlbumController extends BaseController {
    protected function __construct() 
    {
        $this->model = new AlbumModel();
    }
    
    public function getAllAlbums($params) 
    {
        self::toResponse(200, "", $this->model->getAllAlbums());
    }
  
    public function getAlbumByAlbumId($params) 
    {
        return self::toResponse(200, "", $this->model->getAlbumByAlbumId($params["id_album"]));
    }
    
    public function editAlbum($params) 
    {
        return self::toResponse(200, "", $this->model->editAlbum($params["id_album"],  $params["title"],  $params["id_artist"],  $params["image_url"]));
    }
  
    public function insertAlbum($params) 
    {
        return self::toResponse(200, "", $this->model->insertAlbum( $params["title"],  $params["id_artist"],  $params["image_url"]));
    }
  
    public function deleteAlbum($params) 
    {
        return self::toResponse(200, "", $this->model->deleteAlbum($params["id_album"]));
    }
}