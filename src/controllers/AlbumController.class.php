<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/album.php");

class AlbumController extends BaseController {
    protected function __construct() {
        $this->model = new Album();
    }
    public function getAllAlbums($params) {
        self::toResponse(200, "", $this->model->getAllAlbums());
    }
  
    public function getAlbumByAlbumId($params) {
        echo("PARAMS CONTROLLER" . $params->id);
        return self::toResponse(200, "", $this->model->getAlbumByAlbumId($params["id"]));
    }
    
    public function editAlbum($params) {
        return self::toResponse(202, "", $this->model->editAlbum($params));
    }
  
    public function insertAlbum($params) {
        return self::toResponse(203, "", $this->model->insertAlbum($params));
    }
  
    public function deleteAlbum($params) {
        return self::toResponse(204, "", $this->model->deleteAlbum($params));
    }
}