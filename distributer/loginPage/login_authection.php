<?php 
   include '../_dbconnection.php';
   if(isset($_GET['signin'])){

      $d_uid= mysqli_real_escape_string($conn, $_GET['username']);
      $pwd= md5($_GET['password']);

      $sql="SELECT id,name,mobile_no,email,password,product_limit,shop_category_id,membership_id,payment_status FROM manage_distributer WHERE email = '{$d_uid}' AND password = '{$pwd}'";

      $result= mysqli_query($conn,$sql) or die("Query Failed");

      if (mysqli_num_rows($result) > 0) {
        
         while ($row = mysqli_fetch_assoc($result)) {
  
            session_start();
            session_destroy();
            session_start();
            $_SESSION['d_uid'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['mobile'] = $row['mobile_no'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['product_limit'] = $row['product_limit'];
            $_SESSION['shop_category_id'] = $row['shop_category_id'];
            $_SESSION['membership_id'] = $row['membership_id'];
            $_SESSION['payment_status'] = $row['payment_status'];

            echo '<script>
                     $("#alert").text("Success..");
                     $("#alert").css("color","green");
                     setTimeout(off,1000);
                     function off(){
                        window.location="../dashboard.php";
                     }
                 </script>';
         }
      }
      else{
         echo '<script>
               $(function(){
                     $("#alert").text("Username & Password is Wrong");
                     $("#alert").css("color","red");
                  });
               </script>';
      }

   }
 ?>