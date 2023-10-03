<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/LikesModel.class.php");

class LikesController extends BaseController {
    protected function __construct() 
    {
        $this->model = new LikesModel();
    }

    public function likes($params)
    {
        self::toResponse(200, "", $this->model->likes($params["id_user"], $params["id_music"]));
    }
    
    public function unlikes($params)
    {
        self::toResponse(200, "", $this->model->unlikes($params["id_user"], $params["id_music"]));
    }
}