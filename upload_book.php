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
               <h2>Upload New Book</h2>

               <?php
               if (isset($_POST['submit']))
               {
                 $target_dir="books/";
				$target_file=$target_dir.basename($_FILES["ufile"]["name"]);
				if(move_uploaded_file($_FILES["ufile"]["tmp_name"],$target_file))
				{
					$sql="insert into book(btitle,keywords,file) values('{$_POST["bname"]}','{$_POST["kword"]}','$target_file')";
					$db->query($sql);
					echo "<p class='success'>Books Uploaded</P>";
				}
				else
				{
					echo "<p class='error'>Error In Upload</p>";
				}
				 
               }
               ?>

               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
               <input type="text" placeholder="Book Title" id="name" name="bname" ><br>
               <input type="text" placeholder="Keyword" id="name" name="kword"><br>
			   <input type="file" placeholder="Upload Books" id="name" name="ufile"><br>
                <input type="submit" value=" Upload Book" id="button" name="submit">
                </form>
                   
             
               </div>
             
           </div>

       </div>
           
       </div>
    </body>
</html>