<script>document.title = 'Register'</script>
<div class="jumbotron">
	<div class="container">
		<div class="row">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form role="form" method="post" action="<?=Config::BASE_URL?>do_user_edit" autocomplete="off">
					<h2>Edit User</h2>
					<hr>
					<?php 
					//check for any errors
					if ($msg->hasMessages()) $msg->display();?>
					<div class="form-group">
						<label for="account">Account: </label>
						<?php echo $userInfo['account'] ?>
                        <input type="hidden" name="account" value="<?php echo $userInfo['account']?>">
					</div>
					<div class="form-group">
						<label for="email">Email: </label>
						<?php echo $userInfo['email'] ?>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<label for="firstName">First Name*</label>
								<input type="text" name="firstName" id="firstName" class="form-control input-lg" required placeholder="First Name" value="<?php echo $userInfo['first_name']; ?>"tabindex="5">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<label for="lastName">Last Name*</label>
								<input type="text" name="lastName" id="lastName" class="form-control input-lg" required placeholder="Last Name" value="<?php echo $userInfo['last_name']; ?>"tabindex="6">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="bday">Birthday</label>
						<input type="text" name="bday" id="bday" placeholder="YYYY-MM-DD" class="form-control input-lg" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter a date in this format YYYY-MM-DD"value="<?php if($userInfo['birthday'] != '0000-00-00') echo $userInfo['last_name'];?>"tabindex="7"/>
					</div>
					<div class="form-group">
						<label for="phoneNumber">Phone Number</label>
						<input type="tel" name="phoneNumber" id="phoneNumber" class="form-control input-lg" placeholder="Phone Number" value="<?php if($userInfo['phone_number'] != '0'){ echo $userInfo['phone_number']; }?>"tabindex="8">
					</div>
					<div class="form-group">
					<label for="gender">Gender</label>
						<div class="row">
							<div class="col-6"><input type="radio" name="gender" value="M"tabindex="9"<?php if($userInfo['gender'] == 'M') echo'Checked'?>> Male</div> 
							<div class="col-6"><input type="radio" name="gender" value="F"tabindex="10"<?php if($userInfo['gender'] == 'F') echo'Checked'?>> Female</div>
  						</div>
					</div>
					<input type="hidden" id="identity" name="identity" value="C">
					<p>* required</p>
					<div class="row">
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>      