<?php
session_start();
include "database.php";
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
          include "sidebar.php";
          ?>
        </nav>
       <div class="container">
           <?php
              if(isset($_POST["submit"]))
              {
                   $sql="SELECT * FROM alogin WHERE username='{$_POST["aname"]}' AND pass='{$_POST["apass"]}'";
                 $res=$db->query($sql);
                 if($res->num_rows>0)
                 {
                     $row=$res->fetch_assoc();
                     $_SESSION['id']=$row['id'];
                     $_SESSION['username']=$row['username'];
                    header("location:adminhome.php");
                 }
                 else
                 {
                       echo "<p class=error> Invalid User </p>";
                 }

                
              }
           ?>
           <img src="user.jpg" alt="">
           <div class="cards">
               
               <h3>Admin login</h3>
               <form action="alogin.php" method="POST">
               <input type="text" placeholder="UserName" id="name" name="aname" required><br>
               <input type="password" placeholder="Password" id="name" name="apass" required><br>
                <input type="submit" value="Login" id="button" name="submit">
                </form>
           </div>

       </div>
           
       </div>
    </body>
</html>