<?php
session_start();
include("connect_db.php");
// echo $_POST["num_id"];
if (isset($_POST["pwd"])){
    $password = $_POST["pwd"];
    $password = strip_tags(mysqli_real_escape_string($conn,trim($password)));
    
    $sqlAUTH = "SELECT * FROM users";
    $queryAUTH = mysqli_query($conn,$sqlAUTH);
    if(mysqli_num_rows($queryAUTH)>0){
        //ทำloopเผื่อในอนาคตมีจะemailและมีรหัสมากกว่า 1อัน
        $row = mysqli_fetch_array($queryAUTH);
        $password_hash = $row["Password"];
        if(password_verify($password,$password_hash)){
            // password is matched 
            if (isset( $_POST["num_id"])) {
                $id =  $_POST["num_id"];
                mysqli_query($conn, "DELETE FROM pm_mnsp WHERE Num_ID=$id");
                $_SESSION["message"] = "Already Deleted!";
                unset($_SESSION['matched']);
                // echo $_SESSION['matched'];
                // exit('sss');
                header("location: index.php");
            }
        }
        else{
            unset($_SESSION['message']);
            $answer  ="Incorrect Password Matched!";
            $_SESSION['matched']= $answer;
            header("location: index.php?id=".$_POST["num_id"]);
            // echo $answer;
            // echo  $_SESSION['matched'];
        }
    }

    else{
        echo "Please input agian";
    }    
}
mysqli_close($conn);
?>