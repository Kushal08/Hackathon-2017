<html>
<head>
<style>
.button {
    padding: 10px 25px 8px; color: #fff; background-color: #0067ab; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 2px; margin-top: 10px; cursor:pointer;
    hover {background-color: #024978;}
}
</style>

<meta charset="utf-8">
<title>Rajasthan Hackathon 3.0 Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body >



<?php

function expmod( $base, $exp, $mod ){
  if ($exp == 0) 
	return 1;
  if ($exp % 2 == 0){
    return pow( expmod( $base, ($exp / 2), $mod), 2) % $mod;
  }
  else {
    return ($base * expmod( $base, ($exp - 1), $mod)) % $mod;
  }
}


	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_GET['c'])){

		$c = $_GET['c'];
		$zx = $_GET['zx'];
		$username = $_GET['uname'];
		$atoken = $_GET['atoken'];
		
		
        $query = "SELECT * FROM userinfo WHERE username='$username'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);

        if($rows>0){
       	   $xw1 =mysqli_fetch_assoc($result);
       	   		$_SESSION['username'] = $username;

			$y = $xw1['y'];
			$g0 = 5;
			$T1 = expmod($y,$c,97);
			$T2 = expmod(5,$zx,97);
			$final =expmod(($T1*$T2),1,97);
			$concat = (string)$y+(string)$final+(string)$atoken;
	
			$hash = md5($concat);
			$c1 = expmod(hexdec((string)$hash),1,97);
			
			if($_GET['Y'] == $y)
				{
					header('Location: index1.php');

            }else{
				echo "<div class='form'><br><br><h3>Zero Knowledge Authentication failed.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }
    }
?>
</div>
</body>
</html>


