<?php 
   session_start();
   if (!isset($_SESSION["d_uid"])) {
      header("Location: loginPage/login.php");
   }
   include '_dbconnection.php';
   $did = $_SESSION["id"];
   $product_limit = $_SESSION['product_limit'];
   $name = $_SESSION["name"];
   $d_uid = $_SESSION["d_uid"];
   $mobile = $_SESSION["mobile"];
   $membership_id = $_SESSION["membership_id"];
   $query = mysqli_query($conn,"select payment_status from manage_distributer where id = '".$did."'");
   $row = mysqli_fetch_array($query);
   $payment_status = $row["payment_status"];

   $month = date("m");
   $year = date("Y");
   include 'functions.php';

 ?>

 </script>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uchhal Ads - www.uchhalads.in</title>
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
        <li class="active"><a href="dashboard.php"><center><i class="fa fa-home"></i> Dashboard</center></a></li>
        <li><a href="manage_product.php"><center><i class="fa fa-dropbox"> Manage Product</i></center></a></li>
        <li><a href="leads.php"><center><i class="fa fa-money"> Leads</i></center></a></li>
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
<?php if($payment_status != "success"){?>
  <div class="container" style="margin-top: 10px;">
    <center>
      <form action="payment.php" method="post">
        <div style="margin:3px;padding:3px; background-color:rgb(241, 193, 193); border-radius: 10px;">
          <span style="font-size: 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-right: 8px;">Pay and activate</span>
          <input name="activate" hidden>
          <button type="submit" class="btn btn-info">Activate</button>
        </div>
      </form>
    </center>
  </div> 
<?php }?>
<div class="container" style="margin-top: 10px;">
      <div style="height: 150px; border-radius: 5px;padding: 10px;"class="col-md-3">
        <div style="width: 100%; height: 100%; background-image: linear-gradient(to right,  #7fb1f3,   #046bf1);border-radius: 5px;">
          <div style="padding: 5px 20px;color: #fff;">Product <i class="fa fa-list"></i></div>
          <div style="border: .5px solid lightgray;"></div>
          <h3 style="padding: 20px;padding-bottom: 0;color: #fff;"><?php totalProductAdded($conn,$did)?>/<?php echo $product_limit;?></h3>
          <a href="" style="float: right;margin-right: 15px;color: #fff;"><i class="fa fa-eye"> View More</i></a>
        </div>
      </div>
      <div style="height: 150px; border-radius: 5px;padding: 10px;"class="col-md-3">
        <div style="width: 100%; height: 100%; background-image: linear-gradient(to right,  #046bf1,   #867af8);border-radius: 5px;">
          <div style="padding: 5px 20px;color: #fff;">Total Leads <i class="fa fa-user"></i></div>
          <div style="border: .5px solid lightgray;"></div>
          <h3 style="padding: 20px;padding-bottom: 0;color: #fff;"><?php totalEnquiry($conn,$did)?></h3>
          <a href="" style="float: right;margin-right: 15px;color: #fff;"><i class="fa fa-eye"> View More</i></a>
        </div>
      </div>
      <div style="height: 150px; border-radius: 5px;padding: 10px;"class="col-md-3">
        <div style="width: 100%; height: 100%; background-image: linear-gradient(to right,  #046bf1,   #7fb1f3);border-radius: 5px;">
          <div style="padding: 5px 20px;color: #fff;">Current Leads  <i class="fa fa-user"></i></div>
          <div style="border: .5px solid lightgray;"></div>
          <h3 style="padding: 20px;padding-bottom: 0;color: #fff;"><?php thisMonthEnquiry($conn,$did,$month,$year)?></h3>
          <a href="" style="float: right;margin-right: 15px;color: #fff;"><i class="fa fa-eye"> View More</i></a>
        </div>
      </div>
      <div style="height: 150px; border-radius: 5px;padding: 10px;"class="col-md-3">
        <div style="width: 100%; height: 100%; background-image: linear-gradient(to right,  #046bf1,   #867af8);border-radius: 5px;">
          <div style="padding: 5px 20px;color: #fff;">Support</div>
          <div style="border: .5px solid lightgray;"></div>
          <h3 style="padding: 20px;padding-bottom: 0;color: #fff;">00</h3>
          <a href="" style="float: right;margin-right: 15px;color: #fff;"><i class="fa fa-eye"> View More</i></a>
        </div>
      </div>
    </div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>

