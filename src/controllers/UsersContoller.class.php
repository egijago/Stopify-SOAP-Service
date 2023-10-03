<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/UsersModel.class.php");

class UsersController extends BaseController {
    protected function __construct() 
    {
        $this->model = new UsersModel();
    }

    public function login($params)
    {
        self::toResponse(200, "", $this->model->login($params["email"], $params["password"]));
    }

    public function getUserByUsername($params)
    {
        self::toResponse(200, "", $this->model->getUserByUsername($params["password"]));
    }

    public function getAllUser($params)
    {
        self::toResponse(200, "", $this->model->getAllUser());
    }
    
    public function insertUser($params)
    {
        self::toResponse(200, "", $this->model->insertUser($params["email"], $params["username"], $params["passowrd"]));
    }
}