<!-- getAlbumByID -->
<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
Class ArtistModel 
{
    private $table = 'artist';
    private $db;
  
    public function __construct()
    {
		$this->db = new Database();
    }
  
    public function getAllArtist()
    {
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
    }
  
    public function getArtistByArtistID($id)
    {
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_artist = :id');
		$this->db->bind('id_artist', $id);
		return $this->db->single();
    }
    
    public function editArtist($id, $name, $image_url)
    {
		$this->db->query('UPDATE ' . $this->table . ' SET name = :name, image_url = :image_url WHERE id = :id');
		$this->db->bind('id_artist', $id);
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
  
    public function deleteArtist($id)
    {
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_artist = :id');
		$this->db->bind('id', $id);
		$this->db->execute();
		return $this->db->rowCount();
    }
}
