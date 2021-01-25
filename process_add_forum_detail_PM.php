<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>

<body>
<?php

include("connect_db.php");


$Num_ID = $_POST["Num_ID"];
$Date_Time = $_POST["Date_Time"];
$LName = $_POST["LName"];
$LMessage = $_POST["LMessage"];





$sql = "INSERT INTO forum_mnsp (Num_ID, Date_Time, Message_Log, Name_Log) 
		VALUES ('".$Num_ID."','".$Date_Time."','".$LMessage."','".$LName."')";

$query = mysqli_query($conn,$sql);

if($query) {

echo "Record add successfully"."<br>";
echo '<a href="forumPM.php?Num_ID='.$Num_ID.'" >Go to Home</a>';

}else {
	echo "MySQL Connect Failed : Error : ".mysqli_error($conn);
}

mysqli_close($conn);


?>


</body>
</HTML>