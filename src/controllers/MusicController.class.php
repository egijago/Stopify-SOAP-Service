<?php 
require_once(__DIR__ . "/BaseController.class.php");
require_once(__DIR__ . "/../models/ArtistModel.class.php");

class MusicController extends BaseController {
    protected function __construct() 
    {
        $this->model = new MusicModel();
    }

	public function getAllMusic($params)
	{
		self::toResponse(200, "", $this->model->getAllMusic());
	}

	public function getMusicByMusicId($params)
	{
		self::toResponse(200, "", $this->model->getMusicByMusicId($params["id"]));
	}
	public function editMusic($params){
		self::toResponse(200, "", $this->model->editMusic($params["title"], $params["id_genre"], $params["audio_url"], $params["id_album"], $params["id_music"]));
	}

	public function insertMusic($params) 
	{
		self::toResponse(200, "", $this->model->insertMusic($params["title"], $params["id_genre"], $params["audio_url"], $params["id_album"]));
	}

	public function deleteMusic($params)
	{
		self::toResponse(200, "", $this->model->deleteMusic($params["id"]));
	}
}