<?php	
	/*** Connect ***/
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "Customer";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   mysqli_set_charset($conn, "utf8");


?>

