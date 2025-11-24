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

	if (isset($_GET["id"])) {
		$id = $_GET["id"];
	}
	else{
		header("Location: index.php");
	}

	include 'distributer/_dbconnection.php';
	$productResult = mysqli_query($conn,"select * from manage_product where id = '".$id."'");
	$productDetail = mysqli_fetch_array($productResult);
	$distributer_id = $productDetail['distributer_id'];
	$shop_category_id = $productDetail['shop_category_id'];
	$distributerResult = mysqli_query($conn,"select * from manage_distributer where id = '".$distributer_id."'");
	$distributerDetail = mysqli_fetch_array($distributerResult);
	$categroyResult = mysqli_query($conn,"select * from shop_category where shop_category_id = '".$shop_category_id."'");
	$categroyDetail = mysqli_fetch_array($categroyResult);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Uchhal Ads</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="display_product.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
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
					$("#open").click(function(){
						$(".nav").show();
						$("#open").hide();
						$("#close").show();
					})
					$("#close").click(function(){
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
							<input type="text" class="form-control" style="" placeholder="Search" name="search">
						</div>
						<button type="submit" class="btn btn-primary">Search</button>
					</form>
				</div>
			</nav>
		<div class="card" style="margin-top: -20px;">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="distributer/uploads/productImg/<?php echo $productDetail['image']?>" /></div>
						  <!-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> -->
						</div>
						<!-- <ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						</ul>						 -->
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $productDetail['name']?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<input value="<?php echo $productDetail['distributer_id']?>" id="distributer_id" hidden>
						<p class="product-description"><?php echo $productDetail['discription']?></p>
						<h4 class="price">current price: <span>Rs <?php echo $productDetail['price']?></span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes"><span style="font-weight:bold">Category:</span>
							<span> <?php echo $categroyDetail['category_name']?></span>
						</h5>
						<h5 class="colors"><span style="font-weight:bold">Shop Name:</span>
							<span> <?php echo $distributerDetail['shop_name']?></span>
						</h5>
						<h5 class="colors"><span style="font-weight:bold">Shop Address:</span>
							<span> <?php echo $distributerDetail['address']?> , <?php echo $distributerDetail['city']?> , <?php echo $distributerDetail['state']?></span>
						</h5>
						<h5 class="colors"><span style="font-weight:bold">Owner Name:</span>
							<span> <?php echo $distributerDetail['name']?></span>
						</h5>
						<div class="action">
							<a href="tel:<?php echo $distributerDetail['mobile_no']?>" class="add-to-cart btn btn-default" type="button"><i class="fa fa-phone"> Call Now</i></a>
							<button id="enquiry_btn" class="like btn btn-default" type="button"><span class="fa fa-heart"></span> Send Enquiry</button>
						    <a href="https://api.whatsapp.com/send?phone=&text=This is <?php echo $productDetail['name']?> on tranding product on Uchhal Ads visti now - http://uchhalads.in/viewProductDetail.php?id=<?php echo $id?>" class="btn btn-success"  id="share_btn"><i style="font-size:20px" class="fa fa-share-alt" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- -------footer------ -->
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="footer-col-1">
						<h3>Download our app</h3>
						<p>Top G5  Enabled Prodcuts with good support</p>
						<div class="app-logo">
							<img src="images/playstore.png" alt="">
							<img src="images/appstore.png" alt="">
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
							<li>Facebook</li>
							<li>Twitter</li>
							<li>Instagram</li>
							<li>YouTube</li>
						</ul>
					</div>
				</div>
				<hr>
				<p class="copyright">Copyright 2022</p>
			</div>
		</div>
	</body>
	


	<script>

		<?php if($isLogin == false){?>
			$('#enquiry_btn').click(function(){
				alert('After Login you can send enquiry !');
			});
		<?php }else if ($isLogin == 'cid'){?>
			$('#enquiry_btn').click(function(){
				pro_id = <?php echo $id?>;
				cid = <?php echo $cid?>;
				distributer_id = $("#distributer_id").val();
				did = 0;
				$.post("viewProductDetail.php?id=<?php echo $id?>", {pro_id:pro_id, cid:cid, did:did, distributer_id:distributer_id, enquiry:"enquiry"}, function(data){
					alert("Enquiry send successfull");
				});
			});
		<?php }else if ($isLogin == 'did'){?>	
			$('#enquiry_btn').click(function(){
				pro_id = <?php echo $id?>;
				did = <?php echo $did?>;
				cid = 0;
				distributer_id = $("#distributer_id").val();
				$.post("viewProductDetail.php?id=<?php echo $id?>", {pro_id:pro_id, cid:cid, did:did, distributer_id:distributer_id, enquiry:"enquiry"}, function(data){
					alert("Enquiry send successfull");
				});
			});
		<?php }?>
		

//                 // 	  $('#share_btn').click(function(){
//             	   //     console.log('ok');
//             	   //     window.location.href = "https://api.whatsapp.com/send?phone=&text=<?php urlencoder('hi')?>http://uchhalads.in/viewProductDetail.php?id=<?php echo $id?>";


	</script>
	




</html>


<?php
	// start for send enquiry 
	if (isset($_POST['enquiry'])) {
		$product_id = $_POST['pro_id'];
		$requested_by_distributer_id = $_POST['did'];
		$requested_by_customer_id = $_POST['cid'];
		$distributer_id = $_POST['distributer_id']; //distributer_id is id of distributer thoese add this paricular product	
		$result = mysqli_query($conn,"insert into product_enquiry (requested_by_customer_id,requested_by_distributer_id,product_id,distributer_id,date_time) values('".$requested_by_customer_id."','".$requested_by_distributer_id."','".$product_id."','".$distributer_id."',CURRENT_TIMESTAMP)");
		if ($result) {
			echo "success";
		}else{
			echo "failed";
		}
	}
	// end send enquiry 

?>
