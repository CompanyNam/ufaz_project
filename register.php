<?php
 include("head.html");
 // include("header.html");
 include("navbar.php");
?>
<?php
$host="localhost";
$user="root";
$passwd="";
$bd="ufaz_project";
$link=mysqli_connect($host,$user,$passwd,$bd);
mysqli_set_charset($link,"utf8");

if(mysqli_connect_errno()){
	echo "Error ".mysqli_connect_errno()."MSG".mysqli_connect_error();

}else{

$username=mysqli_real_escape_string($link,$_POST['username']);
$password1=mysqli_real_escape_string($link,$_POST['pass1']);
$password2=mysqli_real_escape_string($link,$_POST['pass2']);
$sql="INSERT INTO user (username,password)

VALUES

('$username','$password1')";





if (!mysqli_query($link,$sql)){

  die('Error: ' . mysqli_error($link));
}else{
	$_SESSION['login'] = "Registration succesfully completed";
	header("Location: home.php");
	
    
 
 }
mysqli_close($link);
}




?>
<?php
 include("footer.html");
?>