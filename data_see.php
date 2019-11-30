<?php
 include("head.html");
 // include("header.html");
 include("navbar.php");
?>


<body>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https:////cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script>$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>
<style type="text/css">
	tr{
    
    background-color: #343a40 !important;
	}
</style>

<?php
function nonloged(){
		$host="localhost";
		$user="root";
		$passwd="";
		$bd="ufaz_project";
		$link=mysqli_connect($host,$user,$passwd,$bd);
		mysqli_set_charset($link,"utf8");
if(mysqli_connect_errno()){
	echo "Error ".mysqli_connect_errno()."MSG".mysqli_connect_error();

}else{


	$querry="SELECT accounting.accountingType,categories.category,payments.paymentMethod,transactions.transactionAmount,transactions.transactionDate,transactions.idTransaction FROM accounting,transactions,categories,payments WHERE transactions.idCategory=categories.idCategory and categories.idAccounting=accounting.idAccounting and transactions.idPayment=payments.idPayment";

 

if (!mysqli_query($link,$querry)){

  die('Error: ' . mysqli_error($link));

  }else{
  	echo '<table class="table table-dark" id="myTable">
    
	<thead>
    <tr>
      <th scope="col">accounting</th>
      <th scope="col">category</th>
      <th scope="col">paymentMethod</th>
      <th scope="col">transactionAmount</th>
      
      <th scope="col">transactionDate</th>
      <th scope="col">idTransaction</th>
      
    </tr>
  </thead>
  ';
$RESULT=mysqli_query($link,$querry);

while ($var=mysqli_fetch_assoc($RESULT)) {
	extract($var);
	echo "<tr>";
      echo '<th scope="row">'. $accountingType .'</th>';
      echo '<th scope="row">'. $category .'</th>';
      echo '<th scope="row">'. $paymentMethod .'</th>';
      echo '<th scope="row">'. $transactionAmount .'</th>';
      echo '<th scope="row">'. $transactionDate .'</th>';
      echo '<th scope="row">'. $idTransaction .'</th>';
     

            
    echo "</tr>";
	 

  }




  }

  echo "</tbody></table>";


 include("footer.html");
}
}
function loged(){
    $host="localhost";
    $user="root";
    $passwd="";
    $bd="ufaz_project";
    $link=mysqli_connect($host,$user,$passwd,$bd);
    mysqli_set_charset($link,"utf8");
if(mysqli_connect_errno()){
  echo "Error ".mysqli_connect_errno()."MSG".mysqli_connect_error();

}else{

$us=$_SESSION["user"];
$expense=0;
$income=0;
  $querry='SELECT accounting.accountingType,categories.category,payments.paymentMethod,transactions.transactionAmount,transactions.transactionDate,transactions.idTransaction,transactions.idUser FROM accounting,transactions,categories,payments WHERE transactions.idCategory=categories.idCategory and categories.idAccounting=accounting.idAccounting and transactions.idPayment=payments.idPayment and transactions.idUser="'.$us.'"'  ;

 

if (!mysqli_query($link,$querry)){

  die('Error: ' . mysqli_error($link));

  }else{
    echo '<table class="table table-dark" id="myTable style="width:500px;">
    
  <thead>
    <tr>
      <th scope="col">accounting</th>
      <th scope="col">category</th>
      <th scope="col">paymentMethod</th>
      <th scope="col">transactionAmount</th>
      
      <th scope="col">transactionDate</th>
      <th scope="col">idTransaction</th>
      <th scope="col">idUser</th>
      
    </tr>
  </thead>
  <tbody>';
$RESULT=mysqli_query($link,$querry);
while ($var=mysqli_fetch_assoc($RESULT)) {
  extract($var);
  echo "<tr>";
      echo '<th scope="row">'. $accountingType .'</th>';
      echo '<th scope="row">'. $category .'</th>';
      echo '<th scope="row">'. $paymentMethod .'</th>';
      echo '<th scope="row">'. $transactionAmount .'</th>';
      echo '<th scope="row">'. $transactionDate .'</th>';
      echo '<th scope="row">'. $idTransaction .'</th>';
      echo '<th scope="row">'. $idUser .'</th>';

     

            
    echo "</tr>";
    if($accountingType=="expense"){
      $expense=$expense+$transactionAmount;
    }elseif ($accountingType=="income") {
      $income=$income+$transactionAmount;
    }
  }




  }

  echo "</tbody></table>";

echo "<h5>YOUR TOTAL INCOME Transaction Amount:<h5><span>".$income."<span></br> ";
echo "<h5>YOUR TOTAL Expense Transaction Amount:<h5><span>".$expense."<span></br> ";

 include("footer.html");
}
}
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    nonloged();
  }else{
    loged();
  }

?>

</body>