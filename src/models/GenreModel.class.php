<?php
require_once(__DIR__ ."/BaseModel.class.php");

class GenreModel extends BaseModel
{
    public function __construct()
    {
		parent::__construct();
		$this->table = 'genre';    
	}
  
    public function getAllGenre()
    {
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
    }
  
    public function getGenreByGenreId($id_genre)
    {
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_genre = :id_genre');
		$this->db->bind('id_genre', $id_genre);
		return $this->db->single();
    }
    
    public function editGenre($id_genre, $name, $image_url, $color) 
	{
		$this->db->query('UPDATE ' . $this->table . ' SET name = :name, image_url = :image_url, color = :color WHERE id_genre = :id_genre');
		$this->db->bind('id_genre', $id_genre);
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
  
    public function deleteGenre($id_genre)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_genre = :id_genre');
		$this->db->bind('id_genre', $id_genre);
		$this->db->execute();
		return $this->db->rowCount();
    }
}
