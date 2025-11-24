<?php 
   $conn = mysqli_connect("localhost","root","","sshajipur");
   if(isset($_GET['signin'])){

      $uid= mysqli_real_escape_string($conn, $_GET['username']);
      $pwd= $_GET['password'];

      $sql="SELECT id,name,mobile_no,email,password FROM admin WHERE mobile_no = '{$uid}' AND password = '{$pwd}'";

      $result= mysqli_query($conn,$sql) or die("Query Failed");
 
      if (mysqli_num_rows($result) > 0) {
         
         while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['name'] = $row['name'];
            $_SESSION['uid'] = $row['mobile_no'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['mail'] = $row['email'];

            echo '<script>
                     $("#alert").text("Success..");
                     $("#alert").css("color","green");
                     setTimeout(off,1000);
                     function off(){
                        window.location="../admin/dashboard.php";
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