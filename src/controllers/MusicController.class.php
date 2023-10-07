<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/MusicModel.class.php");

class MusicController extends BaseController {
    protected function __construct() 
    {
        $this->model = new MusicModel();
    }

	public static function getAllMusic($path_params)
	{	
		$result = self::getInstance()->model->getAllMusic();

		self::toResponse(200, "", $result);
	}

	public static function getMusicByMusicId($path_params)
	{
		$params = $path_params;
		$result = self::getInstance()->model->getMusicByMusicId($params["id_music"]);

		self::toResponse(200, "", $result);
	}
	public static function getDetailMusic($path_params)
	{
		$params = $path_params;
		$result = self::getInstance()->model->getDetailMusic($params["id_music"]);

		self::toResponse(200, "", $result);
	}
	public static function editMusic($path_params)
	{
		$body_params = self::getBodyParams();
		$params = array_merge($path_params, $body_params);
		$result =  self::getInstance()->model->editMusic($params["title"], $params["id_genre"], $params["audio"], $params["id_album"], $params["id_music"]);
		
		self::toResponse(200, "", $result);
	}

	public static function insertMusic($path_params) 
	{
		$body_params = self::getBodyParams();
		$params = array_merge($path_params, $body_params);
		$result = self::getInstance()->model->insertMusic($params["title"], $params["id_genre"], $params["audio"], $params["id_album"]);

		self::toResponse(200, "", $result);
	}

	public static function deleteMusic($path_params)
	{
		$params = $path_params;
		$result = self::getInstance()->model->deleteMusic($params["id"]);

		self::toResponse(200, "", $result);
	}
}