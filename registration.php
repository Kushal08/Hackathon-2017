<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Rajasthan Hackathon 3.0 Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
	
		$username = stripslashes($_POST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$pass =  md5($password);	

        $query = "INSERT INTO userinfo (username, y)
VALUES ('$username','$pass')";

        $result = mysqli_query($con, $query) or die(mysqli_error($con));


        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }

	
	

    }?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
<br /><br />

</div>
</body>
</html>
