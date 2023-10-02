<?php
include("../../models/Database.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];
    $name = $_POST['name'];
    $birthdate = $_POST['DD/MM/YYYY'];

    if ($password == $confpassword) {
        $db = new Database();
        $db->query("INSERT INTO users (username, email, password) VALUES (:name, :email, :password)");
        $db->bind(':name', $name);
        $db->bind(':email', $email);
        $db->bind(':password', $password);

        try {
            if ($db->execute()) {
                echo "<div class='message'>
                          <p>Registration successful!</p>
                      </div> <br>";
                echo "<a href='../../views/login/index.php'><button class='btn'>Login Now</button>";
            } else {
                echo "<div class='message'>
                          <p>Registration failed!</p>
                      </div> <br>";
            }
        } catch (PDOException $e) {
            // Log the error, don't expose it to the user
            error_log("Database error: " . $e->getMessage());
            echo "<div class='message'>
                      <p>An error occurred, please try again later.</p>
                  </div> <br>";
        }
    } else {
        echo "<div class='message'>
                  <p>Passwords do not match</p>
              </div> <br>";
        echo "<a href='../../views/register/index.php'><button class='btn'>Register Now</button>";
    }
}
?>
