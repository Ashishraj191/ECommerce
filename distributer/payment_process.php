<?php
    include '_dbconnection.php';
    if (isset($_POST['payment_id'])) {
        $distributer_id =  $_POST['distributer_id'];
        $status = $_POST['payment_status'];
        $amount = $_POST['amount'];
        $result = mysqli_query($conn,"insert into payment (distributer_id,name,email,mobile,amount,payment_status,payment_id,date_time) values('".$distributer_id."','".$_POST['name']."','".$_POST['email']."','".$_POST['mobile']."','".$_POST['amount']."','".$status."','".$_POST['payment_id']."',CURRENT_TIMESTAMP)");
        $results = mysqli_query($conn, "UPDATE `manage_distributer` SET `payment_status` = '$status', `payment_amount` = $amount, `date_of_activate` = CURRENT_TIMESTAMP WHERE `manage_distributer`.`id` = '$distributer_id'");
        if ($result == TRUE) {
            echo "true";
        }else{
            echo "false";
        }
        
    }
?>