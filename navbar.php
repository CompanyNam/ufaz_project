
<nav class="navbar navbar-expand-lg navbar-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="background-color: #443575;border-radius: 2%;">

    <div class="logo">
      <h2>CHALABI</h2><p>Technology Science</p>
    </div>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="transform.php">Add transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="data_see.php" tabindex="-1" >List of transactions</a>
      </li>
   
    

      <?php
      session_start();
      if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
     echo'<li class="nav-item">
        <a class="nav-link " href="loginform.php" tabindex="-1" >Login</a>
      </li>';
   }else{
     echo'<li class="nav-item">
        <a class="nav-link " href="logout.php" tabindex="-1" >Logout</a>
      </li>';
   }
   ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
