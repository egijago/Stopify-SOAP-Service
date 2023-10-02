<?php
include(__DIR__ . "/users.php");
$users = new Users();
$datas = [
    "email" => "q",
    "username" => "q",
    "password" => "a"
];
$users->insertUser($datas);
