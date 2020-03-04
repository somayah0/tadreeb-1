<?php
session_start();
?>

<html>
<head>
 <meta charset = "utf-8">
<title>Javascript Login Form Validation</title>
<!-- Include CSS File Here -->
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<!-- Include JS File Here -->

<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style_form.css">
</head>
<body>

                        <?php
						   
                           $conn = mysqli_connect("localhost","root","" , "tadreeb");


							// If form submitted, insert values into the database.
							if (isset($_POST['submit'])){
							    // removes backslashes
								
								$username = $_POST['username'];
							    $password = $_POST['password'];
								
								$_SESSION['username'] = $username;
								
								// Trainees
								$sql1="SELECT * FROM `trainess` WHERE username='$username' and password='$password'";
								
								$result1= mysqli_query($conn,$sql1) or die(mysqli_error());

								// Mysql_num_row is counting table row
								$count1=mysqli_num_rows($result1);
								
								
								//  workshops providers
								
								$sql2="SELECT * FROM `workshop_provider` WHERE username='$username' and password='$password'";
								
								$result2= mysqli_query($conn,$sql2);

								// Mysql_num_row is counting table row
								$count2=mysqli_num_rows($result2);
					
					
					
								if($count1==1)
								{

									$row1 = mysqli_fetch_assoc($result1);
									
									
									echo "<script type='text/javascript'>window.top.location='home.php';</script>"; exit;
	
								}
								else if($count2==1)
								{

									$row2 = mysqli_fetch_assoc($result2);
									
									
									echo "<script type='text/javascript'>window.top.location='home.php';</script>"; exit;
	
								}
								else
								{
									echo "<div class='form'><h3>Username/Password incorrect, please try again.</h3></div>";
								}
								

							}
									
						?>  

</body>
</html>