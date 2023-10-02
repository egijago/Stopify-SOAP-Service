<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
class Users {
  private $table = 'users';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getUserByEmail($email)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
    $this->db->bind('email', $email);
    return $this->db->single();
  }

  public function getUserByUsername($username)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
    $this->db->bind('username', $username);
    return $this->db->single();
  }

  public function getAllUser(){
    $this->db->query('SELECT * FROM users');
    return $this->db->resultSet();
  }
  public function insertUser($data)
  {
    $query = "INSERT INTO users (email, username, password, role) values (:email, :username, :password, USER)";
    $this->db->query($query);
    $this->db->bind('email', $data['email']);
    $this->db->bind('username', $data['username']);
    $this->db->bind('password', $data['password']);
    $this->db->execute();
    return $this->db->rowCount();
  }
}