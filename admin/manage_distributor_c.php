<?php    

    include '_dbconnection.php';
 ?>
	<h3 style="float: left;margin-top: 0px;">View Distributer</h3>
                    <table width="100%">
                        <tr class="rows">
                            <th>SL.No</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>E-mail</th>
                            <th>plan</th>
                            <th>DOR</th>
                            <th>DOA</th>
                            <th>status</th>
                        </tr>

                        <?php 
                        	$query = mysqli_query($conn,"select *from manage_distributer where concat(id,name,mobile_no,email,city,state,address,payment_status) like '%".@$_GET['search']."%' order by created_at desc");
                                                $sl_no = 0;

                                                while($row = mysqli_fetch_array($query))
                                                {
                                                    echo"<tr bgcolor='white'>";
                                                        $id = $row['id'];

                                                            echo"<td>";
                                                                echo ++$sl_no;
                                                            echo"</td>";

                                                        if ($row['payment_status'] == 'success') {
                                                            echo'<td style="color:green">'.$row['name'].' ('.$row["id"].')</td>';
                                                        }else{
                                                            echo'<td style="color:red">'.$row['name'].' ('.$row["id"].')</td>';
                                                        }

                                                        echo"<td>";
                                                                    echo $row['mobile_no'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['email'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['membership_id'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['created_at'];
                                                        echo"</td>";

                                                        echo"<td>";
                                                                    echo $row['created_at'];
                                                        echo"</td>";

                                                        if ($row['payment_status'] == 'success') {
                                                            echo'<td style="color:green">'.$row['payment_status'].'</td>';
                                                        }else{
                                                            echo'<td style="color:red">'.$row['payment_status'].'</td>';
                                                        }
                                                        
                                                    }

                         ?>
                       
			</table>
		</div>
</div>