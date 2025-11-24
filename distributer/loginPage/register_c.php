<?php 
include '../_dbconnection.php';
    if (isset($_GET['signup'])) {
            $name = $_GET['name'];
            $email = $_GET['email'];
            $mobile = $_GET['mobile'];
            $pass = md5($_GET['re_pass']);
            $membership_id = $_GET['membership'];
            $product_limit = $_GET['pro_limit'];
            $shop_name = $_GET['s_name'];
            $shop_category_id = $_GET['s_category'];

            $query_conn = mysqli_query($conn,"select *from manage_distributer where mobile_no ='".$mobile."' or email = '".$email."'");
        
            if (mysqli_num_rows($query_conn)==0) {

                    mysqli_query($conn,"insert into manage_distributer(name,email,mobile_no,password,shop_name,shop_category_id,membership_id,product_limit) values('".$name."','".$email."','".$mobile."','".$pass."','".$shop_name."','".$shop_category_id."','".$membership_id."','".$product_limit."')");

            echo '<script> 
                        $("#alert").css("display","block");
                        $("#alert").text("Employee Added Sucessfully");
                        $("#alert").css("color","green");
                     setTimeout(off,1000);
                       function off()
                          { 
                              window.location.href = `./login.php`;
                          } 
                  </script>';
                 }
        else{
               echo '<script>
                       alert("Employee already Exist");
                         $("#alert").css("display","block");
                         $("#alert").text("Employee already Exist");
                         $("#alert").css("color","red");
                    </script>';
             }
         }
 ?>
