﻿<!DOCTYPE html>
<html>
<head>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src=""></script>
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
		div.head{height: 130px;box-shadow: 0px 0px 8px #000;}
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
	if(document.form1.Cust_name.value == "")
	{
		alert('Please input Customer name');
		document.form1.Cust_name.focus();
		return false;
	}	
	if(document.form1.Status.value == "")
	{
		alert('Please input Status');
		document.form1.Status.focus();		
		return false;
	}	


	if(document.form1.datepicker.value == "")
	{
		alert('Please input Date');
		document.form1.datepicker.focus();		
		return false;
	}	


	if(document.form1.PM_Name.value == "")
	{
		alert('Please input PM Name');
		document.form1.PM_Name.focus();		
		return false;
	}	


	if(document.form1.Sale_Name.value == "")
	{
		alert('Please input Sale Name');
		document.form1.Sale_Name.focus();		
		return false;
	}	


	if(document.form1.Service.value == "")
	{
		alert('Please input Service');
		document.form1.Service.focus();		
		return false;
	}	
	document.form1.submit();
}
</script>

<!--------------------------- check input ---------------------------->

    <div align="center" class="head">
		<div class="head-in">
			<span>
			<a href="index.php"><img src="image/logo.jpg" style="float: left;width: 50%;"></a>
			</span>
			
		</div>
	</div>
<div class="container">
<h1>Input Detail Project Management</h1>
    <form class="form-horizontal" role="form" name="form1" action="process_add.php" method="post" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
      <div class="form-group">
        <label for="name1" class="col-sm-2 control-label">Customer Name :</label>
        <div class="col-sm-4">
          <input type="text" class="form-control inputstl" id="Cust_name" name="Cust_name" placeholder="Enter Customer Name HERE ">
        </div>
      </div>
      <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Customer ID :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control inputstl" id="CID" name="CID" placeholder="Customer ID" size=100>
        </div>
      </div> 
      <label for="lblSO" class="col-sm-2 control-label">SO No :</label>
			
		<div class="col-sm-2">
		  <input type="text" class="form-control inputstl" id="SO" name="SO"  placeholder="Enter SO Name HERE " >
		</div>
    
      <div class="form-group">
          <label for="selphoto" class="col-sm-2 control-label">SO :</label>
            <div class="col-sm-5">
              <input type="file" class="inputstl" id="SOfile" name="sentfile4">
            </div>
        </div>
        <div class="form-group"> 
        <label for="EndDate" class="col-sm-2 control-label">เริ่มสัญญา :</label>
        <div class="col-sm-2">
          <input type="text" class="form-control inputstl" id="datepicker2" name="datepicker2" placeholder="Select Date">
      </div>
	  </div>

	   <div class="form-group">
        <label for="StartCon" class="col-sm-2 control-label">สิ้นสุดสัญญา :</label>
        <div class="col-sm-2">
          <input type="text" class="form-control inputstl" id="datepicker3" name="datepicker3" placeholder="Select Date">
        </div>
      </div>
      <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Customer Contact info :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control inputstl" id="CCI" name="CCI" placeholder="info." size=100>
        </div>
      </div> 
      <div class="form-group">
        <label for="password1" class="col-sm-2 control-label">PM Name :</label>
        <div class="col-sm-5">
        <select class="form-control inputstl" id="PM_Name" name="PM_Name">
            <option>---รอ Assign---</option>
            <option>ฐานิตา ธิช่างทอง (ขิม)</option>
            <option>ภาณุพงศ์ กวดกิจการ (เจมส์)</option>
            <option>พีรวิทย์ จับใจนาย (อัพ)</option>
            <option>ณัฏฐ์ สุวัฒนโฆสานุวัตร (นัท)</option>
            <option>ธนสาร ผิวบาง (ต้น)</option>
            <option>กาญจนา ดวงต๋า (ออม)</option>
            <option>ชมพูนุท เตียนมีผล (มีน)</option>
            <option>วิภาวี บุญญา (มิกกี้)</option>
            <option>มัณฑนา ภูครองทุ่ง (เหมียว)</option>
            <option>พัชณิยา สุขแก้ว (แอ้)</option>
            <!-- กุศรินทร์ วงษ์มานิตย์ (กุ๊กกู๋)
            พัฒณิศา ศรีชุ่มสิน (ดาด้า)
            ธนากร ปล้องอ่อน (ปิง)
            พุฒิพงศ์ ม่วงนวล (อาร์ต)
            ศิรภัสสร พันธ์ดี (ตุ๊กตา)
            ณัฐวัตร จ่อนดี (มิ้นท์) -->
        </select>
          
        </div>

       <!-- <div class="col-sm-5">
          <input type="text" class="form-control inputstl" id="PM_Name" name="PM_Name" placeholder="Enter PM Name HERE">
        </div>-->
      </div>

      <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Sale Name :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control inputstl" id="Sale_Name" name="Sale_Name" placeholder="Enter Sale Name HERE" size=100>
        </div>
      </div>  
	  
	   <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Pre-Sale Name :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control inputstl" id="Pre_Sale" name="Pre_Sale" placeholder="Enter Pre-Sale Name HERE">
        </div>
      </div>   

      
	        <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Service :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control inputstl" id="Service" name="Service" placeholder="Ex. Cloud[HP]+ Link VRF + Colo[TST]">
        </div>
      </div>  
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
      <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Service type :</label>
        <div class="col-sm-5">
          <input type="checkbox" id="service1" name="service1" value="PM" onclick="PMOnclick()">
          <label for="vehicle1">PM</label>
          <input type="checkbox" id="service2" name="service2" value="MNSP" onclick="MNSPOnclick()"> 
          <label for="vehicle2">MNSP</label>
          <input type="checkbox" id="service3" name="service3" value="report" onclick="REOnclick()">
          <label for="vehicle3">report</label>
          <input type="checkbox" id="service4" name="service4" value="BCP" onclick="BCPOnclick()">
          <label for="vehicle3">BCP</label>
        </div>
      </div> 
      <div id = "BCP" class="form-groub" style = "display:none">
      <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Data of BCP :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control inputstl" id="Data" name="Data" placeholder="Data" size="300">
        </div>
      </div> 
      </div>
      <div id = "report" class="form-groub" style="display:none">
      <!--------------------------- datepicker ---------------------------->
	  <script>
  $( function() {
    $( "#datepicker4" ).datepicker();
  } );
  </script>
