<?php
	if (isset($_GET["id"])) {
		$shop_category_id = $_GET["id"];
	}else{
		header("Location: index.php");
	}
	include 'distributer/_dbconnection.php';
	$productResult = mysqli_query($conn,"select * from manage_product where shop_category_id = '".$shop_category_id."' order by date_time desc");
	$categoryResult = mysqli_query($conn,"select * from shop_category where shop_category_id = '".$shop_category_id."'"); 	
	$category_detail = mysqli_fetch_array($categoryResult);
	$category_name = $category_detail['category_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css?v=66">
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
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user-circle-o"> User</i>
						<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-comment"> Support</i></a></li>
						<li><a href="#"><i class="fa fa-lock"> Login / Create Account</i></a></li>
						<li><a href="#"><i class="fa fa-phone"> Contect us</i></a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form text-center">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search" name="search">
				</div>
				<button type="submit" class="btn btn-primary">Search</button>
			</form>
		</div>
	</nav>
	<div class="small-container mt-5">

		<h2 class="title"><?php echo "Category - ".$category_name."";?></h2>
		<div class="row">
			<?php 
					if (mysqli_num_rows($productResult) > 0) {
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
							<i id="favorite" class="fa fa-heart-o" style="font-size:26px;" aria-hidden="true"></i>
						</div>';
						}
					}else {

						echo '<p style="font-size:30px">Product is Not Found</p>';
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
</body>

<script>
	$(document).ready(function(){
		$(".viewProductDetail_btn").click(function(){
			id = $(this).val();
			window.location.href = `viewProductDetail.php?id=${id}`;
		});
	})
</script>

</html>