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
$day=date('Y-m-d', strtotime($_POST['datetrans']));
	$sql="INSERT INTO transactions (transactionAmount,transactionDate,idCategory,idPayment,idUser )

VALUES

('$_POST[amount]','$day','$_POST[category]','$_POST[payment]','$_SESSION[user]')";




if (!mysqli_query($link,$sql)){

  die('Error: ' . mysqli_error($link));

  }else{

echo '<h1>Your transaction record have been added successfully</h1>
<p>Our team is in your It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. </p>';

 

mysqli_close($link);
}



}
?>
<?php
 include("footer.html");
?>