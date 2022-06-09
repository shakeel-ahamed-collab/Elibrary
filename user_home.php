<?php
session_start();
include "database.php";
if (!isset( $_SESSION['id']))
{
    header("location:user_login.php");               
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Elibrary</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body class="abody">
        <nav>
           
            <label class="logo">E-library</label>
          <?php 
          include "usersidebar.php";
          ?>
        </nav>
       <div class="container">
          
           <img src="user.jpg" alt="">
           <div class="card">
               
            
               <div class="dashboard">
               <h2>Welcome <?php echo $_SESSION['name'];?></h2>
             
               </div>
             
           </div>

       </div>
           
       </div>
    </body>
</html>