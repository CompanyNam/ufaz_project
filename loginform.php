<?php
 include("head.html");
 // include("header.html");
 include("navbar.php");
?>
<form method="POST" action="login.php" id="form">
	<h2 style="text-align: center;">Login Form</h2>
<div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
 </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" >
 </div>
<input type="Submit" name="Submit">
<a href="registerform.php">If not registered yet please register</a>
</form>
</body>

<?php
 include("footer.html");
?>


 <!-- <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
 </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" >
 </div> -->
	
