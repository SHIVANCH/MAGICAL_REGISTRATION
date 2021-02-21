<?php

include_once 'source/session.php';
require_once 'source/db_connect2.php';

if(isset($_POST['done'])) {

      $comments = $_POST['comment'];
     

      

//       $hashed_password = password_hash($comments, PASSWORD_DEFAULT);
      
     

    try {
      $SQLInsert = "INSERT INTO user (comment)
                   VALUES (:comment)";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array( ':comment' => $comments));

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
      <style>
     h1{
       
/*        
      box-shadow:2px 2px 30px 3px #0097e6;
      border-radius:2rem; */
      /* background-color:yellow; */
      /* color:black;
      width:auto; */
      color:#0097e6;
      display:flex;
      flex-direction: column;
      justify-content: center;
      align-items:center;
      font-size:2.4rem;
      /* width:70%; */
      
     }

     .form-group{
       display:flex;
       flex-direction: column;
      justify-content: center;
      align-items:center;
      font-size:1.5rem;
      margin-top:70px;
      color:#0097e6;
     }
     .sub{
       color:#0097e6;
       border-width:5px;
     }
     h2{
      box-shadow:2px 2px 30px 3px #0097e6;
       border-radius:2px;
      color:yellow;
     }
     @media(max-width: 768px){
      h1{
        /* background-color:yellow; */
        /* color:black;
       /* box-shadow:2px 2px 30px #0097e6;
       width:auto;
       display:flex;
       flex-direction: column;
       justify-content: center;
       align-items:center; */
       font-size:1.2rem; 
       width:auto;
       
      }
     }

      </style>
    <title>Dashboard</title>
    

</head>

<body>
   

    <?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>

    <?php
     echo "<h1> Welcome ".$_SESSION['username']." To Dashboard! </h1>" ?>
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
                            <input type="submit" name="done" value="SUBMIT" class="btn btn-primary sub">   
                            </div>
       
    </form>

    <h2><b><a href="logout.php">Logout</a></b></h2>


</body>
</html>
