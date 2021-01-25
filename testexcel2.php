<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<HTML>
<HEAD>
<meta http-equiv="Content-type" content="text/html;charset=tis-620" />
</HEAD><BODY>

<?php 

    header("Content-Encoding: UTF-8");  
    header("Content-type: application/octet-stream; charset=utf-8");  
    header("Content-Disposition: attachment; filename=Project_Detail_Reoprt.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0"); 

?>

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
			<th>Serivce</th>
        </tr>
    </thead>
    <tbody>

<?php 
	
include("connect_db.php");
      
if(@$_GET["menu"] != "" && @$_GET["search"] != "" ) {

$sql = "SELECT * FROM pm_mnsp WHERE `".$_GET["menu"]."` LIKE '%".$_GET["search"]."%'";

   $query = mysqli_query($conn,$sql);
      
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

?>

        <tr>
            <td><?php echo $result["Customer_Name"];?></td>
            <td><?php echo $result["Status"];?></td>
            <td><?php echo $result["Due_Date"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
			<td><?php echo $result["Design"];?></td>
			<td><?php echo $result["Actionplan"];?></td>
			<td><?php echo $result["UAT"];?></td>
			<td><?php echo $result["Service"];?></td>
        </tr>
<?php
} 
      


}elseif (@$_GET["Status"] != "" ) {

$sql = "SELECT * FROM pm_mnsp WHERE Status = '".$_GET["Status"]."'";

   $query = mysqli_query($conn,$sql);
      
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

?>

        <tr>
            <td><?php echo $result["Customer_Name"];?></td>
            <td><?php echo $result["Status"];?></td>
            <td><?php echo $result["Due_Date"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
			<td><?php echo $result["Design"];?></td>
			<td><?php echo $result["Actionplan"];?></td>
			<td><?php echo $result["UAT"];?></td>
			<td><?php echo $result["Service"];?></td>
        </tr>
<?php
} 
      


}elseif(@$_GET["Status"] == "" ) {

 $sql = "SELECT * FROM pm_mnsp order by Num_ID ASC";

   $query = mysqli_query($conn,$sql);
      
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{

?>

        <tr>
            <td><?php echo $result["Customer_Name"];?></td>
            <td><?php echo $result["Status"];?></td>
            <td><?php echo $result["Due_Date"];?></td>
            <td><?php echo $result["PM_Name"];?></td>
			<td><?php echo $result["Sale_Name"];?></td>
			<td><?php echo $result["Pre_Sale"];?></td>
			<td><?php echo $result["Design"];?></td>
			<td><?php echo $result["Actionplan"];?></td>
			<td><?php echo $result["UAT"];?></td>
			<td><?php echo $result["Service"];?></td>
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