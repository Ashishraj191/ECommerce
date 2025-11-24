<?php 
   session_start();
   if (!isset($_SESSION["d_uid"])) {
      header("Location: loginPage/login.php");
   }else {
        $did = $_SESSION["id"];
        include '_dbconnection.php';
        $query = mysqli_query($conn,"select payment_status from manage_distributer where id = '".$did."'");
        $row = mysqli_fetch_array($query);
        $payment_status = $row["payment_status"];
        if ($payment_status != "success") {
            header("Location: dashboard.php");
        }
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
                        <li><a href="manage_product.php"><center><i class="fa fa-dropbox"> Manage Product</i></center></a></li>
                        <li class="active"><a href="leads.php"><center><i class="fa fa-money"> leads</i></center></a></li>
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
                            <!-- <ul class="nav navbar-nav">
                                <li><a style="cursor: pointer;" id="view">View Product</a></li>
                                <li><a style="cursor: pointer;" id="add">Add Product</a></li>
                            </ul> -->
                            <form class="navbar-form navbar-right">
                                <div class="form-group col-sm-1">
                                    <input type="text" class="form-control" width="" placeholder="Search">
                                </div>
                            </form>
                        </div>
                    </nav>


                </div>
                <div class="container view" id="viewing">
                    <h3 style="float: left;margin-top: 0px;">Leads/Enquiry</h3>
                    <table width="100%">
                        <tr class="rows">
                            <th>SL.No</th>
                            <th>Name</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Product Name</th>
                            <th>date</th>
                            <th>action</th>
                        </tr>
                        <?php
                           $query = mysqli_query($conn,"select * from product_enquiry where distributer_id = '".$did."'");
                            if (mysqli_num_rows($query) != 0) {
                                $i=0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $requested_by_customer_id = $row['requested_by_customer_id'];
                                    $requested_by_distributer_id = $row['requested_by_distributer_id'];
                                    $product_id = $row['product_id'];
                                    if ($requested_by_distributer_id == 0) {
                                        $query2 = mysqli_query($conn,"select * from manage_customer where id = '".$requested_by_customer_id."'");
                                        $row2 = mysqli_fetch_array($query2);
                                    }else if($requested_by_customer_id == 0){
                                        $query2 = mysqli_query($conn,"select * from manage_distributer where id = '".$requested_by_distributer_id."'");
                                        $row2 = mysqli_fetch_array($query2);
                                    }
                                    $query3 = mysqli_query($conn,"select * from manage_product where id = '".$product_id."'");
                                    $row3 = mysqli_fetch_array($query3);
                                    $i++;
                                   echo '<tr>    
                                            <td>'.$i.'</td>
                                            <td>'.$row2['name'].'</td>
                                            <td>'.$row2['mobile_no'].'</td>
                                            <td>'.$row2['email'].'</td>
                                            <td><a href="../viewProductDetail.php?id='.$row3['id'].'" target="_blank">'.$row3['name'].'</a></td>
                                            <td>'.$row['date_time'].'</td>
                                            <td id="action_td">
                                                <button class="btn btn-danger deleteLeads_btn" value="'.$row['product_enquiry_id'].'"><i class="fa fa-trash" aria-hidden="true"></i> </button>
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
  
    </body>
    <script>
        $(".deleteLeads_btn").click(function () {
            id = $(this).val();
            if(confirm("Are you really want to delete this leads ?")){
              $.post("_buttonAction.php",{id:id,deleteEnquiry:"deleteEnquiry"},function (data) {
                if (data=="1") {
                 window.location.reload(true);
                }else{
                    alert("Failed Deletion");
                }
              })
            }
        })
    </script>
</html>
