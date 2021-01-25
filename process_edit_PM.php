<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>
<?php

include("connect_db.php");

$Num_ID = $_POST["Num_ID"];
$Cust_name = $_POST["Customer_Name"];
$Status = $_POST["Status"];
$datepicker2 = $_POST["End_Date"];
$datepicker3 = $_POST["Start_Date"];
$PM_Name = $_POST["PM_Name"];
$Sale_Name = $_POST["Sale_Name"];
$Pre_Sale = $_POST["Pre_Sale"];
$Service = $_POST["Service"];
$SO = $_POST["SO_Num"];



############ Change End Date ############
$End_Date = date_create($datepicker2);
$End_Date2 = date_format($End_Date,"Y-m-d");
############ Change Start Contact ############
$Start_Con = date_create($datepicker3);
$Start_Con2 = date_format($Start_Con,"Y-m-d");

######################## Attack File ########################

if( $_FILES['Diagram']['name'] == "" && $_FILES['Confirm_UAT']['name'] == "" ){

$path_copy = $_POST["Diagram"];
$path_copy2 = $_POST["Confirm_UAT"];


}elseif($_FILES['Diagram']['name'] != "" && $_FILES['Confirm_UAT']['name'] == "") {

############ Attack File 1 ############
$destfol = "../project_mantana/project/Uploadfile/Diagram/";
$type = strrchr($_FILES['Diagram']['name'],".");
$numrand = (mt_rand());
$date = date("Ymd");
$diagram = "Diagram";
$newname = $date.$diagram.$numrand.$type;
$path_copy=$destfol.$newname;
$path_copy = $_POST["Diagram"];

############ Delete File 1 ############
@unlink($_POST["Diagram"]);



}elseif($_FILES['Confirm_UAT']['name'] != "" && $_FILES['Diagram']['name'] == ""){


$destfol2 = "../project_mantana/project/Uploadfile/Confirm_UAT/";
$type2 = strrchr($_FILES['Confirm_UAT']['name'],".");
$numrand2 = (mt_rand());
$date2 = date("Ymd");
$diagram2 = "Confirm_UAT";
$newname2 = $date2.$diagram2.$numrand2.$type2;
$path_copy2=$destfol2.$newname2;
$path_copy2 = $_POST["Confirm_UAT"];

############ Delete File 2 ############
@unlink($_POST["Confirm_UAT"]);


}else{

############ Attack File 1 ############
$destfol = "../project_mantana/project/Uploadfile/Diagram/";
$type = strrchr($_FILES['Diagram']['name'],".");
$numrand = (mt_rand());
$date = date("Ymd");
$diagram = "Diagram";
$newname = $date.$diagram.$numrand.$type;
$path_copy=$destfol.$newname;



############ Attack File 2 ############
$destfol2 = "../project_mantana/project/Uploadfile/Confirm_UAT/";
$type2 = strrchr($_FILES['Confirm_UAT']['name'],".");
$numrand2 = (mt_rand());
$date2 = date("Ymd");
$diagram2 = "Confirm_UAT";
$newname2 = $date2.$diagram2.$numrand2.$type2;
$path_copy2=$destfol2.$newname2;


@unlink($_POST["Daigram"]);
@unlink($_POST["Confirm_UAT"]);


}

############ Attack File 3 ############
if ($_FILES['UAT']['name'] == "" && $_FILES['SO_File']['name'] == "" ){

	$path_copy3 = $_POST["UAT"];
	$path_copy4 = $_POST["SO_File"];



}elseif($_FILES['UAT']['name'] != "" && $_FILES['SO_File']['name'] == "") {

	############ Attack File 1 ############
	$destfol3 = "../project_mantana/project/Uploadfile/UAT/";
	$type3= strrchr($_FILES['UAT']['name'],".");
	$numrand3 = (mt_rand());
	$date3 = date("Ymd");
	$diagram3 = "UAT";
	$newname3 = $date3.$diagram3.$numrand3.$type3;
	$path_copy3=$destfol3.$newname3;
	$path_copy3 = $_POST["UAT"];
	
	############ Delete File 1 ############
	@unlink($_POST["UAT"]);
	
	
	
	}elseif($_FILES['SO_File']['name'] != "" && $_FILES['UAT']['name'] == ""){
	
	
	$destfol4 = "../project_mantana/project/Uploadfile/SO_File/";
	$type4 = strrchr($_FILES['SO_File']['name'],".");
	$numrand4 = (mt_rand());
	$date4 = date("Ymd");
	$diagram4 = "SO_File";
	$newname4 = $date4.$diagram4.$numrand4.$type4;
	$path_copy4=$destfol4.$newname4;
	$path_copy4 = $_POST["SO_File"];
	
	############ Delete File 2 ############
	@unlink($_POST["SO_File"]);
	
	
	}else{
	
	############ Attack File 1 ############
	$destfol3 = "../project_mantana/project/Uploadfile/UAT/";
	$type3 = strrchr($_FILES['UAT']['name'],".");
	$numrand3 = (mt_rand());
	$date3 = date("Ymd");
	$diagram3 = "UAT";
	$newname3 = $date3.$diagram3.$numrand3.$type3;
	$path_copy3=$destfol3.$newname3;
	
	
	
	############ Attack File 2 ############
	$destfol4 = "../project_mantana/project/Uploadfile/SO_File/";
	$type4 = strrchr($_FILES['SO_File']['name'],".");
	$numrand4 = (mt_rand());
	$date4 = date("Ymd");
	$diagram4 = "SO_File";
	$newname4 = $date4.$diagram4.$numrand4.$type4;
	$path_copy4=$destfol4.$newname4;
	
	
	@unlink($_POST["UAT"]);
	@unlink($_POST["SO_File"]);
	
	
	}
	


	$sql = "UPDATE pm_mnsp SET 
			Customer_Name = '".$Cust_name."' ,
			Status = '".$Status."' ,
			End_Date = '".$End_Date2."' ,
			Start_Con = '".$Start_Con2."' ,
			PM_Name = '".$PM_Name."' ,
			Sale_Name = '".$Sale_Name."' ,
			Pre_Sale = '".$Pre_Sale."' ,
			Diagram = '".$path_copy."' ,
			Confirm_UAT = '".$path_copy2."' ,
			UAT = '".$path_copy3."' ,
			Service = '".$Service."', 
			SO_Num = '".$SO."',
			SO_File = '".$path_copy4."'
			WHERE Num_ID = '".$Num_ID."' ";


$query = mysqli_query($conn,$sql);

if($query) {

$movefile1 = move_uploaded_file($_FILES['Diagram']['tmp_name'], $path_copy);
$movefile2 = move_uploaded_file($_FILES['Confirm_UAT']['tmp_name'], $path_copy2);
$movefile3 = move_uploaded_file($_FILES['UAT']['tmp_name'], $path_copy3);
$movefile4 = move_uploaded_file($_FILES['SO_File']['tmp_name'], $path_copy4);

echo "Record add successfully"."<br>";
echo '<a href="../project_mantana/project/index.php" >Go to Home</a>';

}else {
	echo "MySQL Connect Failed : Error : ".mysqli_error($conn);
}

mysqli_close($conn);


?>

