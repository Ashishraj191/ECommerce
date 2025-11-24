<?php
   include '../_dbconnection.php';
$categoryResult = mysqli_query($conn,"select * from shop_category");
if (isset($_GET['plan'])) {
    $plan = $_GET['plan'];
    $membershipResult = mysqli_query($conn,"select * from membership where membership_id = ".$plan."");
    if (mysqli_num_rows($membershipResult) == 1) {
        $row = mysqli_fetch_array($membershipResult);
        $product_limit = $row['product_limit'];
    }
}
?>

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
                            <input name="member" id="member" value="<?php echo $plan?>" style="display:none">
                            <input name="pro_limit" id="pro_limit" value="<?php echo $product_limit?>" style="display:none">
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
                                <input type="number" name="mobile" id="mobile" required placeholder="Your Mobile"/>
                            </div>
                            <div class="form-group">
                                <label for="s_name"><i class="zmdi zmdi-home material-icons-name"></i></label>
                                <input type="text" name="s_name" id="s_name" required placeholder="Shop Name"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-view-list-alt"></i></label>
                                <select name="s_category" id="s_category" style="width:100%;display: block;border: none;border-bottom: 1px solid #999;padding: 6px 30px;font-family: Poppins;box-sizing: border-box;">
                                    <option value="">-- Shop Category --</option>
                                    <?php
                                        while ($row = mysqli_fetch_array($categoryResult)) {
                                            echo '<option value="'.$row['shop_category_id'].'">'.$row['category_name'].'</option>';
                                        }
                                    ?>
                                </select>
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
        membership = $("#member").val();
        s_name = $("#s_name").val();
        pro_limit = $("#pro_limit").val();
        s_category = $("#s_category").val();
        pass = $("#pass").val();
        re_pass = $("#re_pass").val();
        signup = $("#signup").val();

        var nameVal = /^[A-Za-z ]+$/;
        var mobileVal =  /^[1-9]{1}[0-9]{9}$/;
        var emailVal =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var passVal =  /^[A-Za-z]\w{7,14}$/;

        if (name==null || name=="") {
            $("#alert").text("Please enter your name");
            $("#name").focus();
        }
        else if (name.length<3) {
            $("#alert").text("Please enter Vailid name");
            $("#name").focus();
        }
        else if (!name.match(nameVal)) {
            $("#alert").text("name is Invalid");
            $("#name").focus();
        }
        else if (email==null ||email=="") {
            $("#alert").text("Please enter your email");
            $("#email").focus();
        }
        else if (!email.match(emailVal)) {
            $("#alert").text("Email is Invalid");
            $("#email").focus();
        }
        else if (mobile==null ||mobile=="") {
            $("#alert").text("Please enter your mobile");
            $("#mobile").focus();
        }
        else if (!mobile.match(mobileVal)) {
            $("#alert").text("Mobile Number is Invalid");
            $("#mobile").focus();
        }
        else if (mobile.length!=10) {
            $("#alert").text("Please enter Vailid Mobile");
            $("#mobile").focus();
        }
        else if (s_name==null ||s_name=="") {
            $("#alert").text("Please enter shop name");
            $("#s_name").focus();
        }
        else if (s_name.length<4) {
            $("#alert").text("Please enter Vailid shop name");
            $("#s_name").focus();
        }
        else if (!s_name.match(nameVal)) {
            $("#alert").text("name is Invalid");
            $("#s_name").focus();
        }
        else if (s_category==null ||s_category=="") {
            $("#alert").text("Please enter shop category");
            $("#s_category").focus();
        }
        else if (pass==null ||pass=="") {
            $("#alert").text("Please enter your paasword");
            $("#pass").focus();
        }
        else if (pass.length<7) {
            $("#alert").text("Please enter Vailid Password");
            $("#pass").focus();
        }
        else if (!pass.match(passVal)) {
            $("#alert").text("Password : [7 to 15 characters which contain only characters, numeric digits, underscore and first character must be a letter]");
            $("#pass").focus();
        }
        else if (re_pass==null ||re_pass=="") {
            $("#alert").text("Please enter your Confirm password");
            $("#re_pass").focus();
        }
        else if (pass!=re_pass) {
            $("#alert").text("Please check your paasword");
            $("#pass").focus();
        }
        else {
            $.get("register_c.php",{name:name,email:email,mobile:mobile,membership:membership,pro_limit:pro_limit,s_name:s_name,s_category:s_category,re_pass:re_pass,signup:signup},function(data){
                $("#alert").html(data);
            })
        }

    });
</script>


 <script type="text/javascript">
    $("#name, #email, #mobile, #pass, #re_pass").keyup(function(){
        $("#alert").hide();
    });
 </script>