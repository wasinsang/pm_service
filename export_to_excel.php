
<?php 

    header("Content-Encoding: UTF-8");  
    header("Content-type: application/octet-stream; charset=utf-8");  
    header("Content-Disposition: attachment; filename=Project_Detail_Reoprt.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0"); 

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<HTML>
<HEAD>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
</HEAD><BODY>


	<table>
    <thead>
	
        <tr>
            <th>Customer Name</th>
            <th>Status</th>
            <th>Due Date</th>
			<th>End Date</th>
			<th>Start Con.</th>
            <th>PM</th>
			<th>Sale Name</th>
			<th>Pre-Sale</th>
			<th>Design</th>
			<th>Confirm UAT (Customer&Sales)</th>
			<th>UAT</th>
			<th>Serivce</th>
			<th>Last_log</th>
        </tr>
    </thead>
    <tbody>

<?php 
	
include("connect_db.php");

if(@$_GET["menu"] != "" && @$_GET["search"] != "" && @$_GET["menu2"] != "" && @$_GET["search2"] != ""  ) {

$sql = "SELECT * FROM pm_mnsp WHERE `".$_GET["menu"]."` LIKE '%".$_GET["search"]."%' AND `".$_GET["menu2"]."` LIKE '%".$_GET["search2"]."%'";

   $query = mysqli_query($conn,$sql);
      
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

	   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);

?>

        <tr>
            <td><?php echo $result["Customer_Name"];?></td>
            <td><?php echo $result["Status"];?></td>
            <td><?php echo $result["Due_Date"];?></td>
			<td><?php echo @$result["End Date"];?></td>
			<td><?php echo @$result["Start_Contact"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
			<td><?php echo $result["Design"];?></td>
			<td><?php echo $result["Actionplan"];?></td>
			<td><?php echo $result["UAT"];?></td>
			<td><?php echo $result["Service"];?></td>
			<td><?php echo @$result2["Message_Log"];?></td>
        </tr>
<?php
} 
      


}elseif(@$_GET["menu"] != "" && @$_GET["search"] != "" ) {

$sql = "SELECT * FROM pm_mnsp WHERE `".$_GET["menu"]."` LIKE '%".$_GET["search"]."%'";

   $query = mysqli_query($conn,$sql);
      
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

	   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);

?>

        <tr>
            <td><?php echo $result["Customer_Name"];?></td>
            <td><?php echo $result["Status"];?></td>
            <td><?php echo $result["Due_Date"];?></td>
			<td><?php echo @$result["End Date"];?></td>
			<td><?php echo @$result["Start_Contact"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
			<td><?php echo $result["Design"];?></td>
			<td><?php echo $result["Actionplan"];?></td>
			<td><?php echo $result["UAT"];?></td>
			<td><?php echo $result["Service"];?></td>
			<td><?php echo @$result2["Message_Log"];?></td>
        </tr>
<?php
} 
      


}elseif (@$_GET["Status"] != "" ) {

$sql = "SELECT * FROM pm_mnsp WHERE Status = '".$_GET["Status"]."'";

   $query = mysqli_query($conn,$sql);
      
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

	   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);

?>

        <tr>
            <td><?php echo $result["Customer_Name"];?></td>
            <td><?php echo $result["Status"];?></td>
            <td><?php echo $result["Due_Date"];?></td>
			<td><?php echo @$result["End Date"];?></td>
			<td><?php echo @$result["Start_Contact"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
			<td><?php echo $result["Design"];?></td>
			<td><?php echo $result["Actionplan"];?></td>
			<td><?php echo $result["UAT"];?></td>
			<td><?php echo $result["Service"];?></td>
			<td><?php echo @$result2["Message_Log"];?></td>
        </tr>
<?php
} 
      


}elseif(@$_GET["Status"] == "" ) {

 $sql = "SELECT * FROM pm_mnsp order by Num_ID ASC";

   $query = mysqli_query($conn,$sql);
      
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

	   $sql2 = "SELECT * FROM forum_mnsp WHERE Num_ID = '".$result["Num_ID"]."' ORDER BY FR_ID DESC LIMIT 1";

   $query2 = mysqli_query($conn,$sql2);

   $result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);

?>

        <tr>
            <td><?php echo $result["Customer_Name"];?></td>
            <td><?php echo $result["Status"];?></td>
            <td><?php echo $result["Due_Date"];?></td>
			<td><?php echo @$result["End Date"];?></td>
			<td><?php echo @$result["Start_Contact"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
			<td><?php echo $result["Design"];?></td>
			<td><?php echo $result["Actionplan"];?></td>
			<td><?php echo $result["UAT"];?></td>
			<td><?php echo $result["Service"];?></td>
			<td><?php echo @$result2["Message_Log"];?></td>
        </tr>
<?php
}
}

mysqli_close($conn);
?>

     
    </tbody>
</table> 
</BODY>
</HTML>