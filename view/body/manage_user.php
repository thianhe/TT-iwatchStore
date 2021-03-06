<script>document.title = 'Manage User'</script>
<div class="jumbotron">
    <div class="container">
        <div class="container">
            <?php
                 if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
                     echo' <div class="row" id="go_back">
                     <a href="user_setting" class="btn">
                         <i class="fas fa-arrow-left"></i>
                         Edit Users
                     </a>
                 </div>';
                 } 
           ?>
            <div class="row">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <div class="display-4">User Info</div>
                        <div class="edit-user-btn">
                            <form action="<?php echo Config::BASE_URL?>user_edit" method="post">
                                <input type="hidden" name="account" value="<?php echo $userInfo['account'];?>">
                                <button type="submit" name="submit" class="btn btn-info btn-edit-user btn-lg"><i class="fas fa-pen"></i>&nbsp;Edit</button>
                            </form>
                        </div>
                        <?php 
					//check for any errors
					if ($msg->hasMessages()) $msg->display();?>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Identity</td>
                    <td>
                        <?php 
                        if($userInfo['member_id'] < 0) 
                            echo "Staff"; 
                        else echo "Customer";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Account</td>
                    <td>
                        <?php echo $userInfo['account'];?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <?php echo $userInfo['email'];?>
                    </td>

                </tr>
                <tr>
                    <td>First Name</td>
                    <td>
                        <?php echo $userInfo['first_name'];?>
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <?php echo $userInfo['last_name'];?>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>
                        <?php
                        if($userInfo['phone_number'] == '0') echo'Undefined'; 
                        else echo $userInfo['phone_number'];
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <?php
                        echo $userInfo['address'];
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td>
                        <?php 
                        if($userInfo['birthday'] == '0000-00-00') echo'Undefined'; 
                        else echo $userInfo['birthday'];
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <?php 
                        if($userInfo['gender'] == 'M') echo'Male'; 
                        else if($userInfo['gender'] == 'M') echo'Female';
                        else echo 'Undefined';
                    ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <?php 
        if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0)
        echo '
        <div class="row d-flex justify-content-end">
            <div class="col-2 delete_form ">
                <form action="'.Config::BASE_URL.'do_deletemember" method="post">
                    <input type="hidden" name="account" value="'.$userInfo['account'].'">
                    <input type="submit" name="submit" value="SURE">
                </form>
                <span class="mask"></span>
                <button class="f_delete text-center">Delete</button>
            </div>
        </div>';
        ?>
        <div class="container">
            <div class="row">
                <div id="trace_filter" class="text-center col-2 filter" onclick="UserInfoFilter(1)">Trace list</div>
                <div id="order_filter" class="text-center col-2 filter" onclick="UserInfoFilter(2)">Order history</div>
            </div>
            <div id="trace_list" class="hide">
                <div class="row display-4">Trace List</div>
                <div class="row setting_list ">
                    <div class="col-8">Name</div>
                    <div class="col-2">quantity</div>
                </div>
                <div id="tracing_list">
                    <?php
                    foreach($traceList as $tl){
                    echo '
                    <div class="row setting_list">
                        <div class="col-8"><a href="product_info?id='.$tl['watch_id'].'">'.$tl['watch_name'].'</a></div>
                        <div class="col-2">'.$tl['quantity'].'</div>
                        <div class="col-2 delete_form">
                            <form action="'.Config::BASE_URL.'do_delete_trace" method="post">
                                <input type="hidden" name="watch_id" value="'.$tl['watch_id'].'">
                                <input type="hidden" name="member_id" value="'.$userInfo['member_id'].'">
                                <input type="hidden" name="account" value="'.$userInfo['account'].'">
                                <input type="submit" name="submit" value="SURE">
                            </form>
                            <span class="mask"></span>
                            <button class="f_delete text-center">Delete</button>
                        </div>
                    </div>
                    ';
                    }
                    ?>
                </div>
            </div>
            <div id="order_history" class="hide">
                <div class="row display-4">Order History</div>
                <div class="row setting_list ">
                    <div class="col-2">State</div>
                    <div class="col-2">DateTime</div>
                    <div class="col-2">OrderId</div>
                    <div class="col-2">receiver name</div>
                    <div class="col-3">receiver email</div>
                </div>
                <div id="order_list">
                <?php
                foreach($OrderList as $po){
                echo '
                <div class="row setting_list">
                    <div class="col-2">';
                        if($po['state'] == 'p')  echo "Processing"; 
                    else if($po['state'] == 'c') echo "Confirmed";
                    else if($po['state'] == 'f') echo "Finished";
                    echo'</div>
                    <div class="col-2">'.$po['date_time'].'</div>
                    <div class="col-2">'.$po['orderList_id'].'</div>
                    <div class="col-2">'.$po['r_name'].'</div>
                    <div class="col-3">'.$po['r_email'].'</div>
                    <div class="col-1 user_detail_button">
                    <form action="'.Config::BASE_URL.'manage_order" method="post">
                        <input type="hidden" name="orderList_id" value="'.$po['orderList_id'].'">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-info"></i>
                        </button>
                    </form>
                </div>
            </div>
             ';
            }
            echo '</div>';
            ?>
            </div>
        </div>
    </div>
</div>