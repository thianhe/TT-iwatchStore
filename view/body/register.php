<script>document.title = 'Register'</script>
<div class="jumbotron">
	<div class="container">
		<div class="row d-flex justify-content-center">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 ">
				<form role="form" method="post" action="<?=Config::BASE_URL?>do_register" autocomplete="off">
					<h2>Please Sign Up</h2>
					<p>Already a member? <a href='login'>Login</a></p>
					<hr class="hr_black">
<?php
//check for any errors
if ($msg->hasMessages()) {
    $msg->display();
}
?>
					<div class="form-group">
						<label for="account">Account*</label>
						<input type="text" name="account" id="account" class="form-control input-lg" required placeholder="Account" value="<?php if (isset($error)) {echo htmlspecialchars($_POST['account'], ENT_QUOTES);}?>" tabindex="1">
					</div>
					<div class="form-group">
						<label for="email">Email*</label>
						<input type="email" name="email" id="email" class="form-control input-lg" required placeholder="Email Address" value="<?php if (isset($error)) {echo htmlspecialchars($_POST['email'], ENT_QUOTES);}?>" tabindex="2">
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<label for="password">Password*</label>
								<input type="password" name="password" id="password" class="form-control input-lg" required placeholder="Password" tabindex="3">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<label for="passwordConfirm">Confirm Password*</label>
								<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" required placeholder="Confirm Password" tabindex="4">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<label for="firstName">First Name*</label>
								<input type="text" name="firstName" id="firstName" class="form-control input-lg" required placeholder="First Name" value="<?php if (isset($error)) {echo htmlspecialchars($_POST['firstName'], ENT_QUOTES);}?>"tabindex="5">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<label for="lastName">Last Name*</label>
								<input type="text" name="lastName" id="lastName" class="form-control input-lg" required placeholder="Last Name" value="<?php if (isset($error)) {echo htmlspecialchars($_POST['lastName'], ENT_QUOTES);}?>"tabindex="6">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="bday">Birthday</label>
						<input type="text" name="bday" id="bday" placeholder="YYYY-MM-DD" class="form-control input-lg" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter a date in this format YYYY-MM-DD"value="<?php if (isset($error)) {echo htmlspecialchars($_POST['bday'], ENT_QUOTES);}?>"tabindex="7"/>
					</div>
					<div class="form-group">
						<label for="phoneNumber">Phone Number</label>
						<input type="tel" name="phoneNumber" id="phoneNumber" class="form-control input-lg" placeholder="Phone Number" value="<?php if (isset($error)) {echo htmlspecialchars($_POST['phoneNumber'], ENT_QUOTES);}?>"tabindex="8">
					</div>
					<div class="form-group">
					<label for="gender">Gender</label>
						<div class="row">
							<div class="col-6"><input type="radio" name="gender" value="M"tabindex="9"> Male</div>
							<div class="col-6"><input type="radio" name="gender" value="F"tabindex="10"> Female</div>
  						</div>
					</div>
					<input type="hidden" id="identity" name="identity" value="C">
					<p>* required</p>
					<div class="row justify-content-center">
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>