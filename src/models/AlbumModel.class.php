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

    public function getAlbumRecords($current_page,$limit)
    {
        $offset = ($current_page - 1) * $limit;
        $this->db->query(
        'SELECT DISTINCT
            album.id_album as id_album,
            album.title as album_title,
            album.image_url as album_image_url,
            artist.name as artist_name
        FROM
            album
        INNER JOIN artist ON album.id_artist = artist.id_artist
        LIMIT :limit OFFSET :offset
        ');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();

    }

    public function getMusicRecords($current_page,$limit,$id_album)
    {
        $offset = ($current_page - 1) * $limit;
        $this->db->query(
        'SELECT DISTINCT
            music.id_music as id_music,
            music.title as music_title,
            album.title as album_title,
            genre.name as genre_name
        FROM
            music
        INNER JOIN album ON music.id_album = album.id_album
        INNER JOIN genre ON music.id_genre = genre.id_genre
        WHERE music.id_album = :id_album
        LIMIT :limit OFFSET :offset
        ');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        $this->db->bind(':id_album', $id_album);
        return $this->db->resultSet();

    }
    
    public function getMusicByAlbumId($id_album)
    {
        $this->db->query('SELECT * FROM music WHERE id_album = :id_album');
        $this->db->bind(':id_album', $id_album);
        return $this->db->resultSet();
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
