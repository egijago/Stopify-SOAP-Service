<!-- getAlbumByID -->
<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
Class GenreModel {
    private $table = 'genre';
    private $db;
  
    public function __construct()
    {
		$this->db = new Database();
    }
  
    public function getAllGenre()
    {
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
    }
  
    public function getGenreByGenreID($id)
    {
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_genre = :id');
		$this->db->bind('id_genre', $id);
		return $this->db->single();
    }
    
    public function editGenre($id, $name, $image_url, $color) 
	{
		$this->db->query('UPDATE ' . $this->table . ' SET name = :name, image_url = :image_url, color = :color WHERE id = :id');
		$this->db->bind('id_genre', $id);
		$this->db->bind('name', $name);
		$this->db->bind('image_url', $image_url);
		$this->db->bind('color', $color);
		$this->db->execute();
		return $this->db->rowCount();
    }
  
    public function insertGenre($name, $image_url, $color) 
	{
		$this->db->query('INSERT INTO ' . $this->table . ' (name, image_url, color) VALUES (:name, :image_url, :color)');
		$this->db->bind('name', $name);
		$this->db->bind('image_url', $image_url);
		$this->db->bind('color', $color);
		$this->db->execute();
		return $this->db->rowCount();
    }
  
    public function deleteGenre($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_genre = :id');
		$this->db->bind('id', $id);
		$this->db->execute();
		return $this->db->rowCount();
    }
}
