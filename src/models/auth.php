<?php
include(__DIR__ ."/../db/Database.class.php");
use Database;
class Auth {
  private $table = 'users';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function login($email,$password)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email AND password = :password');
    $this->db->bind('email', $email);
    $this->db->bind('password', $password);
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