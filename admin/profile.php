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
          <li  class="active"><a href="profile.php"><i class="fa fa-address-card"> Profile</i></a></li>
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
              <li><a href="#" id="view">View Profile</a></li> 
              <li><a href="#" id="edit">Edit Profile</a></li> 
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
       <div class="container" id="adding">
            <h3 id="profile">Profile</h3>
            <h3 id="edit_profile">Edit Profile</h3>
                         <?php 
                              include '_dbconnection.php';
                              $result = mysqli_query($conn,"select *from admin where id = '".$_SESSION["id"]."'");
                              $row = mysqli_fetch_array($result);
                            ?>
          <form>
            <div class="col-sm-4" hidden>
                <div class="form-group">
                    <label for="ex1">id</label>
                    <input class="form-control" type="text" id="id" value="<?php echo $row['id']; ?>"  disabled>
                </div>
           </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="ex1">Name</label>
                    <input class="form-control" type="text" id="name" value="<?php echo $row['name']; ?>"  disabled>
                </div>
           </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="ex1">Mobile No</label>
                    <input class="form-control" type="text" id="mobile_no" value="<?php echo $row['mobile_no']; ?>" disabled>
                </div>
           </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="ex1">Email</label>
                    <input class="form-control" type="text" id="email" value="<?php echo $row['email']; ?>" disabled>
                </div>
           </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="ex1">Address</label>
                    <input class="form-control" type="text" id="address" value="<?php echo $row['address']; ?>" disabled>
                </div>
           </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="ex1">City</label>
                    <input class="form-control" type="text" id="city" value="<?php echo $row['city']; ?>" disabled>
                </div>
           </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>State <span class="text-danger">*</span> </label>
                    <select class="form-control select" id="state" value="<?php echo $row['state']; ?>" disabled>
                        <option>Select</option>
                        <option>BCA</option>
                        <option>MCA</option>
                        <option>B Tech</option>
                    </select>
                </div>
            </div>

            <center>
                <input type="button"  class="btn btn-success" id="update" value="Update">
                <input type="button"  class="btn btn-warning" value="Clear"><br>
                <div id="alert" style="color: red;"></div>
            </center>
           
          </form>
        </div>   
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
    $("#edit_profile").hide();
     $(".btn").hide();
    $("#view").click(function(){
        $("#edit_profile").hide();
        $("#profile").show();
        $(".btn").hide();
        $("#search").show();
    })
    $("#edit").click(function(){
        $("#edit_profile").show();
        $("#profile").hide();
         $(".btn").show();
         $("#search").hide();
    })
  $("#edit").click(function(){
        $( "#mobile_no" ).prop( "disabled", false );
        $( "#email" ).prop( "disabled", false );
        $( "#address" ).prop( "disabled", false );
        $( "#city" ).prop( "disabled", false );
        $( "#state" ).prop( "disabled", false );

  });
  $("#view").click(function(){
        $( "#name" ).prop( "disabled", true );
        $( "#mobile_no" ).prop( "disabled", true );
        $( "#email" ).prop( "disabled", true );
        $( "#address" ).prop( "disabled", true );
        $( "#city" ).prop( "disabled", true );
        $( "#state" ).prop( "disabled", true );
        $( "#alert" ).hide();

  });
</script>

<script type="text/javascript">
    $("#update").click(function(){

        $( "#alert" ).show();
        id = $("#id").val();
        mobile_no = $("#mobile_no").val();
        email = $("#email").val();
        address = $("#address").val();
        city = $("#city").val();
        state = $("#state").val();
        update = $("#update").val();

    if(mobile_no==""){
        $("#alert").text("Mobile No is required");
        $("#mobile_no").focus();
    }
    else if (email=="") {
        $("#alert").text("Email No is required");
        $("#email").focus();
    }
    else if (address=="") {
        $("#alert").text("Address No is required");
        $("#address").focus();
    }
    else if (city=="") {
        $("#alert").text("city No is required");
        $("#city").focus();
    }
    else if (state=="Select") {
        $("#alert").text("State is required");
        $("#state").focus();
    }

    else {
        $.get("profile.php",{id:id,mobile_no:mobile_no,email:email,address:address,city:city,state:state,update:update},function(data){

            $("#alert").text("Profile update Successfully");
            $("#alert").css("color","green");

            setTimeout(off,1000);
                     function off(){
                        window.location="profile.php";
                     }
            })
        }
    })
    
</script>

<?php 

    if (isset($_GET['update'])) {

        $id = $_GET['id'];
        $mobile_no = $_GET['mobile_no'];
        $email = $_GET['email'];
        $address = $_GET['address'];
        $city = $_GET['city'];
        $state = $_GET['state'];

        mysqli_query($conn,"update admin set mobile_no = '".$mobile_no."',email='".$email."',address='".$address."',city='".$city."',state='".$state."' where id='".$id."'");
    }

 ?>