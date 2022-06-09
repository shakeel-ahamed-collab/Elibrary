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
               <h2>Search Book</h2>

            
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
               <input type="text" placeholder=" Book name or Keyword" id="name" name="name"><br>
                <input type="submit" value=" Search Now" id="button" name="submit">
                </form>
                     <?php
					    if (isset($_POST['submit']))
               {
                
                            $sql="select * from book where btitle like'%{$_POST["name"]}%' OR keywords like'%{$_POST["name"]}%'";
               $res=$db->query($sql);
               if($res->num_rows>0)
               {
                  echo "<table>
                  <tr>
                  <th>Book No</th>
                  <th>Book Title</th>
                  <th>Keywords</th>
                  <th>View</th>
				  <th>comment</th>
                  </tr>
                  ";
                  echo "</table";
                        $i=0;
                  while( $row=$res->fetch_assoc())
                  {
                      $i++;
                      echo "<tr>";
                      echo"<td>{$i}</td>";
                      echo"<td>{$row["btitle"]}</td>";
                      echo"<td>{$row["keywords"]}</td>";
                      echo"<td><a href='{$row["file"]}' target='_blank'>View</a></td>";
					  echo"<td><a href='comment.php?id={$row["bid"]}'>GO</a></td>";
                      echo "</tr>";
                  }
               }
               else
               {
                  echo "<p class='error'>No Books Found </p>";
               }
			   }
			   ?>
             
               </div>
			 
           </div>


       </div>
           
       </div>
    </body>
</html>