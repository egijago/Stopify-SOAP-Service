<?php
require_once(__DIR__ ."/BaseModel.class.php");

class MusicModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
		$this->table = "music";
	}

	public function getAllMusic()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getMusicByMusicId($id_music)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_music = :id_music');
		$this->db->bind('id_music', $id_music);
		return $this->db->single();
	}

	public function getDetailMusic($id_music)
	{
		$this->db->query(
			'SELECT 
				album.image_url AS image_url,
				album.title AS album_title,
				music.title AS music_title,
				genre.name AS genre_name,
				artist.name AS artist_name,
				music.audio_url AS audio_url
			FROM 
				music
			JOIN 
				album ON music.id_album = album.id_album
			JOIN 
				genre ON music.id_genre = genre.id_genre
			JOIN 
				artist ON album.id_artist = artist.id_artist
			WHERE 
				music.id_music = :id_music;
		');
		$this->db->bind('id_music', $id_music);
		return $this->db->single();
	}
	public function editMusic($title, $id_genre, $audio_url, $id_album, $id_music){
		$this->db->query('UPDATE ' . $this->table . ' SET title = :title, id_genre = :id_genre, audio_url = :audio_url, id_album = :id_album WHERE id_music = :id_music');
		$this->db->bind('title', $title);
		$this->db->bind('id_genre', $id_genre);
		$this->db->bind('audio_url',$audio_url);
		$this->db->bind('id_album', $id_album);
		$this->db->bind('id_music', $id_music);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function insertMusic($title, $id_genre, $audio_url, $id_album) 
	{
		$this->db->query('INSERT INTO ' . $this->table . ' (title, id_genre, audio_url, id_album, id_music) VALUES (:title, :id_genre, :audio_url, :id_album)');
		$this->db->bind('title', $title);
		$this->db->bind('id_genre', $id_genre);
		$this->db->bind('audio_url',$audio_url);
		$this->db->bind('id_album', $id_album);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function searchMusic($title, $genre, $artist, $album, $current_page, $limit) {
		if ($title == "null") {
			$title = "%";
		}
		if ($genre == "null") {
			$genre = "%";
		}
		if ($artist == "null") {
			$artist = "%";
		}
	
		$offset = ($current_page - 1) * $limit;
	
		$this->db->query(
			'SELECT 
				album.image_url AS image_url,
				album.title AS album_title,
				music.title AS music_title,
				genre.name AS genre_name,
				artist.name AS artist_name,
				music.audio_url AS audio_url
			FROM 
				music
			JOIN 
				album ON music.id_album = album.id_album
			JOIN 
				genre ON music.id_genre = genre.id_genre
			JOIN 
				artist ON album.id_artist = artist.id_artist
			WHERE 
				music.title LIKE :title AND genre.name LIKE :genre AND artist.name LIKE :artist
			LIMIT :limit OFFSET :offset;'
		);
	
		// Using "%" around the values for LIKE
		$this->db->bind(':title', '%' . $title . '%');
		$this->db->bind(':genre', '%' . $genre . '%');
		$this->db->bind(':artist', '%' . $artist . '%');
		$this->db->bind(':limit', $limit);
		$this->db->bind(':offset', $offset);
	
		return $this->db->resultSet();
	}	

	public function deleteMusic($id_music)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_music = :id_music');
		$this->db->bind('id_music', $id_music);
		$this->db->execute();
		return $this->db->rowCount();
	}
}
