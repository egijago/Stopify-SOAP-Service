<?php
require_once(__DIR__ ."/BaseModel.class.php");

class LikesModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "likes";
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
