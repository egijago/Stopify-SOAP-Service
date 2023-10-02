<!-- getAlbumByID -->
<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
Class Music {
    private $table = 'music';
    private $db;
  
    public function __construct()
    {
      $this->db = new Database();
    }
  
    public function getAllMusic()
    {
      $this->db->query('SELECT * FROM ' . $this->table);
      return $this->db->resultSet();
    }
  
    public function getMusicByMusicId($id)
    {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_music = :id');
      $this->db->bind('id_music', $id);
      return $this->db->single();
    }
    public function editMusic($data){
      $this->db->query('UPDATE ' . $this->table . ' SET title = :title, id_genre = :id_genre, audio_url = :audio_url, id_album = :id_album WHERE id_music = :id_music');
      $this->db->bind('title', $data['title']);
      $this->db->bind('id_genre', $data['id_genre']);
      $this->db->bind('audio_url', $data['audio_url']);
      $this->db->bind('id_album', $data['id_album']);
      $this->db->bind('id_music', $data['id_music']);
      $this->db->execute();
      return $this->db->rowCount();
    }
  
    public function insertMusic($data) {
        $this->db->query('INSERT INTO ' . $this->table . ' (title, id_genre, audio_url, id_album, id_music) VALUES (:title, :id_genre, :audio_url, :id_album, :id_music)');
        $this->db->bind('title', $data['title']);
        $this->db->bind('id_genre', $data['id_genre']);
        $this->db->bind('audio_url', $data['audio_url']);
        $this->db->bind('id_album', $data['id_album']);
        $this->db->bind('id_music', $data['id_music']);
        $this->db->execute();
        return $this->db->rowCount();
      }
  
    public function deleteMusic($id){
      $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_music = :id');
      $this->db->bind('id', $id);
      $this->db->execute();
      return $this->db->rowCount();
    }
  }
