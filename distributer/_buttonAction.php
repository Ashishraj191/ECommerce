<?php
    include '_dbconnection.php';
    if (isset($_POST['deleteEnquiry'])) {
       $product_enquiry_id = $_POST['id'];
       $query = mysqli_query($conn,"DELETE FROM `product_enquiry` WHERE `product_enquiry`.`product_enquiry_id` = $product_enquiry_id");
       if ($query) {
           echo $query;
       }
    }

?>