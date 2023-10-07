<?php
require_once(PROJECT_ROOT_PATH ."/src/models/BaseModel.class.php");

class ArtistModel extends BaseModel
{
    public function __construct()
    {
		parent::__construct();
		$this->table = "artist";
    }

	public function getMaxId()
	{
		$this->db->query('SELECT id_artist FROM ' . $this->table . ' ORDER BY id_artist DESC LIMIT 1');
		return $this->db->single()->id_artist;
	}
  
    public function getAllArtist()
    {
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
    }
  
    public function getArtistByArtistID($id_artist)
    {
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_artist = :id_artist');
		$this->db->bind('id_artist', $id_artist);
		return $this->db->single();
    }
    
    public function editArtist($id_artist, $name, $image)
    {
		$upload_dir = PROJECT_ROOT_PATH . "/public/storage/artist_image/"; 
        $upload_path = $upload_dir . $id_artist . "_" . $name . ".jpg";
		$image_url = $upload_path;
        move_uploaded_file($image["tmp_name"], $upload_path);

		$this->db->query('UPDATE ' . $this->table . ' SET name = :name, image_url = :image_url WHERE id_artist = :id_artist');
		$this->db->bind('id_artist', $id_artist);
		$this->db->bind('name', $name);
		$this->db->bind('image_url', $image_url);
		$this->db->execute();
		return $this->db->rowCount();
    }
  
    public function insertArtist($name, $image) 
    {
		$id_artist = $this->getMaxId() + 1;
		$upload_dir = PROJECT_ROOT_PATH . "/public/storage/artist_image/"; 
        $upload_path = $upload_dir . $id_artist . "_" . $name . ".jpg";
		$image_url = $upload_path;
        move_uploaded_file($image["tmp_name"], $upload_path);

		$this->db->query('INSERT INTO ' . $this->table . ' (name, image_url) VALUES (:name, :image_url)');
		$this->db->bind('name', $name);
		$this->db->bind('image_url', $image_url);
		$this->db->execute();
		return $this->db->rowCount();
    }
  
    public function deleteArtist($id_artist)
    {
		$delete_tuple = $this->getArtistByArtistID($id_artist);

		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_artist = :id_artist');
		$this->db->bind('id_artist', $id_artist);
		$this->db->execute();

		unlink($delete_tuple->image_url);
		return $this->db->rowCount();
    }
}

// $model = new ArtistModel();
// var_dump($model->getMaxId());