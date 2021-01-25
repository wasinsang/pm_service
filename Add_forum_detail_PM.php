<!DOCTYPE html>
<html>
<head>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!--------------------------- datepicker ---------------------------->

    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--------------------------- datepicker ---------------------------->

    <meta name="viewport" charset="utf=8" content="width=device-width, initial-scale=1.0">

<style>
.inputstl { 
    padding: 5px; 
    border: solid 1px #173955; 
    outline: 0; 
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #AACCE8), to(#FFFFFF)); 
    background: -moz-linear-gradient(top, #FFFFFF, #AACCE8 1px, #FFFFFF 25px); 
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 

    } 
   
   		*{margin: 0px;padding: 0px;}
		div.head{background-color: #cccbc9;height: 150px;box-shadow: 0px 0px 8px #000;}
		div.head-in{font: 24px serif,sans-serif;color: #FFF;width: 100%;}
		span{float: left;margin-top: 8px;}
		div[name=content]{width: 90%;margin: 10px;padding: 10px;border-radius: 6px;}
		div[name=content]div{float: left;}


</style>

</head>

<body>

<!--------------------------- check input ---------------------------->
<script language="javascript">
function fncSubmit()
{
	if(document.form1.LName.value == "")
	{
		alert('Please input Name ');
		document.form1.LName.focus();
		return false;
	}	
	if(document.form1.LMessage.value == "")
	{
		alert('Please input Message');
		document.form1.LMessage.focus();		
		return false;
	}	

	document.form1.submit();
}
</script>

<?php
include("connect_db.php");


   $sql = "SELECT * FROM pm_mnsp WHERE Num_ID = '".$_GET["Num_ID"]."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);


?>

<!--------------------------- check input ---------------------------->

	<div align="center" class="head">
		<div class="head-in">
			<span>
			<a href="../project_mantana/project/index.php"><img src="image/logo.jpg" style="float: left;width: 50%;"></a>
			</span>
			
		</div>
	</div>
<div class="container">
<h1>Input Detail Log Message </h1>
    <form class="form-horizontal" role="form" name="form1" action="process_add_forum_detail_PM.php" method="post" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">

	<input type="hidden" value = "<?php echo $_GET["Num_ID"];?>" name="Num_ID">
	<input type="hidden" value = "<?php echo date("Y-m-d H:i:s");?>" name="Date_Time">

        <div class="form-group">
        <label for="Cust" class="col-sm-2 control-label">Customer Name :</label>
        <div class="col-sm-5">
           <label for="Cust" class="form-control inputstl"><?php echo $result["Customer_Name"];?></label>

        </div>
      </div>

      <div class="form-group">
        <label for="Name" class="col-sm-2 control-label">Name Log :</label>
        <div class="col-sm-5">
          <input type="textarea" class="form-control inputstl" id="LName" name="LName" placeholder="Enter Name Log HERE">

        </div>
      </div>

      <div class="form-group">
        <label for="Message" class="col-sm-2 control-label">Message Log:</label>
        <div class="col-sm-7">
           <textarea class="form-control inputstl" rows="10" cols="100" id="LMessage" name="LMessage" placeholder="Enter Message Log HERE"></textarea> 
        </div>
      </div>  
	  


      

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-2">
          <button type="submit" class="btn btn-lg btn-block btn-primary">ADD</button>
        </div>
      </div>
    </form>
   </div> 
<script>
			$('#selphoto').filestyle({
				buttonName : 'btn-primary',
                buttonText : ' Upload an Image',
                iconName : 'glyphicon glyphicon-upload'
			});
</script>   
</body>
</html>

