<?php
    session_start(); //khởi tạo session
    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    	include( '../inc/conn.php' );
    	$username = $_POST['username'];
    	$password = $_POST['pass'];
    	$user = mysqli_fetch_assoc(mysqli_query( $conn , "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}' ") );
    	if($user){
    		//lưu thông tin của người dùng vào session
    		$_SESSION['user'] = $user['username'];
    		header('location:index.php'); //đưa người dùng về trang index
    		die;
        }
    		else{
    			echo " Sai thông tin tài khoản! ";
    		}
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class = "login">
    <h2>Login</h2>
	<form method = "POST">
	 <label for="username"> User name </label></br>
       <input type="text" name="username" value="" id="uname"></br>
     <label for="password"> Password </label></br>
       <input type="password" name="pass" value="" id="pass"></label></br>
       <input type="submit" value="OK">
       <input type="reset" name="reset" value="Reset">
    </div>
	</form>

</body>
</html>