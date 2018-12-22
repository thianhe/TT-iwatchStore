<script>document.title = 'User Setting'</script>
<div class="jumbotron">
    <div class="container">
        <div class="container">
            <div class="row" id="go_back">
                <a href="<?php echo $profilePage;?>" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Profile
                </a>
            </div>
            <div class="row">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <div class="display-4">Edit Users</div>                     
                    </div>
                    <button type="button" class=" btn btn-info btn-edit-user " href="#hidden_form" onclick="ShowAddForm()">
                        <i class="fas fa-plus"></i>&nbsp;Create User
                    </button>
                    <?php if ($msg->hasMessages()) $msg->display();?>
                </div>
            </div>
        </div>

        <div id="hidden_form" class="row hide">
            <a href="#hidden_form" class="cancel_button" onclick="HideAddForm()">X</a>
            <div class="col-xs-11 col-sm-10 col-md-8">
                <form role="form" method="post" action="<?=Config::BASE_URL?>do_register" autocomplete="off">

                    <div class="form-group">
                        <label for="account">Account*</label>
                        <input type="text" name="account" id="account" class="form-control input-lg" required
                            placeholder="Account" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['account'], ENT_QUOTES); } ?>"
                            tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email" class="form-control input-lg" required placeholder="Email Address"
                            value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>"
                            tabindex="2">
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" name="password" id="password" class="form-control input-lg"
                                    required placeholder="Password" tabindex="3">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="passwordConfirm">Confirm Password*</label>
                                <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg"
                                    required placeholder="Confirm Password" tabindex="4">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="firstName">First Name*</label>
                                <input type="text" name="firstName" id="firstName" class="form-control input-lg"
                                    required placeholder="First Name" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['firstName'], ENT_QUOTES); } ?>"
                                    tabindex="5">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="lastName">Last Name*</label>
                                <input type="text" name="lastName" id="lastName" class="form-control input-lg" required
                                    placeholder="Last Name" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['lastName'], ENT_QUOTES); } ?>"
                                    tabindex="6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bday">Birthday</label>
                        <input type="text" name="bday" id="bday" placeholder="YYYY-MM-DD" class="form-control input-lg"
                            pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter a date in this format YYYY-MM-DD"
                            value="<?php if(isset($error)){ echo htmlspecialchars($_POST['bday'], ENT_QUOTES); }?>"
                            tabindex="7" />
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control input-lg" placeholder="Phone Number"
                            value="<?php if(isset($error)){ echo htmlspecialchars($_POST['phoneNumber'], ENT_QUOTES); }?>"
                            tabindex="8">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control input-lg" placeholder="Address"
                            value="<?php if (isset($error)) {echo htmlspecialchars($_POST['address'], ENT_QUOTES);}?>"
                            tabindex="8">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="row">
                            <div class="col-6"><input type="radio" name="gender" value="M" tabindex="9"> Male</div>
                            <div class="col-6"><input type="radio" name="gender" value="F" tabindex="10"> Female</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="identity">Identity*</label>
                        <div class="row">
                            <div class="col-6"><input type="radio" name="identity" value="C" tabindex="9" checked>
                                Customer</div>
                            <div class="col-6"><input type="radio" name="identity" value="S" tabindex="10"> Staff</div>
                        </div>
                    </div>
                    <p>* required</p>
                    <div class="row">
                        <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg"
                                tabindex="11"></div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container row ">
            <div id="all_filter" class="text-center col-2 filter selected" onclick="UserFilter(0)">ALL</div>
            <div id="staff_filter" class="text-center col-2 filter" onclick="UserFilter(1)">STAFF</div>
            <div id="customer_filter" class="text-center col-2 filter" onclick="UserFilter(2)">CUSTOMER</div>
            <div class="col-6">
                <form id="searchBarForm" role="form" method="POST" action="<?=Config::BASE_URL?>user_setting"
                    autocomplete="off">
                    <div class="input-group stylish-input-group mb-1">
                        <input type="text" name="key" class="form-control" placeholder="Search User" required>
                        <span class="input-group-addon">
                            <input type="submit" name="submit" value="search" class="hidden" />
                        </span>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="submit" value="search" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit'])){
            
            echo' <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <h2>Your search result for "'.$key.'"</h2>
            </div>
            <a href="'.Config::BASE_URL.'user_setting"><i class="fas fa-times-circle fa-2x text-danger"></i></a>
        </div>';
            
        }
        ?>

        <div class="container">
            <div class="row setting_list ">
                <div class="col-2">Identity</div>
                <div class="col-3">Account</div>
                <div class="col-4">Email</div>
                <div class="col-3">Profile</div>
            </div>
            <?php
                echo'<div id="staff_list">';
                foreach($staffResult as $r){
                    echo '<div class="row setting_list">
                            <div class="col-2">Staff</div>
                            <div class="col-3">'.$r['account'].'</div>
                            <div class="col-4">'.$r['email'].'</div>
                            <div class="col-1 user_detail_button">
                                <form action="'.Config::BASE_URL.'manage_user" method="post">
                                    <input type="hidden" name="account" value="'.$r['account'].'">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-user-cog"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-2 delete_form">
                                <form action="'.Config::BASE_URL.'do_deletemember" method="post">
                                    <input type="hidden" name="account" value="'.$r['account'].'">
                                    <input type="submit" name="submit" value="SURE">
                                </form>
                                <span class="mask"></span>
                                <button class="f_delete text-center">Delete</button>
                            </div>
                        </div>';
                }
                echo '</div>
                <div id="member_list">';
                foreach($customerResult as $r){
                    echo '<div class="row setting_list ">
                            <div class="col-2">Customer</div>
                            <div class="col-3">'.$r['account'].'</div>
                            <div class="col-4">'.$r['email'].'</div>
                            <div class="col-1 user_detail_button">
                                 <form action="'.Config::BASE_URL.'manage_user" method="post">
                                    <input type="hidden" name="account" value="'.$r['account'].'">
                                    <button type="submit" class="btn btn-success">
                                    <i class="fas fa-user-cog"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-2 delete_form">
                                <form action="'.Config::BASE_URL.'do_deletemember" method="post">
                                    <input type="hidden" name="account" value="'.$r['account'].'">
                                    <input type="submit" name="submit" value="SURE">
                                </form>
                                <span class="mask"></span>
                                <button class="f_delete text-center">Delete</button>
                            </div>
                        </div>';
                }
                echo '</div>';
            ?>
        </div>
    </div>
</div>