<script>document.title = 'Login'</script>
<div class="jumbotron">
<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="do_login" autocomplete="off">
				<h2>Please Login</h2>
				<p><a href='register'>Register a New Account</a></p>
				<hr>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="" tabindex="1">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 <a href='forget'>Forgot your Password?</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>
</div></div>