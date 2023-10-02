<!-- getAlbumByID -->
<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
Class Likes {
    private $table = 'likes';
    private $db;
  
    public function __construct()
    {
      $this->db = new Database();
    }
  
    public function likes($data)
    {
      $this->db->query('INSERT INTO ' . $this->table . ' (id_user, id_music) VALUES (:id_user, :id_music)');
      $this->db->bind('id_user', $data['id_user']);
      $this->db->bind('id_music', $data['id_music']);
      return $this->db->rowCount();
    }
    public function dislikes($data)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_user = :id_user AND id_music = :id_music');
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('id_music', $data['id_music']);
        return $this->db->resultSet();
    }
  
  }
