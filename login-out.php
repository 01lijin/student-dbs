<?php 
session_start();
unset($_SESSION['usname']); //删除指定的session
header("Refresh:1;url=login.php");
 ?>