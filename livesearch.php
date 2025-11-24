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
  $productResult = mysqli_query($conn,"select * from manage_product where concat(name,price) like '%".@$_GET['search']."%' order by name asc");

  $categoryResult = mysqli_query($conn,"select * from shop_category order by date_time desc limit 4");
?>


<div class="small-container mt-5">
    <!-- <h2 class="title">Latest Category</h2> -->

    <!-- Latest products -->
    <h2 class="title" id="title">Latest Products</h2>

    <script type="text/javascript">
        $("#search").keyup(function(){
          $("#title").hide();
        })
    </script>
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
              <i id="favorite" class="fa fa-heart-o" style="font-size:26px;" aria-hidden="true"></i>
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
    <a href="https://wa.me/8873149623" target="_blank">
      <img src="./img/whatsapp-logo.png" alt="">
    </a>  
  </div>