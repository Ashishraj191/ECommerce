<?php 
   session_start();
   if (!isset($_SESSION["uid"])) {
      header("Location: loginPage/login.php");
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/all.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
  <style>
   
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="dashboard.php"><center><i class="fa fa-home"> Dashboard</i></center></a></li>
        <li><a href="manage_distributor.php"><center><i class="fa fa-user"></i> Manage Distributor</i></center></a></li>
        <li><a href="manage_customer.php"><center><i class="fa fa-users"> Manage Customer</i></center></a></li>
        <li><a href="collection_Amt.php"><center><i class="fa fa-money"> Collection</i></center></a></li>
        </li>
        <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-circle-o"> <?php echo $_SESSION['name'] ?></i> 
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="profile.php"><i class="fa fa-address-card"> Profile</i></a></li>
          <li><a href="setting.php"><i class="fa fa-cog"> Setting</i></a></li>
          <li class="active"><a href="support.php"><i class="fa fa-envelope"> Support</i></a></li>
          <li><a href="loginPage/logout.php"><i class="fa fa-user-circle-o"> Logout</i></a></li>
        </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <!-- <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div> -->
    <div class="col-sm-12 text-left"> 
      <h1>Welcome</h1>
      <p>To Dashboard</p>
      <hr>
      <h3>Ashish</h3>
      <p></p>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>

