<!-- getAlbumByID -->
<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
Class AlbumModel {
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
        $this->db->bind(':id', $id);
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
  
    public function deleteAlbum($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_album = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
