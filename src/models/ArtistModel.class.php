<?php
require_once(__DIR__ ."/BaseModel.class.php");

class ArtistModel extends BaseModel
{
    public function __construct()
    {
		parent::__construct();
		$this->table = "artist";
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
    
    public function editArtist($id_artist, $name, $image_url)
    {
		$this->db->query('UPDATE ' . $this->table . ' SET name = :name, image_url = :image_url WHERE id_artist = :id_artist');
		$this->db->bind('id_artist', $id_artist);
		$this->db->bind('name', $name);
		$this->db->bind('image_url', $image_url);
		$this->db->execute();
		return $this->db->rowCount();
    }
  
    public function insertArtist($name, $image_url) 
    {
		$this->db->query('INSERT INTO ' . $this->table . ' (name, image_url) VALUES (:name, :image_url)');
		$this->db->bind('name', $name);
		$this->db->bind('image_url', $image_url);
		$this->db->execute();
		return $this->db->rowCount();
    }
  
    public function deleteArtist($id_artist)
    {
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_artist = :id_artist');
		$this->db->bind('id_artist', $id_artist);
		$this->db->execute();
		return $this->db->rowCount();
    }
}
