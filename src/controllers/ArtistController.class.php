<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/ArtistModel.class.php");

class ArtistController extends BaseController 
{
    protected function __construct() 
    {
        $this->model = new ArtistModel();
    }

    public static function getAllArtist($path_params)
    {
        $result = self::getInstance()->model->getAllArtist();

        self::toResponse(200, "", $result);
    }
  
    public static function getArtistByArtistID($path_params)
    {   
        $params = $path_params;
        $result =  self::getInstance()->model->getArtistByArtistID($params["id_artist"]);

        self::toResponse(200, "", $result);
    }
    
    public static function editArtist($path_params)
    {
        $body_params = self::getBodyParams();
        $params = array_merge($body_params, $path_params);
        $result =  self::getInstance()->model->editArtist($params["id_artist"], $params["name"], $params["image_url"]);

        self::toResponse(200, "", $result);
    }
  
    public static function insertArtist($path_params) 
    {
        $body_params = self::getBodyParams();
        $params = array_merge($body_params, $path_params);
        $result = self::getInstance()->model->insertArtist( $params["name"], $params["image_url"]);

        self::toResponse(200, "", $result);
    }
  
    public static function deleteArtist($path_params)
    {
        $params = $path_params;
        $result = self::getInstance()->model->deleteArtist($params["id_artist"]);

        self::toResponse(200, "", $result);
    }
}