<script>document.title = 'Login'</script>
<div class="jumbotron">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="jumbotron" id="big_jumbotron">
				<form form="login_form" role="form" method="post" action="<?=Config::BASE_URL?>do_login" autocomplete="off" class="text-center">
					<h2>Please Login</h2>
					<p><a href='register'>Register a New Account</a></p>
					<hr class="hr_black">
					<?php
						//check for any errors
						if ($msg->hasMessages()) {
							$msg->display();
						}
					?>
					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control input-lg" required placeholder="Account"
						 value="" tabindex="1">
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" required placeholder="Password"
						 tabindex="3">
					</div>

					<div class="text-center">
						<a href='forget'>Forgot your Password?</a>
					</div>

					<hr class="hr_black">
					<div class="row">
						<div class="col-xs-6 col-md-6 ">
							<div class="g-recaptcha" data-sitekey="6LdlbIQUAAAAAAYd6pVHptc1AtYO4SKrURPeO_qF"></div>
						</div>
					</div>
					<div class="btn-block">
						<input type="submit" name="submit" value="Login" class="text-center btn btn-primary btn_la btn-block btn-lg "
						 tabindex="5">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>