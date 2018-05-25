<?php /* Template Name: Login Page */ ?>
<?php get_header(); ?>

<style>
.col-sm-6.register-custom a,
.col-sm-6.login-custom a {
	color: #fff;
}
</style>

<empty-space></empty-space>

<div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.7); text-align: center; padding: 30px 0;">
<div class="custom-container">
		  			<div class="row">
		  				<div class="col-sm-6 login-custom">
							<div class="title">Customer Login</div>
							<div class="subtitle">Login in to check out faster, access your order history, track new orders and save items in your cart.</div>
		  					
		<form name="loginform" id="loginform" action="http://www.e-conex.pl/zapalgo/wp-login.php" method="post">
			
			<p class="login-username">
				<label for="user_login">Username or Email Address</label>
				<input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="Email">
			</p>
			<p class="login-password">
				<label for="user_pass">Password</label>
				<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" placeholder="Password">
			</p>
			
			<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In">
				<input type="hidden" name="redirect_to" value="http://www.e-conex.pl/zapalgo/">
			</p>
			
		</form>		  					<div class="forgot-password">
		  						<a href="http://www.e-conex.pl/zapalgo/my-account/lost-password/">Forgot your password?</a>
		  					</div>
		  					<div class="sign-up">
		  						Don't have an account? <a href="http://www.e-conex.pl/zapalgo/my-account/">Sign up</a>
		  					</div>
		  				</div>
		  				<div class="col-sm-6 register-custom">
		  					<div class="title">Retailer Login</div>
							<div class="subtitle">Log in for easy quoting, simple ordering, order history access, new orders tracking and more.</div>
		  												<div class="login-custom">
								<p class="login-submit" style="height: 110px;">
									<a href="http://www.e-conex.pl/retailer/">
										</a></p><div class="login-submit-like"><a href="http://www.e-conex.pl/retailer/">
											GO TO RETAILER WEBSITE
										</a></div><a href="http://www.e-conex.pl/retailer/">
									</a>	
								<p></p>
							</div>
		  					<div class="sign-up">
		  						Want to become a retailer?
		  					</div>
		  					<div class="sign-up">
								<a href="http://www.e-conex.pl/zapalgo/for-retailers/">Contact for retailers</a>
							</div>
		  				</div>
		  			</div>
		  		</div>
</div>

<?php get_footer(); ?>