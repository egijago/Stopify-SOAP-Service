<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/ArtistModel.class.php");

class ArtistController extends BaseController {
    protected function __construct() 
    {
        $this->model = new ArtistModel();
    }

public function getAllArtist($params)
    {
        self::toResponse(200, "", $this->model->getAllArtist());
    }
  
    public function getArtistByArtistID($params)
    {
        self::toResponse(200, "", $this->model->getArtistByArtistID($params["id_artist"]));
    }
    
    public function editArtist($params)
    {
        self::toResponse(200, "", $this->model->editArtist($params["id_artist"], $params["name"], $params["image_url"]));
    }
  
    public function insertArtist($params) 
    {
        self::toResponse(200, "", $this->model->insertArtist( $params["name"], $params["image_url"]));
    }
  
    public function deleteArtist($params)
    {
        self::toResponse(200, "", $this->model->deleteArtist($params["id_artist"]));
    }
}