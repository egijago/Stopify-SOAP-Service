<!-- getAlbumByID -->
<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
Class MusicModel {
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

	public function deleteMusic($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_music = :id');
		$this->db->bind('id', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
}
