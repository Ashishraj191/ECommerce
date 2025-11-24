<?php 
   include '../_dbconnection.php';
   if(isset($_GET['signin'])){

      $email= mysqli_real_escape_string($conn, $_GET['username']);
      $pwd= md5($_GET['password']);

      $sql="SELECT * FROM admin WHERE email = '{$email}' AND password = '{$pwd}'";

      $result= mysqli_query($conn,$sql) or die("Query Failed");
 
      if (mysqli_num_rows($result) > 0) {
         
         while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['name'] = $row['name'];
            $_SESSION['uid'] = $row['email'];
            $_SESSION['id'] = $row['id'];

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