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
               <h2>View Request Details</h2>
               <?php
               $sql="SELECT sregister.name,request.mes,request.logs from sregister 
               INNER JOIN request ON sregister.sid = request.sid";
               $res=$db->query($sql);
               if($res->num_rows>0)
               {
                  echo "<table>
                  <tr>
                  <th>Student No</th>
                  <th>Student  Name</th>
                  <th>Student Request</th>
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
                      echo"<td>{$row["mes"]}</td>";
                      echo"<td>{$row["logs"]}</td>";
                      echo "</tr>";
                  }
               }
               else
               {
                  echo "<p class='error'>No  Request Found </p>";
               }
               ?>
                   
             
               </div>
             
           </div>

       </div>
           
       </div>
    </body>
</html>