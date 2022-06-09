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
               <h2>New Book Request</h2>

               <?php
               if (isset($_POST['submit']))
               {
                   $sql="insert into request (sid,mes,logs) values ({$_SESSION['id']},'{$_POST["msg"]}',now())";
                   $res=$db->query($sql);
                  
                     echo "<p class='success'>  Request sent to Admin</P>";
                   
                  
               }
               ?>

               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
               <input type="text" placeholder="Message" id="name" name="msg"><br>
                <input type="submit" value=" Send Request" id="button" name="submit">
                </form>
                   
             
               </div>
             
           </div>

       </div>
           
       </div>
    </body>
</html>