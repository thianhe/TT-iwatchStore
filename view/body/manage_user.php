<script>document.title = 'Manage User'</script>
<div class="jumbotron">
    <div class="container">
        <div class="row container">
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
        <div class=" row">
            <div class="col-10">
                <a href="user_setting " class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Go Back To Edit User
                </a>
            </div>
                <div class="col-2 delete_form">
                <form action="'.Config::BASE_URL.'do_deletemember" method="post">
                    <input type="hidden" name="account" value="'.$userInfo['account'].'">
                    <input type="submit" name="submit" value="SURE">
                </form>
                <span class="mask"></span>
                <button class="f_delete text-center">Delete</button>
            </div>
        </div>';
        ?>
    </div>
</div>