<!--------------------------- datepicker ---------------------------->

        <div class="form-group">
          <label for="DueDate" class="col-sm-2 control-label">Report :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control inputstl" id="datepicker4" name="datepicker4" placeholder="Select Date">(วันที่กำหนดส่ง report)
            </div>
        </div>
        <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Detail :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control inputstl" id="Owner" name="Owner" placeholder="Detail" size=100>
        </div>
      </div> 
      </div>
      <div id = "MNSP" class="form-groub" style="display:none">
        <div class="form-group">
          <label for="selphoto" class="col-sm-2 control-label">Diagram :</label>
            <div class="col-sm-5">
              <input type="file" class="inputstl" id="selphoto1" name="sentfile1">
            </div>
        </div>
        <div class="form-group">
          <label for="selphoto" class="col-sm-2 control-label">Monitor :</label>
            <div class="col-sm-5">
              <input type="file" class="inputstl" id="Monitor" name="sentfilemonitor">
            </div>
        </div>
      </div>
      <div id= "PM" class="form-group" style="display:none">
      <div class="form-group">
        <label for="selphoto" class="col-sm-2 control-label">Diagram :</label>
        <div class="col-sm-5">
          <input type="file" class="inputstl" id="selphoto1" name="sentfile1">
        </div>
      </div>

	        <div class="form-group">
        <label for="selphoto" class="col-sm-2 control-label">Confirm UAT (Customer&Sales) :</label>
        <div class="col-sm-5">
          <input type="file" class="inputstl" id="selphoto2" name="sentfile2">
        </div>
      </div>

	  	        <div class="form-group">
        <label for="selphoto" class="col-sm-2 control-label">UAT :</label>
        <div class="col-sm-5">
          <input type="file" class="inputstl" id="selphoto3" name="sentfile3">
        </div>
      </div>

        <div class="form-group">
        <label for="gender1" class="col-sm-2 control-label">Status :</label>
        <div class="col-sm-2">
        <select class="form-control inputstl" id="Status" name="Status">
          <option>in progress</option>
          <option>UAT</option>
          <option>complete</option>
          <option>hold</option>
          <option>Cancel</option>
          <option>Terminate</option>
          <option>Waiting Customer</option>
          <option>Waiting Revise SO</option>
        </select>
          
        </div>
		
      </div>  
<!--------------------------- datepicker ---------------------------->
	  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<!--------------------------- datepicker ---------------------------->
<!--------------------------- datepicker ---------------------------->
	  <script>
  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
  </script>
<!--------------------------- datepicker ---------------------------->
<!--------------------------- datepicker ---------------------------->
	  <script>
  $( function() {
    $( "#datepicker3" ).datepicker();
  } );
  </script>
<!--------------------------- datepicker ---------------------------->

      <div class="form-group">
        <label for="DueDate" class="col-sm-2 control-label">Due date :</label>
        <div class="col-sm-2">
          <input type="text" class="form-control inputstl" id="datepicker" name="datepicker" placeholder="Select Date">
        </div>
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
function PMOnclick() {
    var checkBox = document.getElementById("service1");
    var text = document.getElementById("PM");
    if (checkBox.checked == true){
      text.style.display = "block";
    } 
    else {
      text.style.display = "none";
    } 
}
function MNSPOnclick() {
    var checkBox2 = document.getElementById("service2");
    var text2 = document.getElementById("MNSP");
    if (checkBox2.checked == true){
      text2.style.display = "block";
    } 
    else {
      text2.style.display = "none";
    }
}
function REOnclick() {
    var checkBox2 = document.getElementById("service3");
    var text2 = document.getElementById("report");
    if (checkBox2.checked == true){
      text2.style.display = "block";
    } 
    else {
      text2.style.display = "none";
    }
}
function BCPOnclick() {
    var checkBox2 = document.getElementById("service4");
    var text2 = document.getElementById("BCP");
    if (checkBox2.checked == true){
      text2.style.display = "block";
    } 
    else {
      text2.style.display = "none";
    }
}
</script>   
</body>
</html>

