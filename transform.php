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


function logedin(){
global $link;
if(mysqli_connect_errno()){
	echo "Error ".mysqli_connect_errno()."MSG".mysqli_connect_error();

}else{
	$SELECT1="SELECT paymentMethod,idPayment FROM `payments`";

	$RESULT1=mysqli_query($link,$SELECT1);

	$SELECT2="SELECT category,idCategory FROM `categories`";

	$RESULT2=mysqli_query($link,$SELECT2);

	$SELECT3="SELECT accountingType,idAccounting FROM `accounting`";

	$RESULT3=mysqli_query($link,$SELECT3);


	







echo '
<body>
	<section class="container">


	<h1 style="text-align:center;">Create New Transaction</h1>
	<form method="POST" action="validate.php" id="form" class="formfortrans">
	<div class="form-group">
    <label for="amount">Add Amount:</label>
	<input type="number"  min="0" name="amount" class="amount form-control" id="amount">
	</div>
	<div class="form-group">
    <label for="date">Add Date:</label>
	<input type="date" id="date" class="form-control" name="datetrans">
	</div>

	
	
';
echo '<div class="form-group">
    <label for="payment">Payment Method:</label><select id="payment" name="payment" class="form-control">';
	while ($var=mysqli_fetch_assoc($RESULT1)) {
				extract($var);
				
			      
				echo '<option value="'.$idPayment.'">'.$paymentMethod.'</option>';
				}
					  		  
echo "</select></div>";

echo '<div class="form-group">
    <label for="payment">Payment Method:</label><select name="category" id="category" class="form-control">';
	while ($var=mysqli_fetch_assoc($RESULT2)) {
				extract($var);
				
			      
				echo '<option value="'.$idCategory.'">'.$category.'</option>';
				}
	echo "</select></div>";



	  
			  
	echo "
	<input type='SUBMIT' style='margin-top:15px;height:30px;width:150px;border-radius:2px;background:green;border:green;'>

	</section>";


}

}
function logedout(){
	header("Location: loginform.php");
}
if(empty($_SESSION["authenticated"]) || !$_SESSION["authenticated"]){
	logedout();
}else{
		
	logedin();		
} 
?>
<?php
 include("footer.html");
?>
