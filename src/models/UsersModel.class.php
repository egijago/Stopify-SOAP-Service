<?php
require_once(__DIR__ ."/BaseModel.class.php");

class UsersModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function login($email, $password)
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
    
    public function insertUser($email, $username, $password)
    {
        $query = "INSERT INTO users (email, username, password, role) values (:email, :username, :password, USER)";
        $this->db->query($query);
        $this->db->bind('email', $email);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->execute();
        return $this->db->rowCount();
    }
}