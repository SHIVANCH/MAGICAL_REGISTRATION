<?php

include_once 'source/session.php';
require_once 'source/db_connect2.php';

if(isset($_POST['done'])) {

      $comments = $_POST['comment'];
     

      

      $hashed_password = password_hash($comments, PASSWORD_DEFAULT);
      
     

    try {
      $SQLInsert = "INSERT INTO user (comment)
                   VALUES (:comment)";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array( ':comment' => $hashed_password));

    //   if($statement->rowCount() == 1) {
    //     header('location: index.html');
    //   }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    

</head>

<body>
   

    <?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>

    <?php
     echo "<h1> Welcome ".$_SESSION['username']." To Dashboard !! </h1>" ?>
      <form action="" method="post">
      <div class="form-group">
                            <label for="comment" class="col-md-3 control-label">MAGICAL WORDS</label>
                            <div class="col-md-9">
                            <textarea name="comment" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <!-- Button -->                                        
                            <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="done" value="SUBMIT" class="btn btn-primary">   
                            </div>
       
    </form>

    <h2><b><a href="logout.php">Logout</a></b></h2>


</body>
</html>