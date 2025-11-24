<?php
  session_start();
  include '_dbconnection.php';
  if(isset($_POST["activate"])){
    $did = $_SESSION["id"];
    $name = $_SESSION["name"];
    $email = $_SESSION["d_uid"];
    $mobile = $_SESSION["mobile"];
    $membership_id = $_SESSION["membership_id"];
    $result = mysqli_query($conn,"select * from membership where membership_id = '".$membership_id."'");
    $membership_detail = mysqli_fetch_array($result);
  }

?>
<html>

<head>
  <title>Pay</title>
 
</head>

<body>
  <h2 id="loading">Please wait...</h2>
  <button id="rzp-button1">Pay</button>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>
    var options = {
      "key": "rzp_live_mJIJyReSLNht3k", // Enter the Key ID generated from the Dashboard
      "amount": "<?php echo $membership_detail['price']*100?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
      "currency": "INR",
      "name": "Uchhal Ads",
      "description": "Test Transaction",
      "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/1200px-Heart_coraz%C3%B3n.svg.png",
      // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
      // "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
      "prefill": {
        "name": "<?php echo $name?>",
        "email": "<?php echo $email?>",
        "contact": "91+<?php echo $mobile?>"
      },
      "notes": {
        "address": "Razorpay Corporate Office"
      },
      "theme": {
        "color": "#3399cc"
      },
      "handler": function(response){
        $.post("payment_process.php",{payment_id:response.razorpay_payment_id,distributer_id:<?php echo $did?>,name:"<?php echo $name?>",email:"<?php echo $email?>",mobile:"<?php echo $mobile?>",amount:<?php echo $membership_detail['price']?>,payment_status:"success"})
        .done(function(data) {
          // console.log(data);
          window.location="dashboard.php"
        })
      }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
    $(document).ready(function(){
      $("#rzp-button1").click();
      $("#rzp-button1").hide();
      $("#loading").hide();
    })
  </script>
</body>

</html>