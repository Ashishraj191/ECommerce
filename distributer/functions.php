<?php
    include '_dbconnection.php';
  

    function totalProductAdded($conn,$distributer_id){
        $result = mysqli_query($conn,"select * from manage_product where distributer_id = '".$distributer_id."'");
        $totalProductAdded = mysqli_num_rows($result);
        echo $totalProductAdded;
    }

    function totalEnquiry($conn,$distributer_id){
        $result = mysqli_query($conn,"select * from manage_product where distributer_id = '".$distributer_id."'");
        $totalProductAdded = mysqli_num_rows($result);
        echo $totalProductAdded;
    }

    function thisMonthEnquiry($conn,$distributer_id,$month,$year){
        $result = mysqli_query($conn,"select * from product_enquiry where distributer_id = '".$distributer_id."' and year(date_time) = '".$year."' and month(date_time) = '".$month."'");
        $totalProductAdded = mysqli_num_rows($result);
        echo $totalProductAdded;
    }
    // totalProductAdded($conn,$distributer_id);
    // echo "<br>";
    // thisMonthEnquiry($conn,$distributer_id,$month,$year);
?>