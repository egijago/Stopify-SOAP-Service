<!-- getAlbumByID -->
<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
Class LikesModel {
    private $table = 'likes';
    private $db;
  
    public function __construct()
    {
        $this->db = new Database();
    }
  
    public function likes($id_user, $id_music)
    {
        $this->db->query('INSERT INTO ' . $this->table . ' (id_user, id_music) VALUES (:id_user, :id_music)');
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_music', $id_music);
        return $this->db->rowCount();
    }
    
    public function unlikes($id_user, $id_music)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_user = :id_user AND id_music = :id_music');
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_music', $id_music);
        return $this->db->resultSet();
    }
}
