<!-- getAlbumByID -->
<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
Class Album {
    private $table = 'album';
    private $db;
  
    public function __construct()
    {
      $this->db = new Database();
    }
  
    public function getAllAlbums()
    {
      $this->db->query('SELECT * FROM ' . $this->table);
      return $this->db->resultSet();
    }
  
    public function getAlbumByAlbumId($id)
    {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_album = :id');
      $this->db->bind('id_album', $id);
      return $this->db->single();
    }
    
    public function editAlbum($data){
      $this->db->query('UPDATE ' . $this->table . ' SET title = :title, id_artist = :id_artist, image_url = :image_url WHERE id_album = :id_album');
      $this->db->bind('title', $data['title']);
      $this->db->bind('id_artist', $data['id_artist']);
      $this->db->bind('image_url', $data['image_url']);
      $this->db->bind('id_album', $data['id_album']);
      $this->db->execute();
      return $this->db->rowCount();
    }
  
    public function insertAlbum($data) {
      $this->db->query('INSERT INTO ' . $this->table . ' (title, id_artist, image_url) VALUES (:title, :id_artist, :image_url)');
      $this->db->bind('title', $data['title']);
      $this->db->bind('id_artist', $data['id_artist']);
      $this->db->bind('image_url', $data['image_url']);
      $this->db->execute();
      return $this->db->rowCount();
    }
  
    public function deleteAlbum($id){
      $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_album = :id');
      $this->db->bind('id', $id);
      $this->db->execute();
      return $this->db->rowCount();
    }
  }
