<?php 
   session_start();
   if (!isset($_SESSION["d_uid"])) {
      header("Location: loginPage/login.php");
   }else {
        $did = $_SESSION["id"];
        $product_limit = $_SESSION['product_limit'];
        $shop_category_id = $_SESSION['shop_category_id'];
        include '_dbconnection.php';
        $query = mysqli_query($conn,"select payment_status from manage_distributer where id = '".$did."'");
        $row = mysqli_fetch_array($query);
        $payment_status = $row["payment_status"];
        if ($payment_status != "success") {
            header("Location: dashboard.php");
        }
    }

    $flag = 0;
    if (isset($_POST['addProduct'])) {
        $query = mysqli_query($conn,"select * from manage_product where distributer_id = '".$did."'");
        $numberOfAlreadyAddedProduct = mysqli_num_rows($query);
        if ($numberOfAlreadyAddedProduct != $product_limit) {
            echo $shop_category_id;
            $did = $_POST['did'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $comment = $_POST['desc'];
            $s_cat_id = $_POST['s_cat_id'];
            // File upload path
            $targetDir = "uploads/productImg/";
            $fileName = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg');
            if ($fileName) {
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                        mysqli_query($conn,"insert into manage_product (distributer_id,shop_category_id,name,price,image,discription,date_time) values('".$did."','".$s_cat_id."','".$name."','".$price."','".$fileName."','".$comment."',CURRENT_TIMESTAMP)");
                        $flag = 1;
                        $statusMsg = "Product Added Successfully";
                    }else{
                        $flag = 2;
                        $statusMsg = "Product Added Failed";
                    }
                }
                else{
                    $flag = 3;
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
                }
            }
        }else{
            $flag = 4;
            $statusMsg = 'Your product limit is full. If you want to add more product update your plan!';
        }
    }

    $query = mysqli_query($conn,"select * from manage_product where distributer_id = '".$did."'");
    $numberOfAlreadyAddedProduct = mysqli_num_rows($query);
    if ($numberOfAlreadyAddedProduct == $product_limit) {
        $isDistributerEligibleToAddProduct = false;
    }else{
     $isDistributerEligibleToAddProduct = true;
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
        <link rel="stylesheet" type="text/css" href="">
        <link rel="stylesheet" type="text/css" href="../admin/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

        <style>
            #action_td span{
                margin: 3px;
                padding: 4px;
            }
            #action_td span i{
              font-size: 22px;
            }
            #action_td span i:hover{
                font-size: 21px; 
                color: red;
                /* color: rgba(209, 241, 157, 0.452); */
            }
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
                        <li ><a href="dashboard.php"><center><i class="fa fa-home"></i> Dashboard</center></a></li>
                        <li class="active"><a href="./manage_product.php"><center><i class="fa fa-dropbox"> Manage Product</i></center></a></li>
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
        
        <div class="container-fluid text-center">
            <div class="row content">
                <!-- <div class="col-sm-2 sidenav">
                    <p><a href="#">Link</a></p>
                    <p><a href="#">Link</a></p>
                    <p><a href="#">Link</a></p>
                </div> -->
                <div class="col-sm-12 text-center" style="margin-left: 10px; margin-right: 10px;">
                    <?php
                        if ($flag==1) {
                            echo '<div class="productAlert" style="border-radius: 6px; margin:4px; margin-top:5px; padding:2px; background-color:rgba(209, 241, 157, 0.452);"><p style="color:green; margin-top:1px; font-family:sans-serif; ">'.$statusMsg.'</p></div>';
                        }else if ($flag==2) {
                            echo '<div class="productAlert" style="border-radius: 6px; margin:4px; margin-top:5px; padding:2px; background-color:rgba(246, 158, 158, 0.452);"><p style="color:red; margin-top:1px; font-family:sans-serif; ">'.$statusMsg.'</p></div>';
                        }else if ($flag==3) {
                            echo '<div class="productAlert" style="border-radius: 6px; margin:4px; margin-top:5px; padding:2px; background-color:rgba(246, 158, 158, 0.452);"><p style="color:red; margin-top:1px; font-family:sans-serif; ">'.$statusMsg.'</p></div>';
                        }else if ($flag==4) {
                            echo '<div class="productfullAlert" style="border-radius: 6px; margin:4px; margin-top:5px; padding:2px; background-color:rgba(246, 158, 158, 0.452);"><p style="color:red; margin-top:1px; font-family:sans-serif; ">'.$statusMsg.'</p><a>click here for update plan</a></div>';
                        }
                    ?>
                </div>
                <div class="col-sm-12 text-left">
                    <nav class="navbar navbar-default ">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <li><a style="cursor: pointer;" id="view">View Product</a></li>
                                <li><a style="cursor: pointer;" id="add">Add Product</a></li>
                            </ul>
                            <!-- <ul class="nav navbar-nav navbar-right">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul> -->
                            <form class="navbar-form navbar-right">
                                <div class="form-group col-sm-1">
                                    <input type="text" class="form-control" width="" placeholder="Search">
                                </div>
                            </form>
                        </div>
                    </nav>
                    <div class="container" id="adding">
                        <h3>Add Product</h3>
                        <?php if ($isDistributerEligibleToAddProduct == true) {?>
                            <form action="manage_product.php" method="POST" enctype="multipart/form-data">
                                <div class="col-sm-12">
                                    <?php 

                                        $query = mysqli_query($conn,"select * from manage_product");
                                        
                                        if (mysqli_num_rows($query) != 0) {
                                            while($row = mysqli_fetch_array($query)){

                                                $id = $row['id'];
        
                                                $pid = $id + 1;
        
                                            }
                                        }else{
                                            $pid = 1;
                                        }
                                        ?>
                                    <div class="form-group">
                                        <input value="<?php echo $did ?>" name="did" hidden>
                                        <input value="<?php echo $shop_category_id ?>" name="s_cat_id" hidden>
                                        <label for="ex1">Product Id</label>
                                        <input class="form-control" type="text" name="pid" disabled value="<?php echo $pid ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="ex1">Product Name</label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="ex1">Price (Rs)</label>
                                        <input class="form-control" type="number" name="price" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="ex1">Product Image</label>
                                        <input class="form-control" type="file" name="image" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="comment">Discription</label>
                                        <textarea class="form-control" style="resize: none;" rows="5" name="desc" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <center>
                                    <input type="submit" name="addProduct" class="btn btn-primary" value="Submit">
                                    <input type="reset"  class="btn btn-warning" value="Reset">
                                    <div id="alert" style="color: red;"></div>
                                    </center>
                                </div>
                                
                            </form>
                        <?php } else{?>
                            <div>
                                <center style="background-color:rgba(255, 0, 0, 0.2); margin:20px; padding:25px; border-radius:6px">
                                <h3>You are already added you maximum number of product</h3>
                                <h4>Your current membership have max product limit is <?php echo  $product_limit?></h4>
                                <h5><a href="">Update membership for more product</a></h5>
                                </center>
                            </div>
                        <?php }?>
                    </div>

                </div>
                <div class="container view" id="viewing">
                    <h3 style="float: left;margin-top: 0px;">View Product <span style="font-size:18px">P-Limit</span><?php if ($isDistributerEligibleToAddProduct == true){echo '<span style="color:green;font-size:18px;"> ('.$product_limit.')</span>';} else{echo '<span style="color:red;font-size:18px;"> ('.$product_limit.')</span>';}?></h3>
                    <table width="100%">
                        <tr class="rows">
                            <th>SL.No</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Discription</th>
                            <th>Product Image</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                           $query = mysqli_query($conn,"select * from manage_product where distributer_id = '".$did."'");
                            if (mysqli_num_rows($query) != 0) {
                                $i=0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $i++;
                                   echo '<tr>    
                                            <td>'.$i.'</td>
                                            <td>PI'.$row['id'].'</td>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['discription'].'</td>
                                            <td>'.$row['image'].'</td>
                                            <td id="action_td">
                                                <span><i class="fa fa-edit" aria-hidden="true"></i></span>
                                                <span><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </td>
                                        </tr>';
                                }
                            }
                        ?>
                    </table>
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
    $("#adding").hide();
    $("#view").click(function(){
        $("#adding").hide();
        $("#viewing").show();
        $("#adding").hide();
    })
    $("#add").click(function(){
        $("#viewing").hide();
        $("#adding").show();
    })

    $(".productAlert").fadeOut(3000)
</script>

<?php 


?>    
