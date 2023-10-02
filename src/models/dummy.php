<?php

include('Database.php');

$trydb = new Database();
$trydb->query("SELECT * FROM users ");

foreach($trydb->resultSet() as $row){
    echo $row->username . '<br>';
}