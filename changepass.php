
<?php
session_start();
$_SESSION["username"] = "1";
$user='root';
    $pass='';
    $db='tadreeb';
    $mysql= new mysqli('localhost',$user,$pass,$db) or die( "Could not connect to database " );

if (count($_POST) > 0) {
    $result = mysqli_query($mysql, "SELECT *from workshop_provider WHERE username='" . $_SESSION["username"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($mysql, "UPDATE username set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
?>


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style_form.css">

        <title>change password</title>
      
        <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>

<script>
    function validatePassword() {
    var currentPassword,newPassword,confirmPassword,output = true;
    
    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;
    
    if(!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
    }
    else if(!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = "required";
        output = false;
    }
    else if(!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "required";
        output = false;
    }
    if(newPassword.value != confirmPassword.value) {
        newPassword.value="";
        confirmPassword.value="";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "not same";
        output = false;
    } 	
    return output;
    }
    </script>
</head>
<body>
    <div class="topnav">
        <img src="logo.png" alt="Simply Easy Learning" width="120" height="outo" align="center" >

        
       </div>
       <form method="post"  action="" name="frmChange" onSubmit="return validatePassword()">
       <div class="message"> <?php if(isset($message)) { echo $message; } ?></div>

       <div class="content">       
<span id="result"></span>


<div class="footer"> <p>تفاصيل التواصل  </p></div>
  </body>
  </html>