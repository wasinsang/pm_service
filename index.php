<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf=8">
	<title>MNSP+</title>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/delete.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		let numId = '<?= isset($_GET['id']) ? $_GET['id'] : null ?>'
		let err_msg = '<?= isset($_SESSION['matched']) ? $_SESSION['matched'] : null ?>'
		let success_msg = '<?= isset($_SESSION['message']) ? $_SESSION['message'] : null ?>'
	</script>

	<?php
		unset($_SESSION['matched']);
		unset($_SESSION['message']);
	?>

	<script>
		$(document).ready(function(){
			console.log('numId >>>',numId);
			console.log('err_msg >>>',err_msg);
			console.log('success_msg >>>',success_msg);
			if (numId && err_msg) {
				console.log("Danger!");
				alert(err_msg);
			}
			else if ((err_msg === "") && (success_msg)){
				let success = success_msg;
				alert(success_msg);
			}
			if (numId) document.getElementById(numId).style.display='block';
		});
	</script>
	
	<style type="text/css">
		*{margin: 0px;padding: 0px;}
		div.head{height: 130px;box-shadow: 0px 0px 8px #000;}
		div.head-in{font: 24px serif,sans-serif;color: #FFF;width: 100%;}
		span{float: left;margin-top: 8px;}
		div[name=content]{width: 95%;margin: 10px;padding: 10px;border-radius: 6px;}
		div[name=content]div{float: left;}

select[name=menu]{
    width: 200px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
	padding: 12px 0px 12px 0px;
}

select[name=menu2]{
    width: 200px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
	padding: 12px 0px 12px 0px;
}
/* input[type=text] */
.search-input {
    width: 200px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('image/searchicon.png');
    background-position: 10px 9px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
/* input[type=text]:focus */
.search-input {
    width: 50%;
}

.table_center{
	text-align: center;
}
		
	</style>
</head>
<body>
<!--------------------------- Connect to DB --------------------------->
<?php
include("connect_db.php");

	 function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
	 function TimeDiff($strTime1,$strTime2)
	 {
				return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
	 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }

?>
	<div align="center" class="head">
		<div class="head-in">
			<span>
			<a href="index.php"><img src="image/logo.jpg" style="float: left;width: 50%;"></a>
			</span>
			
		</div>
	</div>

<br>

	<div class="content" align="center">
	<div name="content" align="left"> 

  <form method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <select name="menu" id="menu">
  <option value="Customer_Name">ชื่อลูกค้า</option>
  <option value="Status">สถานะ</option>
  <option value="PM_Name">ชื่อ PM</option>
  </select>


<input class="search-input" type="text" name="search" placeholder="Search..">
<br>
<!-- <br>
  <select name="menu2" id="menu2">
  <option value="Customer_Name">ชื่อลูกค้า</option>
  <option value="Status">สถานะ</option>
  <option value="PM_Name">ชื่อ PM</option>
  </select>

<input type="text" name="search2" placeholder="Search..">
<br> -->
<br>
<input class="serach-input" type="submit" value="Search"></th>

    </form>
	</div>

<!--------------------------สรุปงานทั้งหมด-------------------------------------->
<table>
    <thead>
        <tr>
            <th style="width : 350px;">PM</th>
			<th style="width : 110px;">SUM</th>
            <th style="width : 110px;">In Progress</th>
            <th style="width : 110px;">UAT</th>
			<th style="width : 110px;">Complete</th>
			<th style="width : 110px;">Waiting Customer</th>
            <th style="width : 110px;">Waiting Revise SO</th>
			<th style="width : 110px;">Terminate</th>		
        </tr>
    </thead>

<?php
	// status
	$in_progress = 0;
	$UAT = 0;
	$complete = 0;
	$hold = 0;
	$cancle = 0;
	$terminate = 0;
	$wait_cus = 0;
	$wait_re_so = 0;
	// ----------------------
	$pm_name = "";
	$allPM = array("");
	$allStatus = array();
	//สามารถre-check ความถูกต้อง โดยใช้ คำสั่ง "SELECT COUNT(Status),Status,PM_Name from pm_mnsp GROUP BY PM_Name, Status" นี้
	$sqlPM_ = "SELECT distinct PM_Name  FROM `pm_mnsp`";
	$queryPM = mysqli_query($conn,$sqlPM_);
	$i=0;
	$pm_name = "";
	$sqlCountPM = "SELECT COUNT(distinct PM_Name) as count FROM `pm_mnsp`";
	$queryCount = mysqli_query($conn,$sqlCountPM);
	$resultCount=mysqli_fetch_array($queryCount,MYSQLI_ASSOC);
	$count = ($resultCount["count"]);
	while($resultPM=mysqli_fetch_array($queryPM,MYSQLI_ASSOC)){ //loop pm name
		$sumData[$i] = array($resultPM['PM_Name'],$in_progress,$UAT,$complete,$hold,$cancle,$terminate,$wait_cus,$wait_re_so);
		$i+=1;
	}
	$sqlStatus = "SELECT Status, PM_Name  FROM `pm_mnsp`";
	$queryStatus = mysqli_query($conn,$sqlStatus);
	$j =0;
	while($resultStatus=mysqli_fetch_array($queryStatus,MYSQLI_ASSOC)){// loop status for pm name
		array_push($allStatus,$resultStatus);
		$temp=array_search($resultStatus["PM_Name"],array_column($sumData, 0),true); 
		// echo "$temp "."$j ".$sumData[$temp][0]. " ". $allStatus[$j]["Status"] ."<br>";
		if ($allStatus[$j]["Status"] === "in progress") {
			$sumData[$temp][1] += 1;
			// echo "who".$sumData[$temp][0]."--".$sumData[$temp][1]."in progress"."<br>";
		}
		elseif ($allStatus[$j]["Status"] === "UAT") {
			$sumData[$temp][2] += 1;
			// echo "who".$sumData[$temp][0]."--".$sumData[$temp][2]."UAT"."<br>";
		}
		elseif ($allStatus[$j]["Status"] === "complete") {
			$sumData[$temp][3] += 1;
			// echo "who".$sumData[$temp][0]."--".$sumData[$temp][3]."complete"."<br>";
		}
		elseif ($allStatus[$j]["Status"] === "hold") {
			$sumData[$temp][4] += 1;
			// echo "who".$sumData[$temp][0]."--".$sumData[$temp][4]."hold"."<br>";
		}
		elseif ($allStatus[$j]["Status"] === "Cancel") {
			$sumData[$temp][5] += 1;
			// echo "who".$sumData[$temp][0]."--".$sumData[$temp][5]."Cancel"."<br>";
		}
		elseif ($allStatus[$j]["Status"] === "Terminate") {
			$sumData[$temp][6] += 1;
			// echo "who".$sumData[$temp][0]."--".$sumData[$temp][6]."Terminate"."<br>";
		}
		elseif ($allStatus[$j]["Status"] === "Waiting Customer") {
			$sumData[$temp][7] += 1;
			// echo "who".$sumData[$temp][0]."--".$sumData[$temp][7]."Waiting Customer"."<br>";
		}
		elseif ($allStatus[$j]["Status"] === "Waiting Revise SO")  {
			$sumData[$temp][8] += 1;
			// echo "who".$sumData[$temp][0]."--".$sumData[$temp][8]."Waiting SO"."<br>";
		}
		$j+=1;
	}
	// print_r($allStatus);	
	// print_r($allStatus[0]["Status"]);
	// print_r($allStatus[0]["PM_Name"]);
	$x=0;
	$sum=0;
	while($x < $count) {
		echo "<tr>";
		echo "<td>", $sumData[$x][0],"</td>";
		$sum = $sumData[$x][1] + $sumData[$x][2] + $sumData[$x][3] + $sumData[$x][6] +$sumData[$x][7] + $sumData[$x][8];
		echo "<td class='table_center'>", $sum,"</td>";
		echo "<td class='table_center'>", $sumData[$x][1],"</td>";
		echo "<td class='table_center'>", $sumData[$x][2],"</td>";
		echo "<td class='table_center'>", $sumData[$x][3],"</td>";
		echo "<td class='table_center'>", $sumData[$x][7],"</td>";
		echo "<td class='table_center'>", $sumData[$x][8],"</td>";
		echo "<td class='table_center'>", $sumData[$x][6],"</td>";
		echo "</tr>";
		$x++;
		$sum=0;
	}
	echo "<td></td>";
?>
<!-- </table> ห้ามปิด table-->
	<!-- <tr>
            <td>ฐานิตา (ขิม)</td>
	</tr>
	<tr>
			<td>ภาณุพงศ์ (เจมส์)</td>
	</tr>
	<tr>
			<td>พีรวิทย์ (อัพ)</td>
	</tr>
	<tr>
			<td>ธนสาร (ต้น)</td>
	</tr>
	<tr>
			<td>ณัฏฐ์ (นัท)</td>
	</tr>
	<tr>
			<td>กาญจนา (ออม)</td>
	</tr>
	<tr>
			<td>ชมพูนุท  (มีน)</td>
	</tr>
	<tr>
			<td>วิภาวี (มิกกี้)</td>
	</tr>

<td></td> -->
<!------------------------------------------------------------------------>

<div name="content" align="left">
	<a href="index.php?Status=in progress" ><img src="image/BInP.png" width="90" height="30"></a>
	<a href="index.php?Status=UAT" ><img src="image/BUAT.png" width="50" height="30"></a>
	<a href="index.php?Status=complete" ><img src="image/BCom.png" width="90" height="30"></a>
	<a href="index.php?Status=hold" ><img src="image/BHold.png" width="90" height="30"></a>
	<a href="index.php" ><img src="image/BALL.png" width="50" height="30"></a>
	<a href="Add_job.php" ><img src="image/BAdd.png" width="40" height="30"></a>
	<a href="export_to_excel.php?menu=<?php echo @$_GET["menu"]; ?>&menu2=<?php echo @$_GET["menu2"]; ?>&search=<?php echo @$_GET["search"]; ?>&search2=<?php echo @$_GET["search2"]; ?>&Status=<?php echo @$_GET["Status"]; ?>" ><img src="image/BExcel.png" width="50" height="30" align="right"></a>
	<a href="https://teamup.com/ks3yzgm9fgsa7fd1p5" ><img src="image/Bcalendar.png" width="50" height="30" align="right"></a>
<br>
<br>
	<table>
    <thead>
        <tr>
            <th style="width : 500px;">Customer Name</th>
			<th style="width : 120px;">SO</th>
            <th style="width : 120px;">Status</th>
			<th style="width : 90px;">เริ่มสัญญา</th>
			<th style="width : 90px;">สิ้นสุดสัญญา</th>
            <th style="width : 220px;">PM</th>
			<th style="width : 90px;">Design</th>
			<th style="width : 90px;">Confirm UAT<br>(Customer&Sales)</th>
			<th style="width : 90px;">UAT</th>
			<th style="width : 90px;">DELETE</th>		
        </tr>
    </thead>
    <tbody>

<!-- ------------------------- Show Detail ------------------------- -->
<?php
if(@$_GET["menu"] != "" && @$_GET["search"] != "" && @$_GET["menu2"] != "" && @$_GET["search2"] != ""  ) {

	$str_replace = str_replace("'", "", $_GET["search"]);
	$str_replace2 = str_replace("'", "", $_GET["search2"]);
    $sql = "SELECT * FROM pm_mnsp WHERE `".$_GET["menu"]."` LIKE '%".$str_replace."%' AND `".$_GET["menu2"]."` LIKE '%".$str_replace2."%' ORDER BY Num_ID DESC";
    $query = mysqli_query($conn,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
	$sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";
    $query2 = mysqli_query($conn,$sql2);
    $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);
?>
        <tr>
            <td><a href="forum.php?Num_ID=<?php echo $result["Num_ID"]; ?>" target="_blank" ><?php echo $result["Customer_Name"];?></a></td>
			<td><?php echo @$result["SO"];?></td>
			<td></td>
<!--------------------------- Button --------------------------->
            <td ><center>
			<?php if($result["Status"] == "in progress"){
			echo '<p style="color : red;font-weight: bolder;">IN PROGRESS</p>';
			}elseif($result["Status"] == "UAT"){
			echo '<p style="color : coral;font-weight: bolder;">UAT</p>';
			}
			elseif($result["Status"] == "complete"){
			echo '<p style="color : green;font-weight: bolder;">COMPLETE</p>';
			}
			elseif($result["Status"] == "hold"){
			echo '<p style="color : black;font-weight: bolder;">HOLD</p>';
			}
			elseif($result["Status"] == "cancel"){
			echo '<p style="color : thistle;font-weight: bolder;">CANCEL</p>';
			}
			elseif($result["Status"] == "Terminate"){
			echo '<p style="color : cadetblue;font-weight: bolder;">TERMINATE</p>';
			}else {
			echo $result["Status"];
			}
			?>
			</center></td>
<!--------------------------- Button --------------------------->
            <td><center><?php $today = date("Y-m-d");


$diff = DateDiff($today,$result["Due_Date"]);

if(($diff <= 7) && ($result["Status"] == "in progress" )){

echo '<img src="image/icon-hot.gif" width="25%" height="25%">';
echo '<br>';
echo round($diff);
echo " Day";
	
}else{
	
echo $result["Due_Date"];
	
}?></center></td>
			<td><center><?php echo @$result["End_Date"];?></center></td>
			<td><center><?php echo @$result["Start_Con"];?></center></td>
            <td><?php echo $result["PM_Name"];?></td>
			
			<td><center><?php
			if($result["Design"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Design"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			</center></td>



			<td><center><?php
			if($result["Actionplan"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Actionplan"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			
			</center></td>

			<td><center><?php
			if($result["UAT"] == "NO" or $result["UAT"] == ""){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["UAT"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			
			</center></td>
        </tr>
<?php
}

}elseif(@$_GET["menu"] != "" && @$_GET["search"] != "" ) {

	$str_replace = str_replace("'", "", $_GET["search"]);
    $sql = "SELECT * FROM pm_mnsp WHERE `".$_GET["menu"]."` LIKE '%".$str_replace."%' ORDER BY Num_ID DESC";
    $query = mysqli_query($conn,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
	$sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";
    $query2 = mysqli_query($conn,$sql2);
    $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);
?>
        <tr>
            <td><a href="forum.php?Num_ID=<?php echo $result["Num_ID"]; ?>" target="_blank" ><?php echo $result["Customer_Name"];?></a></td>
			<td><?php echo @$result["SO"];?></td>
<!--------------------------- Button --------------------------->
            <td ><center>
			<?php if($result["Status"] == "in progress"){
			echo '<p style="color : red;font-weight: bolder; width: 90px;">IN PROGRESS</p>';
			}elseif($result["Status"] == "UAT"){
			echo '<p style="color : coral;font-weight: bolder;">UAT</p>';
			}
			elseif($result["Status"] == "complete"){
			echo '<p style="color : green;font-weight: bolder;">COMPLETE</p>';
			}
			elseif($result["Status"] == "hold"){
			echo '<p style="color : black;font-weight: bolder;">HOLD</p>';
			}
			elseif($result["Status"] == "cancel"){
			echo '<p style="color : thistle;font-weight: bolder;">CANCEL</p>';
			}
			elseif($result["Status"] == "Terminate"){
			echo '<p style="color : cadetblue;font-weight: bolder;">TERMINATE</p>';
			}else {
			echo $result["Status"];
			}
			?>
			</center></td>
<!--------------------------- Button --------------------------->
            <td><center><?php 
			
$today = date("Y-m-d");


$diff = DateDiff($today,$result["Due_Date"]);

if(($diff <= 7) && ($result["Status"] == "in progress" )){

echo '<img src="image/icon-hot.gif" width="25%" height="25%">';
echo '<br>';
echo round($diff);
echo " Day";
	
}else{
	
echo $result["Due_Date"];
	
}?></center></td>
			<td><center><?php echo @$result["Start_Con"];?></center></td>
			<td><center><?php echo @$result["End_Date"];?></center></td>
            <td><?php echo $result["PM_Name"];?></td>
			
			<td><center><?php
			if($result["Design"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Design"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			</center></td>



			<td><center><?php
			if($result["Actionplan"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Actionplan"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			
			</center></td>

			<td><center><?php
			if($result["UAT"] == "NO" or $result["UAT"] == ""){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["UAT"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			
			</center></td>

			<td><center>
				<!-- -------------------delete customer name------------------- -->
				<div id="<?php echo $result["Num_ID"]; ?>" class="modal">
					<span onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
					<form name="del-form" class="modal-content" method="post" enctype="multipart/form-data" action="DelCustomer.php">
						<div class="container">
							<h1 class="warning">Delete Customer Name </h1>
							<h3 class="question">Are you sure you want to delete</h3>
							<h2 class="question"><?php echo $result["Customer_Name"]; ?></h2>
							<label class="pwd-label" for="pwd">Password:</label>
							<input class="pwd-input" type="password" name="pwd" minlength="6" maxlength="20" required><br><br>
							<!-- <p id="err-msg"></p> -->
							<input type="hidden" value=<?php echo $result["Num_ID"]; ?> name="num_id">
							<div class="clearfix">
								<button type="button" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='none'" class="cancelbtn pointer">Cancel</button>
								<button type="submit" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='block'" class="deletebtn pointer">Delete</button>
							</div>
						</div>
					</form>
				</div>
				<button id="delbtn" class="button-delete pointer" type="button" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display=`block`">
					<img class="button-delete pointer" src="image/delete.svg" height="30">
				</button>
			</center></td>

			
        </tr>
<?php
}

}elseif (@$_GET["Status"] == "" ) {


   $sql = "SELECT * FROM pm_mnsp ORDER BY Num_ID DESC";

   $query = mysqli_query($conn,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{


   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);


?>
        <tr>
            <td><a href="forum.php?Num_ID=<?php echo $result["Num_ID"]; ?>" target="_blank" ><?php echo $result["Customer_Name"];?></a></td>
			<td><?php echo @$result["SO"];?></td>
<!--------------------------- Button --------------------------->
            <td><center>
			<?php if($result["Status"] == "in progress"){
			echo '<p style="color : red;font-weight: bolder; width: 90px;">IN PROGRESS</p>';
			}elseif($result["Status"] == "UAT"){
			echo '<p style="color : coral;font-weight: bolder;">UAT</p>';
			}
			elseif($result["Status"] == "complete"){
			echo '<p style="color : green;font-weight: bolder;">COMPLETE</p>';
			}
			elseif($result["Status"] == "hold"){
			echo '<p style="color : black;font-weight: bolder;">HOLD</p>';
			}
			elseif($result["Status"] == "cancel"){
			echo '<p style="color : thistle;font-weight: bolder;">CANCEL</p>';
			}
			elseif($result["Status"] == "Terminate"){
			echo '<p style="color : cadetblue;font-weight: bolder;">TERMINATE</p>';
			}else {
			echo $result["Status"];
			}
			?>
			</center></td>
<!--------------------------- Button --------------------------->

			<td><center><?php echo @$result["End_Date"];?></center></td>
			<td><center><?php echo @$result["Start_Con"];?></center></td>
            <td><?php echo $result["PM_Name"];?></td>
			

			<td><center><?php
			if($result["Diagram"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Diagram"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			</center></td>



			<td><center><?php
			if($result["Confirm_UAT"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Confirm_UAT"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			
			</center></td>
			
			
			<td><center><?php
			if($result["UAT"] == "NO" or $result["UAT"] == ""){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["UAT"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			
			</center></td>

			<td><center>
				<!-- -------------------delete customer name------------------- -->
				<div id="<?php echo $result["Num_ID"]; ?>" class="modal">
					<span onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
					<form name="del-form" class="modal-content" method="post" enctype="multipart/form-data" action="DelCustomer.php">
						<div class="container">
							<h1 class="warning">Delete Customer Name </h1>
							<h3 class="question">Are you sure you want to delete</h3>
							<h2 class="question"><?php echo $result["Customer_Name"]; ?></h2>
							<label class="pwd-label" for="pwd">Password:</label>
							<input class="pwd-input" type="password" name="pwd" minlength="6" maxlength="20" required><br><br>
							<!-- <p id="err-msg"></p> -->
							<input type="hidden" value=<?php echo $result["Num_ID"]; ?> name="num_id">
							<div class="clearfix">
								<button type="button" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='none'" class="cancelbtn pointer">Cancel</button>
								<button type="submit" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='block'" class="deletebtn pointer">Delete</button>
							</div>
						</div>
					</form>
				</div>
				<button id="delbtn" class="button-delete pointer" type="button" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display=`block`">
					<img class="button-delete pointer" src="image/delete.svg" height="30">
				</button>
			</center></td>
			
        </tr>

<?php
}
#<!--------------------------- In Progress --------------------------->

}elseif($_GET["Status"] != "" ) {

   $sql = "SELECT * FROM pm_mnsp WHERE Status = '".$_GET["Status"]."' ORDER BY Num_ID DESC ";

   $query = mysqli_query($conn,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);

	
?>
        <tr>
            <td><a href="forum.php?Num_ID=<?php echo $result["Num_ID"]; ?>" target="_blank" ><?php echo $result["Customer_Name"];?></a></td>
			<td style="width:120px"><?php echo @$result["SO"];?></td>
<!--------------------------- Button --------------------------->
            <td ><center>
			<!--<?php if($result["Status"] == "in progress"){
			echo '<img src="image/BInP.png" width="90" height="30">';
			}elseif($result["Status"] == "UAT"){
			echo '<img src="image/BUAT.png" width="50" height="30">';
			}
			elseif($result["Status"] == "complete"){
			echo '<img src="image/BCom.png" width="90" height="30">';
			}
			elseif($result["Status"] == "hold"){
			echo '<img src="image/BHold.png" width="90" height="30">';
			}else {
			echo $result["Status"];
			}
			?> -->
			<?php if($result["Status"] == "in progress"){
			echo '<p style="color : red;font-weight: bolder; width: 90px;">IN PROGRESS</p>';
			}elseif($result["Status"] == "UAT"){
			echo '<p style="color : coral;font-weight: bolder;">UAT</p>';
			}
			elseif($result["Status"] == "complete"){
			echo '<p style="color : green;font-weight: bolder;">COMPLETE</p>';
			}
			elseif($result["Status"] == "hold"){
			echo '<p style="color : black;font-weight: bolder;">HOLD</p>';
			}
			elseif($result["Status"] == "cancel"){
			echo '<p style="color : thistle;font-weight: bolder;">CANCEL</p>';
			}
			elseif($result["Status"] == "Terminate"){
			echo '<p style="color : cadetblue;font-weight: bolder;">TERMINATE</p>';
			}else {
			echo $result["Status"];
			}
			?>
			</center></td>
<!--------------------------- Button --------------------------->
            <td><center><?php 



$today = date("Y-m-d");


$diff = DateDiff($today,$result["Due_Date"]);

if(($diff <= 7) && ($result["Status"] == "in progress" )){

echo '<img src="image/icon-hot.gif" width="25%" height="25%">';
echo '<br>';
echo round($diff);
echo " Day";
	
}else{
	
echo $result["Due_Date"];
	
}
			
			
			?></center></td>
			<td><center><?php echo @$result["End_Date"];?></center></td>
			<td><center><?php echo @$result["Start_Con"];?></center></td>
            <td><?php echo $result["PM_Name"];?></td>
			

			<td><center><?php
			if($result["Diagram"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Diagram"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			</center></td>



			<td><center><?php
			if($result["Confirm_UAT"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Confirm_UAT"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			
			</center></td>

			<td><center><?php
			if($result["UAT"] == "NO" or $result["UAT"] == ""){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["UAT"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
		
			</center></td>

			<td><center>
				<!-- -------------------delete customer name------------------- -->
				<div id="<?php echo $result["Num_ID"]; ?>" class="modal">
					<span onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
					<form name="del-form" class="modal-content" method="post" enctype="multipart/form-data" action="DelCustomer.php">
						<div class="container">
							<h1 class="warning">Delete Customer Name </h1>
							<h3 class="question">Are you sure you want to delete</h3>
							<h2 class="question"><?php echo $result["Customer_Name"]; ?></h2>
							<label class="pwd-label" for="pwd">Password:</label>
							<input class="pwd-input" type="password" name="pwd" minlength="6" maxlength="20" required><br><br>
							<!-- <p id="err-msg"></p> -->
							<input type="hidden" value=<?php echo $result["Num_ID"]; ?> name="num_id">
							<div class="clearfix">
								<button type="button" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='none'" class="cancelbtn pointer">Cancel</button>
								<button type="submit" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display='block'" class="deletebtn pointer">Delete</button>
							</div>
						</div>
					</form>
				</div>
				<button id="delbtn" class="button-delete pointer" type="button" onclick="document.getElementById('<?php echo $result['Num_ID']; ?>').style.display=`block`">
					<img class="button-delete pointer" src="image/delete.svg" height="30">
				</button>
			</center></td>


			
        </tr>

<?php
}
}
mysqli_close($conn);
?>

     
    </tbody>
</table>


	</div>
</div>


</body>
</html>