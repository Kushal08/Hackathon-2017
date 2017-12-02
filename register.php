<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Rajasthan Hackathon 3.0 Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_GET['uname'])){
	
		$username = stripslashes($_GET['uname']); // removes backslashes
		$username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
$myphpvariable = isset($_GET['id']) ? $_GET['id'] : '';
		$pass =  $myphpvariable;	

        $query = "INSERT INTO userinfo (username, y)
VALUES ('$username','$pass')";

        $result = mysqli_query($con, $query) or die(mysqli_error($con));


        if($result){
        	$x = mt_rand();
        	
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php?atoken=".$x."'>Login</a></div>";
        }

	
	

    }?>
