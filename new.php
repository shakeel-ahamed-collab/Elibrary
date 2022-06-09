<?php

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
          
           <img src="user.jpg" alt="">
           <div class="card">
               
            
               <div class="dashboard">
               <h2>New User Registration</h2>

               <?php
               if (isset($_POST['submit']))
               {
                 
				
					$sql="insert into sregister(name,pass,email,dep) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["email"]}',
					'{$_POST["dep"]}')";
					$db->query($sql);
					echo "<p class='success'>User Registration Success</P>";
				
				
				
				 
               }
               ?>

               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
               <input type="text" placeholder="Name" id="name" name="name" required ><br>
               <input type="password" placeholder="Password" id="name" name="pass" required><br>
			   <input type="text" placeholder="Email" id="name" name="email" required><br>
			   <select name="dep" required>
			   <option>Select</option>
			   <option value="Diploma">Diploma</option>
			   <option value="Hnd">HND</option> 
			   <option value="Bsc">Bsc</option>
			   <option value="Msc">MSc</option>
			   <option value="Phd">Phd</option>
			   </select><br>
                <input type="submit" value=" Register" id="button" name="submit">
                </form>
                   
             
               </div>
             
           </div>

       </div>
           
       </div>
    </body>
</html>