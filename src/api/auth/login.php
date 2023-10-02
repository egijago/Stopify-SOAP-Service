<?php
include("../../models/Database.php");
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db = new Database();
    $db->query("SELECT * FROM users WHERE email = :email AND password = :password");
    $db->bind(':email', $email);
    $db->bind(':password', $password);

    if ($db->single()) {
        // Successful login
        $_SESSION['username']=$db->single()->username;
        $_SESSION['role']=$db->single()->role;
        header("Location: ../../views/home/index.php");
    } else {
        echo "<div class='message'>
                <p>Wrong Username or Password</p>
              </div> <br>";
        echo "<a href='index.php'><button class='btn'>Go Back</button>";
    }
}
?>
