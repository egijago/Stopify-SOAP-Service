<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/GenreModel.class.php");

class GenreController extends BaseController {
    protected function __construct() 
    {
        $this->model = new GenreModel();
    }
  
    public function getAllGenre($params)
    {
        self::toResponse(200, "", $this->model->getAllGenre());
    }
  
    public function getGenreByGenreID($params)
    {
		self::toResponse(200, "", $this->model->getGenreByGenreID($params["id"]));
    }
    
    public function editGenre($params) 
	{
		self::toResponse(200, "", $this->model->editGenre($params["id"], $params["name"], $params["image_url"], $params["color"]));
    }
  
    public function insertGenre($params) 
	{
		self::toResponse(200, "", $this->model->insertGenre( $params["name"], $params["image_url"], $params["color"]));
    }
  
    public function deleteGenre($params)
	{
		self::toResponse(200, "", $this->model->deleteGenre($params["id"]));
    }
}