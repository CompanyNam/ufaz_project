<?php
 include("head.html");
 // include("header.html");
 include("navbar.php");
?>

<form method="POST" action="register.php" id="form">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<div class="form-group">
    <label for="username">Enter Username</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
</div>


<div class="form-group">
    <label for="password">Create Password:</label>
    <input type="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Password" name="pass1">
</div>


<div class="form-group">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" class="form-control" id="confirm_password" aria-describedby="emailHelp" placeholder="Confirm Password" name="pass2">
</div>

<p id='message' style="text-align: center;"></p>


<script type="text/javascript">
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val() && $('#password').val()!="") {
    $('#message').html('Matching').css('color', 'green');
    $( '#form' ).append( "<input type='Submit'></input>" );
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});


</script>






</form>
</body>

<?php
 include("footer.html");
?>

	
	
