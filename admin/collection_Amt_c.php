

<h3 style="float: left;margin-top: 0px;">View Collection</h3>
        <table width="100%">
            <tr class="rows">
                <th>SL.No(Id)</th>
                <th>Payment Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Amount</th>
                <th>status</th>
                <th>Date & Time</th>
            </tr>
            </script>
                    <?php 
                          include '_dbconnection.php';
                          $query = mysqli_query($conn,"select * from payment where concat(id,distributer_id,name,email,mobile,amount,payment_status,payment_id,date_time) like '%".@$_GET['search']."%' order by date_time desc");
                                                $sl_no = 0;

                                                while($row = mysqli_fetch_array($query))
                                                {
                                                    echo"<tr bgcolor='white'>";
                                                        $id = $row['id'];

                                                            echo"<td>";
                                                                echo ++$sl_no;
                                                            echo"</td>";

                                                        echo"<td>";
                                                                    
                                                                    echo $row["payment_id"];  
                                                        echo"</td>";

                                                        echo"<td>";
                                                                   echo '<a>'.$row['name'].'</a> ('.$row["distributer_id"].')';
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['email'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['mobile'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['amount'];
                                                        echo"</td>";

                                                        echo'<td style="color:green">'.$row['payment_status'].'</td>';   
                                                        
                                                        echo"<td>";
                                                            echo $row['date_time'];
                                                        echo"</td>";

                                                    }

                         ?>
        </table>