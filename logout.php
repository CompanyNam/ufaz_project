<?php
// if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
//     nonloged();
//   }else{
//     loged();
//   }
session_start();
header('Location: data_see.php');


$_SESSION["authenticated"]="";

$_SESSION["user"]="";
?>