<!DOCTYPE html>
<html>
<head>
	<meta charset="utf=8">
	<title>MNSP+</title>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<style type="text/css">
		*{margin: 0px;padding: 0px;}
		div.head{background-color: #cccbc9;height: 150px;box-shadow: 0px 0px 8px #000;}
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


input[type=text] {
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

input[type=text]:focus {
    width: 50%;
}
		
	</style>
</head>
<body>
<!--------------------------- Connect to DB --------------------------->
<?php
include("connect_db.php");


?>
	<div align="center" class="head">
		<div class="head-in">
			<span>
			<a href="index.php"><img src="image/logo.png" width="150" height="150"></a>
			</span>
			
		</div>
	</div>

<br>

	<div class="content" align="center">
		<div name="content" align="left"> 

  <form method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <select name="menu" id="menu">
  <option value="Customer_Name">Customer_Name</option>
  <option value="Status">Status</option>
  <option value="PM_Name">PM_Name</option>
  </select>

<input type="text" name="search" placeholder="Search..">

    </form>
	</div>
	<div name="content" align="left">
	<a href="index2.php?Status=in progress" ><img src="image/BInP.png" width="90" height="30"></a>
	<a href="index2.php?Status=UAT" ><img src="image/BUAT.png" width="50" height="30"></a>
	<a href="index2.php?Status=complete" ><img src="image/BCom.png" width="90" height="30"></a>
	<a href="index2.php" ><img src="image/BALL.png" width="50" height="30"></a>
	<a href="Add_job.php" ><img src="image/BAdd.png" width="40" height="30"></a>
	<a href="testexcel2.php?menu=<?php echo @$_GET["menu"]; ?>&search=<?php echo @$_GET["search"]; ?>&Status=<?php echo @$_GET["Status"]; ?>" ><img src="image/BExcel.png" width="50" height="30" align="right"></a>

	
<br>
<br>
	<table>
    <thead>
	
        <tr>
            <th>Customer Name</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>PM</th>
			<th>Sale Name</th>
			<th>Pre-Sale</th>
			<th>Design</th>
			<th>Actionplan</th>
			<th>UAT</th>
			<th width="200">Last_Log</th>
        </tr>
    </thead>
    <tbody>

<!--------------------------- Show Detail --------------------------->
<?php
if(@$_GET["menu"] != "" && @$_GET["search"] != "" ) {

   $sql = "SELECT * FROM pm_mnsp WHERE `".$_GET["menu"]."` LIKE '%".$_GET["search"]."%'";

   $query = mysqli_query($conn,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
	   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);

?>
        <tr>
            <td><a href="forum.php?Num_ID=<?php echo $result["Num_ID"]; ?>" target="_blank" ><?php echo $result["Customer_Name"];?></a></td>
<!--------------------------- Button --------------------------->
            <td ><center>
			<?php if($result["Status"] == "in progress"){
			echo '<img src="image/BInP.png" width="90" height="30">';
			}elseif($result["Status"] == "UAT"){
			echo '<img src="image/BUAT.png" width="50" height="30">';
			}
			elseif($result["Status"] == "complete"){
			echo '<img src="image/BCom.png" width="90" height="30">';
			}else {
			echo $result["Status"];
			}
			?>
			</center></td>
<!--------------------------- Button --------------------------->
            <td><?php echo $result["Due_Date"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
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


			<td><?php echo @$result2["Message_Log"];?></td>
        </tr>
<?php
}

}elseif (@$_GET["Status"] == "" ) {


   $sql = "SELECT * FROM pm_mnsp order by Num_ID ASC";

   $query = mysqli_query($conn,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{


   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);


?>
        <tr>
            <td><a href="forum.php?Num_ID=<?php echo $result["Num_ID"]; ?>" target="_blank" ><?php echo $result["Customer_Name"];?></a></td>
<!--------------------------- Button --------------------------->
            <td><center>
			<?php if($result["Status"] == "in progress"){
			echo '<img src="image/BInP.png" width="90" height="30">';
			}elseif($result["Status"] == "UAT"){
			echo '<img src="image/BUAT.png" width="50" height="30">';
			}
			elseif($result["Status"] == "complete"){
			echo '<img src="image/BCom.png" width="90" height="30">';
			}else if($result["Status"] == "Waiting Revise SO"){
			echo '<img src="image/BInP.png" width="90" height="30">';
			}else{
			echo $result["Status"];
			}
			?>
			</center></td>
<!--------------------------- Button --------------------------->
            <td><?php echo $result["Due_Date"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
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




			<td><?php echo @$result2["Message_Log"];?></td>
        </tr>

<?php
}
#<!--------------------------- In Progress --------------------------->

}elseif($_GET["Status"] != "" ) {

   $sql = "SELECT * FROM pm_mnsp WHERE Status = '".$_GET["Status"]."'";

   $query = mysqli_query($conn,$sql);

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);

	
?>
        <tr>
            <td><a href="forum.php?Num_ID=<?php echo $result["Num_ID"]; ?>" target="_blank" ><?php echo $result["Customer_Name"];?></a></td>
<!--------------------------- Button --------------------------->
            <td ><center>
			<?php if($result["Status"] == "in progress"){
			echo '<img src="image/BInP.png" width="90" height="30">';
			}elseif($result["Status"] == "UAT"){
			echo '<img src="image/BUAT.png" width="50" height="30">';
			}
			elseif($result["Status"] == "complete"){
			echo '<img src="image/BCom.png" width="90" height="30">';
			}else {
			echo $result["Status"];
			}
			?>
			</center></td>
<!--------------------------- Button --------------------------->
            <td><?php echo $result["Due_Date"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
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


			<td><?php echo @$result2["Message_Log"];?></td>
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