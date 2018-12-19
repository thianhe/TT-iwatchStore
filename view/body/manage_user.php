<script>document.title = 'Manage User'</script>
<div class="jumbotron">
    <div class="container">
        <div class="row user_info">
            <div class="col-12">
                User Info
            </div>

            <div class="col-2">Identity</div>
            <div class="col-4">
                <?php
                    if($userInfo['member_id'] < 0) echo "Staff";
                    else echo "Customer";
                ?>
            </div>

            <div class="col-2">Account</div>
            <div class="col-4"><?php echo $userInfo['account'];?></div>

            <div class="col-2">Email</div>
            <div class="col-10"><?php echo $userInfo['email'];?></div>

            <div class="col-2">First Name</div>
            <div class="col-4"><?php echo $userInfo['first_name'];?></div>

            <div class="col-2">Last Name</div>
            <div class="col-4"><?php echo $userInfo['last_name'];?></div>

            <div class="col-2">Phone Number</div>
            <div class="col-4"><?php
                if($userInfo['phone_number'] == '0') echo'Undefined'; 
                else echo $userInfo['phone_number']?></div>

            <div class="col-2">Birthday</div>
            <div class="col-4"><?php 
                if($userInfo['birthday'] == '0000-00-00') echo'Undefined'; 
                else echo $userInfo['birthday']?></div>
            
            <div class="col-2">Gender</div>
            <div class="col-4"><?php 
                if($userInfo['gender'] == 'M') echo'Male'; 
                else if($userInfo['gender'] == 'M') echo'Female';
                else echo 'Undefined'?></div>
        </div>
        <div class="row">
            <div class="col-2 edit_form">
                <form action="<?php echo Config::BASE_URL?>user_edit" method="post">
                    <input type="hidden" name="account" value="<?php echo $userInfo['account'];?>">
                    <input type="submit" name="submit" value="Edit">
                </form>
            </div>
            <div class="col-2 delete_form">
                <form action="<?php echo Config::BASE_URL?>do_deletemember" method="post">
                    <input type="hidden" name="account" value="<?php echo $userInfo['account'];?>">
                    <input type="submit" name="submit" value="SURE">
                </form>
                <span class="mask"></span>
                <a class="f_delete text-center" href="#" >Delete</a>
            </div>
            <div class="col-2 text-center">
                <a href="user_setting">
                    <i class="fas fa-users-cog"></i>
                    All User
                </a>
            </div>
        </div>
        
    </div>
</div>