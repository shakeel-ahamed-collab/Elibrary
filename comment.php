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
               <h2>Send your Comments</h2>

			   <br><br>
               <div id="center">
			   <form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="POST">
			    <textarea placeholder=" Your Comment" name="comment" rows="5" cols="20"></textarea><br>
                <input type="submit" value="Post Now" id="button" name="submit">
			   </form>
			   <?php
			                  if (isset($_POST['submit']))
               {
                 
				
					$sql="INSERT INTO comment(bid, sid, comm, logs) VALUES ({$_GET["id"]},{$_SESSION['id']},'{$_POST["comment"]}',now())";
					$db->query($sql);
			
				
				
				
				 
               }
			   
			    $sql="SELECT sregister.name,comment.comm,comment.logs from comment inner join sregister 
               on sregister.sid=comment.sid where comment.bid={$_GET["id"]} order by comment.cid desc";
               $res=$db->query($sql);
               if($res->num_rows>0)
               {
                
                  while( $row=$res->fetch_assoc())
                  {
					  echo"<p>
                   <strong>{$row["name"]} :</strong>
					   {$row["comm"]}
					   <i>{$row["logs"]}</i>
					   </p>";
                  }
               }
               else
               {
                  echo "<p class=error>No Comment Yet</p>";
			   }
			   ?>
			   </div>
            
              
			   
             
               </div>
			 
           </div>


       </div>
           
       </div>
    </body>
</html>