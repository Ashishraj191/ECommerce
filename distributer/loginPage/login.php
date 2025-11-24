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
    <link rel="stylesheet" type="text/css" href="css/payment.css?v=33">
</head>

<body>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Choose our service plan</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead style="color: gold;font-size: 16px;margin-top: -90px;">
                            <tr>
                                <th> </th>
                                <th>Platinum</th>
                                <th>Silver</th>
                                <th>Gold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Product limit</td>
                                <td>5</td>
                                <td>25</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>Sevices</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                            <tr>
                                <td>Support</td>
                                <td><i class="fa fa-close"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                            <tr>
                                <td>Membership</td>
                                <td><i class="fa fa-close"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                            <tr>
                                <td>Leads</td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                            <tr>
                                <td>Extra features</td>
                                <td><i class="fa fa-close"></i></td>
                                <td><i class="fa fa-check"></i></td>
                                <td><i class="fa fa-check"></i></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <div class="row col-sm-3 membershipCard" id="membershipCard1">
                            <h5 style="float: left;font-weight: bold;">Platinum</h5><br><br>
                            <h4 style="float:left;">100 Rs/Year</h4>
                        </div>
                        <div class="row col-sm-3 membershipCard" id="membershipCard2">
                            <h5 style="float: left;color: gold;font-weight: bold;">Silver</h5>
                            <br><br>
                            <h4 style="float:left;">500 Rs/Year</h4>
                        </div>
                        <div class="row col-sm-3 membershipCard" id="membershipCard3">
                            <h5 style="float: left;color: gold;font-weight: bold;">Gold</h5>
                            <br><br>
                            <h4 style="float:left;">5000 Rs/Year</h4>
                        </div>
                        <div class="row col-sm-2" style="margin-left: 5px;">
                            <br>
                            <button id="membershipBtn" class="btn btn-primary" style="width: 150px; height: 50px;">Continue <i
                                    class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a class="signup-image-link" data-toggle="modal" data-target="#myModal">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="your_name" id="username" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                        </div>
                        <center>
                            <div id="alert" style="color: red;"></div>
                        </center>
                        <center>
                            <div>Don't remember password ? <a href="forget_password.php"><b>Forget Password</b></a></div>
                        </center>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
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

</script>

<script type="text/javascript">
    $(function () {
        $("#username").focus();
        $("#signin").click(function () {
            $("#alert").css("display", "block")
            username = $("#username").val();
            password = $("#password").val();
            signin = $("#signin").val();

            if (username == "") {
                $("#username").focus();
                $("#alert").text("Username is required");
            }
            else if (password == "") {
                $("#password").focus();
                $("#alert").text("Password is required");

            }
            else {
                $.get("login_authection.php", { username: username, password: password, signin: signin }, function (data) {
                    $("#alert").html(data);
                });
            }

        });
    });

    $("#username, #password").keyup(function () {
        $("#alert").css("display", "none");
    });

    $("#membershipCard1").click(function () {
        $(this).css("background-color", "rgb(67, 195, 246)");
        $("#membershipCard2").css("background-color", "");
        $("#membershipCard3").css("background-color", "");
        $("#membershipBtn").val(1);
    })
    $("#membershipCard2").click(function () {
        $(this).css("background-color", "rgb(67, 195, 246)");
        $("#membershipCard1").css("background-color", "");
        $("#membershipCard3").css("background-color", "");
        $("#membershipBtn").val(2);
    })
    $("#membershipCard3").click(function () {
        $(this).css("background-color", "rgb(67, 195, 246)");
        $("#membershipCard1").css("background-color", "");
        $("#membershipCard2").css("background-color", "");
        $("#membershipBtn").val(3);
    })

    $("#membershipBtn").click(function () {
        plan = $("#membershipBtn").val();
        if(plan != ""){
            window.location.href = `./register.php?plan=${plan}`;
        }else{
            alert("Choose any one paln !")
        }
    })
</script>



