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
      <a class="navbar-brand" href="#">Uchhal Ads</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="dashboard.php"><center><i class="fa fa-home"> Dashboard</i></center></a></li>
        <li><a href="manage_distributor.php"><center><i class="fa fa-user"></i> Manage Distributor</i></center></a></li>
        <li class="active"><a href="manage_customer.php"><center><i class="fa fa-users"> Manage Customer</i></center></a></li>
        <li><a href="collection_Amt.php"><center><i class="fa fa-money"> Collection</i></center></a></li>
        </li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-circle-o"> <?php echo $_SESSION['name'] ?></i> 
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="profile.php"><i class="fa fa-address-card"> Profile</i></a></li>
          <li><a href="setting.php"><i class="fa fa-cog"> Setting</i></a></li> 
          <li><a href="support.php"><i class="fa fa-envelope"> Support</i></a></li>
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
      <nav class="navbar navbar-default ">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li><a href="#" id="view">View Customer</a></li> 
            </ul>
            <!-- <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul> -->
            <form class="navbar-form navbar-right">
              <div class="form-group col-sm-1">
                <input type="text" class="form-control" width="" id="search" placeholder="Search">
              </div>
            </form>
          </div>
       </nav> 
    </div>
    <div class="container view" id="viewing">
        
    </div>
  </div>
  <br>
    
</div>
    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>
</body>
</html>
<script type="text/javascript">
    $(function(){
         $.get("manage_customer_c.php",function(data){
            $("#viewing").html(data);
         });
      });
      $("#search").keyup(function(){
              var search = $("#search").val();
              $.get("manage_customer_c.php",{search:search},function(data){
                $("#viewing").html(data);
             });
          });

    $("#adding").hide();
    $("#view").click(function(){
        $("#adding").hide();
        $("#viewing").show();
    })
    $("#add").click(function(){
        $("#adding").show();
        $("#viewing").hide();
    })
</script>