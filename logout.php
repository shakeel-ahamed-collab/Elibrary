<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['sid']);
session_destroy();
header("location:index.php");
?>