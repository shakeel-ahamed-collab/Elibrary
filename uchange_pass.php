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
               <h2>Change Password</h2>

               <?php
               if (isset($_POST['submit']))
               {
                   $sql="SELECT * from sregister WHERE pass='{$_POST["opass"]}' and sid='{$_SESSION["id"]}'";
                   $res=$db->query($sql);
                   if($res->num_rows>0)
                   {
                     $s="update sregister set pass='{$_POST["npass"]}' WHERE sid=".$_SESSION["id"];
                     $db->query($s);
                     echo "<p class='success'>  Password Changed Successfuly </P>";
                   }
                   else
                   {
                       echo "<p class='error'> Invalid Password </p>";
                   }
               }
               ?>

               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
               <input type="password" placeholder="Old Password" id="name" name="opass" ><br>
               <input type="password" placeholder="New Password" id="name" name="npass"><br>
                <input type="submit" value=" Update" id="button" name="submit">
                </form>
                   
             
               </div>
             
           </div>

       </div>
           
       </div>
    </body>
</html>