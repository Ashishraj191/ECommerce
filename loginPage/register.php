<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" required placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" required placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-phone"></i></label>
                                <input type="mobile" name="mobile" id="mobile" required placeholder="Your Mobile"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" required placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" required id="re_pass" placeholder="Repeat your password"/>
                            </div>
                             <!-- <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-home"></i></label>
                                <input type="address" name="address" id="address" placeholder="Your Address"/>
                            </div>
                             <div class="form-group">
                                <label for="city"><i class="zmdi zmdi-city"></i></label>
                                <input type="city" name="city" id="city" placeholder="Your City"/>
                            </div>
                            
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                                <select>
                                    <option>Select State</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                            <center><div id="alert" style="color: red;"></div></center>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php"  class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<script type="text/javascript">

    $("#signup").click(function(){

        $("#alert").show();

        name = $("#name").val();
        email = $("#email").val();
        mobile = $("#mobile").val();
        pass = $("#pass").val();
        re_pass = $("#re_pass").val();
        signup = $("#signup").val();

        if (name=="") {
            $("#alert").text("Please enter your name");
            $("#name").focus();
        }
        else if (email=="") {
            $("#alert").text("Please enter your email");
            $("#email").focus();
        }
        else if (mobile=="") {
            $("#alert").text("Please enter your mobile");
            $("#mobile").focus();
        }
        else if (pass=="") {
            $("#alert").text("Please enter your paasword");
            $("#pass").focus();
        }
        else if (re_pass=="") {
            $("#alert").text("Please enter your Confirm password");
            $("#re_pass").focus();
        }
        else if (pass!=re_pass) {
            $("#alert").text("Please check your paasword");
            $("#pass").focus();
        }

        else {
            $.get("register.php",{name:name,email:email,mobile:mobile,re_pass:re_pass,signup:signup},function(data){
                alert(data);
            })
        }

    });
</script>

<?php 
    

    $conn = mysqli_connect("localhost","root","","sshajipur");

    if (isset($_GET['signup'])) {

            $name = $_GET['name'];
            $email = $_GET['email'];
            $mobile = $_GET['mobile'];
            $pass = $_GET['re_pass'];


        mysqli_query($conn,"insert into admin(name,email,mobile_no,password) values('".$name."','".$email."','".$mobile."','".$pass."')");
    }
 ?>

 <script type="text/javascript">
    $("#name, #email, #mobile, #pass, #re_pass").keyup(function(){
        $("#alert").hide();
    });
 </script>