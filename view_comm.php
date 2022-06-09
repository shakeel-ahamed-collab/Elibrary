<?php
session_start();
include "database.php";



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
               <h2>View Comments Details</h2>
               <?php
               $sql="SELECT book.btitle,sregister.name,comment.comm,comment.logs from comment inner join book 
               on book.bid=comment.bid inner join sregister on comment.sid=sregister.sid";
               $res=$db->query($sql);
               if($res->num_rows>0)
               {
                  echo "<table>
                  <tr>
                  <th>CNO</th>
                  <th>Student Name</th>
                  <th>Book Title</th>
                  <th>Comments</th>
                  <th>Date</th>
                  </tr>
                  ";
                  echo "</table";
                        $i=0;
                  while( $row=$res->fetch_assoc())
                  {
                      $i++;
                      echo "<tr>";
                      echo"<td>{$i}</td>";
                      echo"<td>{$row["name"]}</td>";
                      echo"<td>{$row["btitle"]}</td>";
                      echo"<td>{$row["comm"]}</td>";
                      echo"<td>{$row["logs"]}</td>";
                      echo "</tr>";
                  }
               }
               else
               {
                  echo "<p class='error'>No  Comments Found </p>";
               }
               ?>
                   
             
               </div>
             
           </div>

       </div>
           
       </div>
    </body>
</html>