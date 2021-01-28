<?php 
$severname = "localhost";
$username = "root";
$pass = "";
$dbname = "bankiem";

$conn = mysqli_connect($severname , $username , $pass , $dbname);

if(!$conn){
	die( "ket noi bi loi:" . mysqli_connect_error());
}
else{
	echo " ";
}
