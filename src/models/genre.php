<!-- getAlbumByID -->
<?php
include('../db/Database.php');
Class Genre {
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
    
    public function editGenre($data){
      $this->db->query('UPDATE ' . $this->table . ' SET name = :name, image_url = :image_url, color = :color WHERE name = :name');
      $this->db->bind('name', $data['name']);
      $this->db->bind('image_url', $data['image_url']);
      $this->db->bind('color', $data['color']);
      $this->db->execute();
      return $this->db->rowCount();
    }
  
    public function insertGenre($data) {
      $this->db->query('INSERT INTO ' . $this->table . ' (name, image_url, color) VALUES (:name, :image_url, :color)');
      $this->db->bind('name', $data['name']);
      $this->db->bind('image_url', $data['image_url']);
      $this->db->bind('color', $data['color']);
      $this->db->execute();
      return $this->db->rowCount();
    }
  
    public function deleteGenre($id){
      $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_genre = :id');
      $this->db->bind('id', $id);
      $this->db->execute();
      return $this->db->rowCount();
    }
  }
