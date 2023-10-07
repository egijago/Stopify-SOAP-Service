<?php
require_once(__DIR__ ."/BaseModel.class.php");

class MusicModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
		$this->table = "music";
	}

	public function getMaxIdMusic()
    {
		$this->db->query('SELECT id_music FROM ' . $this->table . ' ORDER BY id_music DESC LIMIT 1');
		return $this->db->single()->id_music;
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
	public function editMusic($title, $id_genre, $audio, $id_album, $id_music)
	{
		$upload_dir = PROJECT_ROOT_PATH . "/public/storage/music_audio/"; 
		$id_music = $this->getMaxIdMusic() + 1;
        $upload_path = $upload_dir . $id_music. "_" . $title . ".jpg";
        $audio_url = $upload_path;
		move_uploaded_file($audio["tmp_name"], $upload_path);

		$this->db->query('UPDATE ' . $this->table . ' SET title = :title, id_genre = :id_genre, audio_url = :audio_url, id_album = :id_album WHERE id_music = :id_music');
		$this->db->bind('title', $title);
		$this->db->bind('id_genre', $id_genre);
		$this->db->bind('audio_url',$audio_url);
		$this->db->bind('id_album', $id_album);
		$this->db->bind('id_music', $id_music);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function insertMusic($title, $id_genre, $audio, $id_album) 
	{
		$upload_dir = PROJECT_ROOT_PATH . "/public/storage/music_audio/"; 
		$id_music = $this->getMaxIdMusic() + 1;
        $upload_path = $upload_dir . $id_music. "_" . $title . ".jpg";
        $audio_url = $upload_path;
		move_uploaded_file($audio["tmp_name"], $upload_path);

		$this->db->query('INSERT INTO ' . $this->table . ' (title, id_genre, audio_url, id_album) VALUES (:title, :id_genre, :audio_url, :id_album)');
		$this->db->bind('title', $title);
		$this->db->bind('id_genre', $id_genre);
		$this->db->bind('audio_url',$audio_url);
		$this->db->bind('id_album', $id_album);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteMusic($id_music)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_music = :id_music');
		$this->db->bind('id_music', $id_music);
		$this->db->execute();
		return $this->db->rowCount();
	}
}
