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

$username=$_POST['username'];
$password=$_POST['password'];
	$sql='SELECT user.username,user.password,user.id from user Having username="'.$username.'" and password="'.$password.'"';

$results= mysqli_query($link, $sql);

while($result = mysqli_fetch_assoc($results)) {
	extract($result);

	$userID=$id;
	
   
}



if (!mysqli_query($link,$sql)){

  die('Error: ' . mysqli_error($link));
}else{
if(mysqli_num_rows(mysqli_query($link,$sql))>=1){
session_start();
            $_SESSION["authenticated"] = 'true';
            $_SESSION["user"] = $userID ;
            header('Location: data_see.php');
echo "<p></p>";
 }elseif(mysqli_num_rows(mysqli_query($link,$sql))==0){
 	 header("Location: registerform.php");

     $_SESSION['login'] = "Login succesfully completed";
 }
}
mysqli_close($link);
}




?>
<?php
 include("footer.html");
?>
