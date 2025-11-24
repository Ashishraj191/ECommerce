<h3 style="float: left;margin-top: 0px;">View Customer</h3>
        <table width="100%">
            <tr class="rows">
                <th>SL.No(Id)</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>E-mail</th>
                <th>City</th>
                <th>State</th>
                <th>Address</th>
                <th>DOR</th>
            </tr>
            </script>
                    <?php 
                           include '_dbconnection.php';
                          $query = mysqli_query($conn,"select *from manage_customer where concat(name,mobile_no,email,city,state,address) like '%".@$_GET['search']."%' order by name asc");
                                                $sl_no = 0;

                                                while($row = mysqli_fetch_array($query))
                                                {
                                                    echo"<tr bgcolor='white'>";
                                                        $id = $row['id'];

                                                            echo"<td>";
                                                                echo ++$sl_no;
                                                            echo"</td>";

                                                        echo"<td>";
                                                                    
                                                                    echo $row["name"];  
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['mobile_no'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['email'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['city'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['state'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['address'];
                                                        echo"</td>";    
                                                        
                                                        echo"<td>";
                                                            echo $row['created_at'];
                                                        echo"</td>";

                                                    }

                         ?>
        </table>