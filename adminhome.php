<?php
session_start();
include "database.php";
function countrecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}


if (!isset( $_SESSION['id']))
{
    header("location:alogin.php");               
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
          include "adminsidebar.php";
          ?>
        </nav>
       <div class="container">
          
           <img src="user.jpg" alt="">
           <div class="card">
               
            
               <div class="dashboard">
               <h2>Welcome Admin</h2>
                   
               <ul>
                   <li>Total Students:  <?php echo countrecord("select * from sregister",$db); ?></li>
                   <li>Total Books:  <?php echo countrecord("select * from book",$db); ?></li>
                   <li>Total Request:  <?php echo countrecord("select * from request",$db); ?></li>
                   <li>Total Comments:  <?php echo countrecord("select * from comment",$db); ?></li>
               </ul>
               </div>
             
           </div>

       </div>
           
       </div>
    </body>
</html>