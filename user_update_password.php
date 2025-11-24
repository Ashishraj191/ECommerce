<?php
	include 'distributer/_dbconnection.php';
    $flag = 0;
        $key = $_GET['key'];
        if(isset($_GET['key'])){
            $query = mysqli_query($conn,"select name from manage_customer where token = '".$_GET['key']."'");
            if(mysqli_num_rows($query) == 1){
                if(isset($_POST['update_password'])){
                    $token = $_GET['key'];
                    if($token != ""){
                        $password = md5($_POST['password']);
                        $query = mysqli_query($conn,"update manage_customer set password ='".$password."', token = ''  where token = '".$token."'");
                        if ($query == 1){
                            // echo $query;
                            $flag = 1;
                        }
                    }
                }
            }else{
                 $flag = 2;
             }
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main css -->
  <link rel="stylesheet" href="distributer/loginPage/css/style.css">
</head>

<body>
 
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <form action="user_update_password.php?key=<?php echo $_GET['key']?>" method="post" id="updatePasswordForm">
                        <div class="signin-form">
                            <?php if($flag == 1){
                                    echo '<p style="color:green">Password successfully updated</p>';
                                    echo '<a href="index.php" class="form-submit">Go To Login</a>';
                                    
                            }else if($flag == 2){
                                echo '<p style="color:red">Link Expired</p>';
                            }else if (isset($_GET['key']) && $key !=""){
                                echo ' <h2 class="form-title">Update Password</h2>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="password" id="password" name="password" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="password" id="c_password" name="c_password" placeholder="Repete Password" required>
                            </div>
                            <div><p style="color:red" id="alert"></p></div>
                            <div class="form-group form-button">
                                <input name="update_password" hidden>
                                <button type="button" id="update_password" name="update_password" class="form-submit">Submit</button>
                            </div>';
                            }else{
                                 echo '<p style="color:red">Not a valid url</p>';
                            }
                    ?>
                           
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $("#update_password").click(function(){
            password = $("#password").val();
            c_password = $("#c_password").val();
            if (password == c_password){
                $('#updatePasswordForm').submit();
            }else{
                $("#alert").text("Passoword not match");
            }
        })
    </script>
</body>

</html>




