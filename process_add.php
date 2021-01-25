<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>

<body>
<?php

include("connect_db.php");


$Cust_name = $_POST["Cust_name"];
$Status = $_POST["Status"];
$datepicker = $_POST["datepicker"];
$datepicker2 = $_POST["datepicker2"];
$datepicker3 = $_POST["datepicker3"];
$PM_Name = $_POST["PM_Name"];
$Sale_Name = $_POST["Sale_Name"];
$Pre_Sale = $_POST["Pre_Sale"];
$Service = $_POST["Service"];
$SO = $_POST["SO"];

############ Change format Date ############
$date_time = date_create($datepicker);
$date_time2 = date_format($date_time,"Y-m-d");
############ Change End Date ############
$End_Date = date_create($datepicker2);
$End_Date2 = date_format($End_Date,"Y-m-d");
############ Change Start Contact ############
$Start_Con = date_create($datepicker3);
$Start_Con2 = date_format($Start_Con,"Y-m-d");

######################## Attack File ########################

if( $_FILES['sentfile1']['name'] == "" && $_FILES['sentfile2']['name'] == "" ){

$path_copy = "NO";
$path_copy2 = "NO";

}elseif($_FILES['sentfile1']['name'] != "" && $_FILES['sentfile2']['name'] == "") {

############ Attack File 1 ############
$destfol = "Uploadfile/Design/";
$type = strrchr($_FILES['sentfile1']['name'],".");
$numrand = (mt_rand());
$date = date("Ymd");
$diagram = "Diagram";
$newname = $date.$diagram.$numrand.$type;
$path_copy=$destfol.$newname;
$path_copy2 = "NO";

}elseif($_FILES['sentfile2']['name'] != "" && $_FILES['sentfile1']['name'] == ""){

############ Attack File 2 ############
$destfol2 = "Uploadfile/Actionplan/";
$type2 = strrchr($_FILES['sentfile2']['name'],".");
$numrand2 = (mt_rand());
$date2 = date("Ymd");
$diagram2 = "Actionplan";
$newname2 = $date2.$diagram2.$numrand2.$type2;
$path_copy2=$destfol2.$newname2;
$path_copy = "NO";

}else{

############ Attack File 1 ############
$destfol = "Uploadfile/Design/";
$type = strrchr($_FILES['sentfile1']['name'],".");
$numrand = (mt_rand());
$date = date("Ymd");
$diagram = "Diagram";
$newname = $date.$diagram.$numrand.$type;
$path_copy=$destfol.$newname;



############ Attack File 2 ############
$destfol2 = "Uploadfile/Actionplan/";
$type2 = strrchr($_FILES['sentfile2']['name'],".");
$numrand2 = (mt_rand());
$date2 = date("Ymd");
$diagram2 = "Actionplan";
$newname2 = $date2.$diagram2.$numrand2.$type2;
$path_copy2=$destfol2.$newname2;
}


############ Attack File 3 ############
if ($_FILES['sentfile3']['name'] == ""){

$path_copy3 = "NO";

}

else{
############ Attack File 3 ############
$destfol3 = "Uploadfile/UAT/";
$type3 = strrchr($_FILES['sentfile3']['name'],".");
$numrand3 = (mt_rand());
$date3 = date("Ymd");
$diagram3 = "UAT";
$newname3 = $date3.$diagram3.$numrand3.$type3;
$path_copy3=$destfol3.$newname3;

}



$sql = "INSERT INTO pm_mnsp (Num_ID, Customer_Name, Status, Due_Date, End_Date, Start_Con, PM_Name, Sale_Name, Pre_Sale, Design, Actionplan, UAT, Service, SO) 
		VALUES ('','".$Cust_name."',
		'".$Status."',
		'".$date_time2."',
		'".$End_Date2."',
		'".$Start_Con2."',
		'".$PM_Name."',
		'".$Sale_Name."',
		'".$Pre_Sale."',
		'".$path_copy."',
		'".$path_copy2."',
		'".$path_copy3."',
		'".$Service."',
		'".$SO."')";

$query = mysqli_query($conn,$sql);

if($query) {

$movefile1 = move_uploaded_file($_FILES['sentfile1']['tmp_name'], $path_copy);
$movefile2 = move_uploaded_file($_FILES['sentfile2']['tmp_name'], $path_copy2);
$movefile3 = move_uploaded_file($_FILES['sentfile3']['tmp_name'], $path_copy3);

echo "Record add successfully"."<br>";
echo '<a href="index.php" >Go to Home</a>';

}else {
	echo "MySQL Connect Failed : Error : ".mysqli_error($conn);
}

mysqli_close($conn);


?>


</body>
</HTML>