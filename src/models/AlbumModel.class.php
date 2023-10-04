<?php
require_once(__DIR__ ."/BaseModel.class.php");

class AlbumModel extends BaseModel 
{  
    public function __construct()
    {
        parent::__construct();
        $this->table = 'album';
    }
  
    public function getAllAlbum()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
  
    public function getAlbumByAlbumId($id_album)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_album = :id_album');
        $this->db->bind(':id_album', $id_album);
        return $this->db->single();
    }
    
    public function editAlbum($id_album, $title, $id_artist, $image_url)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET title = :title, id_artist = :id_artist, image_url = :image_url WHERE id_album = :id_album');
        $this->db->bind('title', $title);
        $this->db->bind(':id_artist', $id_artist);
        $this->db->bind(':image_url', $image_url);
        $this->db->bind(':id_album', $id_album);
        $this->db->execute();
        return $this->db->rowCount();
    }
  
    public function insertAlbum($title, $id_artist, $image_url) 
    {
        $this->db->query('INSERT INTO ' . $this->table . ' (title, id_artist, image_url) VALUES (:title, :id_artist, :image_url)');
        $this->db->bind('title', $title);
        $this->db->bind(':id_artist', $id_artist);
        $this->db->bind(':image_url', $image_url);
        $this->db->execute();
        return $this->db->rowCount();
    }
  
    public function deleteAlbum($id_album)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_album = :id_album');
        $this->db->bind(':id_album', $id_album);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
