<?php
	session_start();
	$isLogin = false;
	if (isset($_SESSION["d_uid"])) {
		$isLogin = 'did';
		$did = $_SESSION["id"]; 
		$name =  $_SESSION["name"];
	}else if (isset($_SESSION["c_uid"])){
		$isLogin = 'cid';
		$cid = $_SESSION["id"];
		$name =  $_SESSION["name"];
	}
	include 'distributer/_dbconnection.php';
	$productResult = mysqli_query($conn,"select * from manage_product order by date_time desc limit 40");
	$categoryResult = mysqli_query($conn,"select * from shop_category order by date_time desc");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Uchhal Ads - www.uchhalads.in</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css?v=66">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>

<body>
	<!--Login Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title title1" id="exampleModalLabel">User Login</h5>
					<h5 class="modal-title title2" hidden id="exampleModalLabel">Create Account</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="login-modal">
						<form action="./user_loginAuthection.php" method="post">
							<div class="form-group">
								<label for="exampleFormControlInput1">Username:</label>
								<input type="email" name="email" class="form-control" id="exampleFormControlInput1"
								placeholder="name@example.com">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Password:</label>
								<input type="password" name="password" class="form-control" id="exampleFormControlInput1"
								placeholder="Password">
							</div>
							<div class="form-group">
								<button type="submit" name="userLogin" id="login" class="btn btn-success btn-block">Login</button><br>
								<button type="button" id="register" class="btn btn-primary btn-block">Register</button>
							</div><br>
							 <center>
                                <div>Don't remember password ? <a href="user_forget_password.php"><b style="color:blue;">Forget Password</b></a></div>
                            </center>
						</form>
						<script type="text/javascript">
							$("#register").click(function(){
								$(".create-modal").show();
								$(".login-modal").hide();
								$(".title1").hide();
								$(".title2").show();
							})
						</script>
						<!-- <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div> -->
					</div>
					<div class="create-modal" hidden>
							<div class="form-group">
								<label for="exampleFormControlInput1">Name</label>
								<input type="email" class="form-control" id="name" placeholder="name">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Mobile No</label>
								<input type="number" name="number" class="form-control" id="mobile"
								placeholder="Mobile">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Email</label>
								<input type="email" name="email" class="form-control" id="email"
								placeholder="Email">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Password</label>
								<input type="password" name="password" class="form-control" id="password"
								placeholder="Password">
							</div>
							<div class="form-group">
								<div class="text-center text-danger" id="alert"></div>
								<button type="submit" name="userLogin" id="create_account" class="btn btn-success btn-block">Create Account</button><br>
								<button type="button" id="login-modal" class="btn btn-primary btn-block">Login Here</button>

							<script type="text/javascript">

								$("#login-modal").click(function(){
									$(".create-modal").hide();
									$(".login-modal").show();
									$(".title1").show();
									$(".title2").hide();
								});

								$("#create_account").click(function(){

									name = $("#name").val();
									mobile = $("#mobile").val();
									email = $("#email").val();
									password = $("#password").val();
									create_account = $("#create_account").val();

									if (name=="") {
										$("#alert").text("Name is Requred");
										$("#name").focus();
									}

									else if (mobile=="") {
										$("#alert").text("Mobile No is Requred");
										$("#mobile").focus();
									}
									else if (email=="") {
										$("#alert").text("Email is Requred");
										$("#email").focus();
									}
									else if (password=="") {
										$("#alert").text("Password is Requred");
										$("#password").focus();
									}
									else {
										$.get("./user_loginAuthection.php",{name:name,mobile:mobile,email:email,password:password,create_account:create_account},function(data){

											$("#alert").html(data);

											setTimeout(off,1000);
								               function off()
								                  { 
								                     window.location.href = 'index.php';
								                  }
										})
									}
								})
							</script>

							</div><br>
						
						<!-- <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div> -->
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-inverse" style="border-radius: 0;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Uchhal Ads</a>
			</div>
			<div class="text-right" id="bars" style="">
				<i class="fa fa-bars" id="open"></i>
				<i class="fa fa-close" id="close"></i>
			</div>
			<script type="text/javascript">
				$("#close").hide();
				$("#open").click(function () {
					$(".nav").show();
					$("#open").hide();
					$("#close").show();
				})
				$("#close").click(function () {
					$(".nav").hide();
					$("#open").show();
					$("#close").hide();
				})
			</script>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#"><i class="fa fa-home"> Home</i></a></li>
				<li><a href="distributer/loginPage/login.php"><i class="fa fa-handshake-o"> Sell</i></a></li>
				<li><a href="#"><i class="fa fa-comments"> Massage</i></a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user-circle-o"> 		
						

						<?php
							if ($isLogin != false) {
								echo $name;
							}else{
								echo "User";
							}
						?></i>
						<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php
							if($isLogin == 'did'){
								echo '<li><a href="./distributer/dashboard.php"><i class="fa fa-lock"> Dashboard</i></a></li>';
							}else if($isLogin == 'cid'){
								echo '<li><a><div data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"> Profile</i></div></a></li>';
							}else{
								echo '<li><a data-toggle="modal" data-target="#exampleModal"><i class="fa fa-lock"> Login / Create
								Account</i></a></li>';
							}
						?>
						<script type="text/javascript">
							$("#profile").click(function(){
								alert("hii")
							})
						</script>
						<li><a href="#"><i class="fa fa-comment"> Support</i></a></li>
						<li><a href="#"><i class="fa fa-phone"> Contect us</i></a></li>
						<?php
							if($isLogin != false){
								echo '<li><a href="./logout.php"><i class="fa fa-phone"> Logout</i></a></li>';
							}
						?>
					</ul>
				</li>
			</ul>

				<form class="navbar-form text-center">
						<div class="form-group">
							<input type="text" class="form-control" style="" placeholder="Search" name="search" id="search">
						</div>
						<script type="text/javascript">
							$("#search").keyup(function(){
						          var search = $("#search").val();
						          	$("#myCarousel").hide();
						          	$("#header_menu").hide();
						          	$("#footer").hide();
						          	  $("#latestProductMainDiv").hide();
									  $("#allView").show();
						          $.get("livesearch.php",{search:search},function(data){
						            $("#allView").html(data);
						         });

						          if (search=="") {
									$("#allView").hide();
									$("#latestProductMainDiv").show();
						          	$("#myCarousel").show();
						          	$("#header_menu").show();
						          	$("#footer").show();
						          }
						      });
						</script>
						<!--<button type="submit" class="btn btn-primary">Search</button>-->
				</form>
			<!---------------------------------- Profile Modal ---------------------------------->
					
					<div class="container">
							  <div class="modal fade" id="myModal" role="dialog">
							    <div class="modal-dialog modal-lg">
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title" style="color: #000;">Profile</h4>
							        </div>

							        <?php 
							        	$result = mysqli_query($conn,"select *from manage_customer where id = '".$_SESSION["id"]."'");

                              			$row = mysqli_fetch_array($result);
							         ?>

							        <div class="modal-body">
							        	<div class="form-group row">
									          <div class="col-sm-4">
										        <label for="ex2">Customer Id</label>
										        <input class="form-control col-sm-4" id="e_id" value="<?php echo $row['id']; ?>" disabled type="text">
										      </div>

										      <div class="col-sm-4">
										        <label for="ex2">Name </label>
										        <input class="form-control col-sm-4" id="e_name" value="<?php echo $row['name']; ?>" disabled type="text">
										      </div>

										      <div class="col-sm-4">
										        <label for="ex2">E-mail</label>
										        <input class="form-control col-sm-4" id="e_email" value="<?php echo $row['email']; ?>" disabled type="text">
										      </div>
								        </div>
								        <div class="form-group row">
									          <div class="col-sm-4">
										        <label for="ex2">Mobile No</label>
										        <input class="form-control col-sm-4" id="e_mobile" value="<?php echo $row['mobile_no']; ?>" disabled type="text">
										      </div>

										      <div class="col-sm-4">
										        <label for="ex2">State</label>
										        <input class="form-control col-sm-4" id="e_state" value="<?php echo $row['state']; ?>" disabled type="text">
										      </div>

										      <div class="col-sm-4">
										        <label for="ex2">City</label>
										        <input class="form-control col-sm-4" id="e_city" value="<?php echo $row['city']; ?>" disabled type="text">
										      </div>
								        </div>
								        <div class="form-group row">
								        	<div class="col-sm-12">
									          <label for="comment">Address</label>
  											  <textarea class="form-control" rows="4" id="e_address" disabled style="resize: none;"> <?php echo $row['address'];?></textarea>
								        	</div>
								    	</div>
							    	</div>
							         <div class="modal-footer">
							         	<div class="text-center text-danger" id="e_alert"></div>
							          <button type="button" class="btn btn-default" id="p_edit">Edit Profile</button>
							          <button type="button" hidden class="btn btn-default" id="s_edit">Save Profile</button>
							        </div> 
							      </div>
							      
							    </div>
							  </div>
							</div>

							<script type="text/javascript">
								$("#p_edit").click(function(){
									$( "#e_name" ).prop( "disabled", false );
									$( "#e_email" ).prop( "disabled", false );
									$( "#e_address" ).prop( "disabled", false );
									$( "#e_city" ).prop( "disabled", false );
									$( "#e_state" ).prop( "disabled", false );
									$( "#e_mobile" ).prop( "disabled", false );
								});

								$("#s_edit").click(function(){

									e_id = $("#e_id").val();
									e_name = $("#e_name").val();
									e_email = $("#e_email").val();
									e_mobile = $("#e_mobile").val();
									e_address = $("#e_address").val();
									e_city = $("#e_city").val();
									e_state = $("#e_state").val();
									s_edit = $("#s_edit").val();

									if (e_name=="") {
										$("#e_alert").text("Name is Requred");
										$("#e_name").focus();
									}
									else if (e_email=="") {
										$("#e_alert").text("Email is Requred");
										$("#e_email").focus();
									}
									else if (e_mobile=="") {
										$("#e_alert").text("Mobile No is Requred");
										$("#e_mobile").focus();
									}
									else if (e_state=="") {
										$("#e_alert").text("State is Requred");
										$("#e_state").focus();
									}
									else if (e_city=="") {
										$("#e_alert").text("City is Requred");
										$("#e_city").focus();
									}
									else if (e_address=="") {
										$("#e_alert").text("Address is Requred");
										$("#e_address").focus();
									}

									else {
										$.get("./user_loginAuthection.php",{e_id:e_id,e_name:e_name,e_email:e_email,e_mobile:e_mobile,e_state:e_state,e_city:e_city,e_address:e_address,s_edit:s_edit},function(data){

											$("#e_alert").html(data);

											setTimeout(off,1000);
								               function off()
								                  { 
								                     window.location.href = 'index.php';
								                  }
										})
									}
								})

							</script>


			<!---------------------------------- Profile Modal ---------------------------------->


			
		</div>
	</nav>
		<div class="catMainDiv" id="header_menu">
						<?php
						while ($row = mysqli_fetch_array($categoryResult)) {
							echo '	<div class="catDiv">
							<img src="admin/uploads/category/'.$row['image'].'" alt="" srcset="" class="rounded-circle">
							<input class="category_id"  value="'.$row['shop_category_id'].'" hidden>
							<p>'.$row['category_name'].'</p>
						</div>';
						}
					
					?>
			<!-- <div class="catDiv">
				<img src="https://nextbootstrap.netlify.app/assets/images/profiles/1.jpg" alt="" srcset="" class="rounded-circle">
				<p>Test</p>
			</div> -->
		</div>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner" style="height: 500px;margin-top: -20px;">
			<div class="item active">
				<img src="img/1.jpg" alt="Los Angeles" style="height: 500px; width: 100%;object-fit: cover;">
			</div>
			<div class="item">
				<img src="img/2.jpg" alt="Chicago" style="height: 500px; width: 100%;object-fit: cover;">
			</div>
			<div class="item">
				<img src="img/3.jpg" alt="New York" style="height: 500px; width: 100%;object-fit: cover;">
			</div>
		</div>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div id="allView">
		
	</div>
	<div class="small-container mt-5" id="latestProductMainDiv">
		<!-- <h2 class="title">Latest Category</h2> -->

		<!-- Latest products -->
		<h2 class="title" id="title">Latest Products</h2>
		<div class="row">
			<?php 
						while ($row = mysqli_fetch_array($productResult)) {
							$distributer_id = $row['distributer_id'];
							$distributerResult = mysqli_query($conn,"select * from manage_distributer where id = '".$distributer_id."'");
							$distributerDetail = mysqli_fetch_array($distributerResult);
							echo '<div class="col-4 box-container">
							<div class="image-overlay"></div>
							<img src="distributer/uploads/productImg/'.$row['image'].'" alt="Gaming Laptop">
							<h5 class="product_name">'.$row['name'].'</h5>
							<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<div class="content-details fadeIn-bottom" style="padding-left: 0px; padding-right: 0px;">
								<h3 class="content-title">'.$row['name'].'</h3>
								<h4 class="content-price">Rs '.$row['price'].'</h4>
								<div style="margin: 2px; padding: 2px;"><button value="'.$row['id'].'" class="btn btn-primary rounded-pill viewProductDetail_btn" style="padding-left: 16px; padding-right: 16px; border-radius: 30px; background-image: linear-gradient(to right, rgb(81, 218, 236) , rgb(26, 138, 243));"><i class="fa fa-eye"></i> View</button></div>
								<div style="margin: 2px; padding: 2px;"><a href="tel:'.$distributerDetail['mobile_no'].'" class="btn btn-success rounded-pill" style="padding-left: 20px; padding-right: 20px; border-radius: 30px; background-image: linear-gradient(to right, rgb(213, 236, 81) , rgb(26, 243, 109));"><i class="fa fa-phone"></i> Call</a></div>
								<div class="content-btn" title="Add to Cart"><i id="favoriteBtn" class="fa fa-heart" style="font-size:26px;" aria-hidden="true"></i></div>
							</div>
							<p class="price_name" style="display:inline">Rs '.$row['price'].'</p>
						</div>';
						}
					?>

			<!-- <div class="col-4 box-container">
						<div class="image-overlay"></div>
						<img src="images/canon-cam.jpg" alt="Camera">
						<h5 class="product_name">Canon 12X Pro Shoot</h5>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<div class="content-details fadeIn-bottom">
							<h3 class="content-title">X-box Console</h3>
							<h4 class="content-price">Rs2000</h4>
							<h4 class="content-price"><button class="btn btn-primary">Call Now</button></h4>
							<div class="content-btn btn btn-secondary" title="Add to Cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>
						</div>
						<p class="price_name" >Rs990</p>
					</div> -->
		</div>
	</div>
	<div id="whatsappDiv">
		<a href="https://wa.me/+918873149623">
			<img src="./img/whatsapp-logo.png" alt="">
		</a>	
	</div>
	<!-- -------footer------ -->
	<div class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Download our app</h3>
					<p>Top G5 Enabled Prodcuts with good support</p>
					<div class="app-logo">
						<img src="img/playstore.png" alt="">
						<img src="img/appstore.png" alt="">
					</div>
				</div>
				<div class="footer-col-2">
					<img src="images" alt="">
					<p>Best technology enabled product?</p>
				</div>
				<div class="footer-col-3">
					<h3>Useful Links</h3>
					<ul>
						<li>Coupons</li>
						<li>Blog Post</li>
						<li>Return Policy</li>
						<li>Join Affiliate</li>
					</ul>
				</div>
				<div class="footer-col-4">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="https://www.facebook.com/profile.php?id=100086972666533">Facebook</a></li>
						<li><a href="https://uchhalads.blogspot.com/?m=1">Blog</a></li>
						<li><a href="https://www.instagram.com/uchhalads/">Instagram</a></li>
						<li><a href="https://www.youtube.com/channel/UCsBRqTfO1E6_8DtbZO4Y1-g">YouTube</a></li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2022</p>
		</div>
	</div>
</body>


<script>
	$(document).ready(function () {
		$(".catDiv").click(function () {
			id = $(this).children('input').val();
			window.location.href = `viewProductList.php?id=${id}`;
		});
		$(".viewProductDetail_btn").click(function () {
			id = $(this).val();
			window.location.href = `viewProductDetail.php?id=${id}`;
		});
	})
</script>

</html>