<?php
error_reporting(0);
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<link rel="icon" href="image/fevicon.png">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto:400,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style type="text/css">
		body{
			margin-top: 0px;
		}
		.register_container{
			min-width: 100%;
			min-height: 100vh;
			padding-top: 140px;
			background: -moz-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* ff3.6+ */
			background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(52,235,233,1)), color-stop(100%, rgba(208,255,174,1))); /* safari4+,chrome */
			background: -webkit-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* safari5.1+,chrome10+ */
			background: -o-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* opera 11.10+ */
			background: -ms-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* ie10+ */
			background: linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* w3c */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d0ffae', endColorstr='#34ebe9',GradientType=1 ); /* ie6-9 */
		}

		.register_card{
			min-width: 400px;
			max-width: 400px;
			min-height: 450px;
			
			background-color: white;
			border-radius: 4px;
			box-shadow: 0px 10px 15px 2px rgba(0,0,0,0.2);
		}
	</style>
</head>
<body>

  <?php
  require('nav.html');
  ?>


  
    	<div class="register_container">
	    	<center>
	    		<div class="register_card">
	    			<div style="font-size: 20pt; padding-top: 50px; color: rgba(0,0,0,0.6); padding-bottom: 20px"><i class="fa fa-lock" aria-hidden="true"></i> Register</div>

	    			<div style="max-width: 320px">
	    			<form method="post" action="register_script.php">
                        <input type="text" name="name" placeholder="Name" required class="form-control" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; min-height: 50px; border-left-color: #f492ac; border-top-color: #f492ac; border-right-color: #f492ac">
	    				<input type="text" name="username" placeholder="Username" required class="form-control" style="border-radius: 0px ;min-height: 50px; border-left-color: #f492ac; border-right-color: #f492ac">
                        <input type="password" name="password" placeholder="Password" required class="form-control" style="border-radius: 0px ;min-height: 50px; border-left-color: #f492ac; border-right-color: #f492ac">
                        <input type="password" name="conf_password" placeholder="Confirm Password" required class="form-control" style="border-radius: 0px ;min-height: 50px; border-left-color: #f492ac; border-right-color: #f492ac">
	    				<input type="number" name="phone" placeholder="Phone" required class="form-control" style="border-top-left-radius: 0px; border-top-right-radius: 0px; min-height: 50px; border-left-color: #f492ac; border-right-color: #f492ac; border-bottom-color: #f492ac">
	    				<br>
	    				<input type="submit" name="submit" value="REGISTER"  style="min-height: 50px; background-color: #ef5585; color: #fff; border: 0px solid white; min-width: 320px; border-radius: 3px; font-size: 10pt; font-weight: 600">
	    			</form>
	    			<br><div style="font-size: 10pt;">Have an account? <a href="login.php" style="color: #8869a6">Login here</a></div>
	    			</div><br>
			
	    		</div>
	    	</center>
    	</div>
    



</body>
</html>