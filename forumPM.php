<!DOCTYPE html>
<html>
<head>

	<meta charset="utf=8">
	<title>MNSP+</title>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<style type="text/css">
		*{margin: 0px;padding: 0px;}
		div.head{height: 130px;box-shadow: 0px 0px 8px #000;}
		div.head-in{font: 24px serif,sans-serif;color: #FFF;width: 100%;}
		span{float: left;margin-top: 8px;}
		div[name=content]{width: 90%;margin: 10px;padding: 10px;border-radius: 6px;}
		div[name=content]div{float: left;}


		
	</style>
</head>
<body>
<!--------------------------- Connect to DB --------------------------->
<?php
include("connect_db.php");


   $sql = "SELECT * FROM pm_mnsp WHERE Num_ID = '".$_GET["Num_ID"]."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);


?>
	<div align="center" class="head">
		<div class="head-in">
			<span>
			<a href="../project_mantana/project/index.php"><img src="image/logo.jpg" style="float: left;width: 50%;"></a>
			</span>
			
		</div>
	</div>

<br>

	<div class="content" align="center">
	<div name="content" align="left"> 
	<a href="Edit_job_PM.php?Num_ID=<?php echo $result["Num_ID"]; ?>" ><img src="image/BEdit.png" width="40" height="30"></a>
	
<br>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable"  cellspacing="0">
    <thead>
	
        <tr>
            <!-- <th>Customer Name</th>
            <th>Status</th>
			<th>End Date</th>
			<th>Start Con.</th>
            <th>PM</th>
			<th>Sale Name</th>
			<th>Pre-Sale</th>
			<th>Design</th>
			<th>Confirm UAT (Customer&Sales)</th>
			<th>UAT</th>
			<th>Service</th> -->
			<th>Customer Name</th>
            <th>Customer ID</th>
            <th>Customer info</th>
            <th>SO No.</th>
            <th>SO Document</th>
            <th>Start Date</th>
			<th>End Date</th>
			<th>Service</th>
			<th>Sale</th>
			<th>Presale</th>
			<th width="500px">PM</th>
			<th>Confirm UAT</th>
			<th>UAT</th>
			<th>Status</th>
			<th>Diagram</th>

        </tr>
    </thead>
    <tbody>

<!--------------------------- Show Detail --------------------------->


        <tr>
            <td><?php echo $result["Customer_Name"];?></td>
<!--------------------------- Button --------------------------->
			<td><?php echo $result["Customer_id"];?></td>
			<td><?php echo $result["Customer_info"];?></td>
			<td><?php echo $result["SO_Num"];?></td>
			<td><center><?php
			if($result["SO_File"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["SO_File"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>
			</center></td>

			<td><?php echo @$result["Start_Con"];?></td>
			<td><?php echo @$result["End_Date"];?></td>
			<td><?php echo $result["Service"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
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
			<?php if($result["Status"] == "in progress"){
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
			?>
			</center></td>
<!--------------------------- Button --------------------------->
			<td><center><?php
			if($result["Diagram"] == "NO"){
			echo '<font color="red"><b>NO</b></font>';
			}else{
			echo '<a href="'.$result["Diagram"].'" target="_blank"><img src="image/BDownload.png" width="40" height="30"></a>';
			}
			?>



			
			
			
			


        </tr>





     
    </tbody>
</table>
<br>
<br>

	</div>
</div>


	<div class="content" align="center"><h1>Log Detail</h1>
	<div name="content" align="left">
	<a href="Add_forum_detail_PM.php?Num_ID=<?php echo $_GET["Num_ID"];?>" ><img src="image/BAdd.png" width="40" height="30"></a>
<br>

	<table>
    <thead>


	
        <tr>
            <th width="200">Date_log</th>
            <th width="700">Message</th>
            <th>Name_Log</th>

        </tr>
    </thead>
    <tbody>

	<?php


	$sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$_GET["Num_ID"]."' order by FR_ID ASC";

   $query2 = mysqli_query($conn,$sql2);

while($result2=mysqli_fetch_array($query2,MYSQLI_ASSOC))
{
?>

<!--------------------------- Show Detail --------------------------->

        <tr>
            <td><?php echo $result2["Date_Time"];?></td>
            <td><?php echo $result2["Message_Log"];?></td>
			<td><?php echo $result2["Name_Log"];?></td>
        </tr>

		<?php
}

mysqli_close($conn);
?>

</div>
</div>
</tbody>
</table>
</div>
                        </div>                

</body>
</html>