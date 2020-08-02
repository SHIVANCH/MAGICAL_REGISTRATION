<?php

require_once 'source/db_connect1.php';

if(isset($_POST['signup-btn'])) {

      $username = $_POST['uname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confpassword = $_POST['confpassword'];
     

      

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      
     

    try {
      $SQLInsert = "INSERT INTO users (username, password, email)
                   VALUES (:username, :password, :email)";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array(':username' => $username, ':password' => $hashed_password, ':email' => $email));

      if($statement->rowCount() == 1) {
        header('location: index.html');
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>