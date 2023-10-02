<!-- getAlbumByID -->
<?php
include('../db/Database.php');
Class Artist {
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
    
    public function editArtist($data){
      $this->db->query('UPDATE ' . $this->table . ' SET name = :name WHERE name = :name');
      $this->db->bind('name', $data['name']);
      $this->db->execute();
      return $this->db->rowCount();
    }
  
    public function insertArtist($data) {
      $this->db->query('INSERT INTO ' . $this->table . ' (name) VALUES (:name)');
      $this->db->bind('name', $data['name']);
      $this->db->execute();
      return $this->db->rowCount();
    }
  
    public function deleteArtist($id){
      $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_artist = :id');
      $this->db->bind('id', $id);
      $this->db->execute();
      return $this->db->rowCount();
    }
  }
