<?php
    include '../_dbconnection.php';
    $retval = "";
    if(isset($_GET['forget_password'])){
        $email = $_GET['email'];
        $query = mysqli_query($conn,"select name from manage_distributer where email = '".$email."'");
        if (mysqli_num_rows($query) == 1){
            $row = mysqli_fetch_array($query);
            $token = bin2hex(random_bytes(15));
            $query = mysqli_query($conn,"update manage_distributer set token ='".$token."' where email = '".$email."'");
             $to = $email;
             $subject = "Reset Password";
             
             $message = "<b>Click below for Reset password</b><br>
                            http://uchhalads.in/distributer/loginPage/update_password.php?key=$token";
             $message .= "<h1>Uchhal Ads</h1>";
             
             $header = "From:noreply@uchhalads.in \r\n";
             $header .= "MIME-Version: 1.0\r\n";
             $header .= "Content-type: text/html\r\n";
             
             $retval = mail ($to,$subject,$message,$header);
        }else{
            echo '<p style="color:red">Not Registerd email</p>';
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
 
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <form action="forget_password.php" method="get">
                        <div class="signin-form">
                            <?php if($retval == true){
                                    echo '<p style="color:green">Reset link is send on your email. Check your email !</p>';
                            }
                    ?>
                            <h2 class="form-title">Forget Password</h2>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email"  name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="forget_password" class="form-submit">Send Email</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>




