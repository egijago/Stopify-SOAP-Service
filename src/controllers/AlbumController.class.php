<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/AlbumModel.class.php");

class AlbumController extends BaseController 
{
    protected function __construct() 
    {
        $this->model = new AlbumModel();
    }
    
    public static function getAllAlbum($path_params) 
    {
        $params = $path_params;
        $result = self::getInstance()->model->getAllAlbum();

        self::toResponse(200, "", $result);
    }
  
    public static function getAlbumByAlbumId($path_params) 
    {
        $params = $path_params;
        $result = self::getInstance()->model->getAlbumByAlbumId($params["id_album"]);

        self::toResponse(200, "", $result);
    }
    
    public static function editAlbum($path_params) 
    {
        $body_params = self::getBodyParams();
        $params = array_merge($body_params, $path_params);
        $result = self::getInstance()->model->editAlbum($params["id_album"],  $params["title"],  $params["id_artist"],  $params["image"]);
     
        self::toResponse(200, "", $result);
    }
  
    public static function insertAlbum($path_params) 
    {
        $body_params = self::getBodyParams();
        $params = array_merge($body_params, $path_params);
        $result = self::getInstance()->model->insertAlbum( $params["title"],  $params["id_artist"],  $params["image"]);

        self::toResponse(200, "", $result);
    }
  
    public static function deleteAlbum($path_params) 
    {
        $params = $path_params;
        $result = self::getInstance()->model->deleteAlbum($params["id_album"]);

        self::toResponse(200, "", $result);
    }
}