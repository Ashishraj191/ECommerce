<?php 
   session_start();
   if (!isset($_SESSION["d_uid"])) {
      header("Location: loginPage/login.php");
   }
   include '_dbconnection.php';
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
		<link rel="stylesheet" type="text/css" href="../admin/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
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
                        <li ><a href="dashboard.php"><center><i class="fa fa-home"></i> Dashboard</center></a></li>
                        <li><a href="manage_product.php"><center><i class="fa fa-dropbox"> Manage Product</i></center></a></li>
                        <li><a href="premium.php"><center><i class="fa fa-money"> Premium</i></center></a></li>
                    </li>
                    <li class="dropdown active">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-circle-o"> <?php echo $_SESSION['name'] ?></i>
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="profile.php"><i class="fa fa-address-card"> Profile</i></a></li>
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
						</div>
					</nav>
					<div class="container" id="adding">
						<h3 id="profile">Profile</h3>
						<h3 id="edit_profile">Edit Profile</h3>
						<form>
							 <?php 
                              $result = mysqli_query($conn,"select *from manage_distributer where id = '".$_SESSION["id"]."'");
                              $query = mysqli_query($conn,"select *from manage_distributer where concat(name,mobile_no,email,city,state,address) like '%".@$_GET['search']."%' order by name asc");

                              $row = mysqli_fetch_array($result);
                            ?>
							<div class="col-sm-4 id">
								<div class="form-group">
									<label for="ex1">Agent Id</label>
									<input class="form-control" type="text" id="id" value="<?php echo $row['id'] ?>" disabled>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="ex1">Name</label>
									<input class="form-control" type="text" id="name" value="<?php echo $row['name'] ?>" disabled>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="ex1">Mobile No</label>
									<input class="form-control" type="text" id="mobile_no" value="<?php echo $row['mobile_no'] ?>" disabled>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="ex1">Email</label>
									<input class="form-control" type="text" id="email" value="<?php echo $row['email'] ?>" disabled>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="ex1">Address</label>
									<input class="form-control" type="text" id="address" value="<?php echo $row['address'] ?>" disabled>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="ex1">City</label>
									<input class="form-control" type="text" id="city" value="<?php echo $row['city'] ?>" disabled>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>State <span class="text-danger">*</span> </label>
									<select class="form-control select" id="state" disabled>
									<option>Select</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
									</select>
								</div>
							</div>
								<center>
									<input type="button"  class="btn btn-primary" id="update" value="Update">
									<input type="button"  class="btn btn-warning" value="Clear">
									<div id="alert" style="color: red;"></div>
								</center>
							</div>
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
})
$("#edit").click(function(){
	$("#alert").show();
	$("#edit_profile").show();
	$("#profile").hide();
	$(".btn").show();
	$(".id").hide();
})
$("#edit").click(function(){
	$( "#mobile_no" ).prop( "disabled", false );
	$( "#address" ).prop( "disabled", false );
	$( "#city" ).prop( "disabled", false );
	$( "#state" ).prop( "disabled", false );
	$( "#district" ).prop( "disabled", false );

});
$("#view").click(function(){
	$(".id").show();
	$("#alert").hide();
	$( "#name" ).prop( "disabled", true );
	$( "#mobile_no" ).prop( "disabled", true );
	$( "#email" ).prop( "disabled", true );
	$( "#address" ).prop( "disabled", true );
	$( "#city" ).prop( "disabled", true );
	$( "#state" ).prop( "disabled", true );
	$( "#district" ).prop( "disabled", false );

});

<?php if($row['state'] != ""){
        echo '$("#state").val("'.$row["state"].'")';
        }
?>
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
        $.get("profile.php",{id:id,mobile_no:mobile_no,address:address,city:city,state:state,update:update},function(data){

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
        $address = $_GET['address'];
        $city = $_GET['city'];
        $state = $_GET['state'];

        mysqli_query($conn,"update manage_distributer set mobile_no = '".$mobile_no."',address='".$address."',city='".$city."',state='".$state."' where id='".$id."'");
    }

 ?>