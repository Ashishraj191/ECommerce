<?php 
   	include 'distributer/_dbconnection.php';
   if(isset($_POST['userLogin'])){
      $c_uid= mysqli_real_escape_string($conn, $_POST['email']);
      $pwd = md5($_POST['password']);

      $sql="SELECT id,name,mobile_no,email,address FROM manage_customer WHERE email = '{$c_uid}' AND password = '{$pwd}'";

      $result= mysqli_query($conn,$sql) or die("Query Failed");

      if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
   
            session_start();
            // unset($_SESSION['d_uid']);
            // unset($_SESSION['product_limit']);
            // unset($_SESSION['shop_category_id']);
            session_destroy();
            session_start();
            $_SESSION['c_uid'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['mobile'] = $row['mobile_no'];
            $_SESSION['id'] = $row['id'];
            header("Location: ./index.php");
         }
      }
      else{
        echo "Login Failed (Due to wrong user name and password)";
      }

   }
 ?>

<!------------------------------ Account Creation ------------------------------>

<?php 
      if (isset($_GET['create_account'])) {
            
            $name = $_GET['name'];
            $mobile = $_GET['mobile'];
            $email = $_GET['email'];
            $password = md5($_GET['password']);
            mysqli_query($conn,"insert into manage_customer(name,mobile_no,email,password) values('".$name."','".$mobile."','".$email."','".$password."')");

            echo '<script>
                    $("#alert").css("display","block");
                    $("#alert").text("Account Create Sucessfully");
                    $("#alert").css("color","green");
                 </script>';
             }
        else{
               echo '<script>
                         $("#alert").css("display","block");
                         $("#alert").text("Account already Exist");
                         $("#alert").css("color","red");
                      </script>';
             }

 ?>


 <!------------------------------ Account Updation ------------------------------>



 <?php 
      if (isset($_GET['s_edit'])) {
            
            $e_id = $_GET['e_id'];
            $e_name = $_GET['e_name'];
            $e_mobile = $_GET['e_mobile'];
            $e_email = $_GET['e_email'];
            $e_state = $_GET['e_state'];
            $e_city = $_GET['e_city'];
            $e_address = $_GET['e_address'];

            mysqli_query($conn,"update manage_customer set name='".$e_name."',mobile_no='".$e_mobile."',email='".$e_email."',state='".$e_state."',city='".$e_city."',address='".$e_address."' where id = '".$e_id."' ");

            echo '<script>
                    $("#e_alert").css("display","block");
                    $("#e_alert").text("Account Update Sucessfully");
                    $("#e_alert").css("color","green");
                 </script>';
             }
        else{
               echo '<script>
                         $("#e_alert").css("display","block");
                         $("#e_alert").text("Account Not Updated");
                         $("#e_alert").css("color","red");
                      </script>';
             }

 ?>
