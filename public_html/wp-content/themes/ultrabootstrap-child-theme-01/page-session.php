<?php /* Template Name: Clear session */ ?>
<?php get_header(); ?>

<?php
	
	  if ($_GET['redirect'] == (true)){
//		  $hurl = $_GET['redirect'];
	  }

      global $woocommerce;
      $wc_session = $woocommerce->session;
      $cookie = $wc_session->get_session_cookie();

      // define a default session duration
      $session_lifetime = DAY_IN_SECONDS * 2;
      $session = $_SESSION;
      $time = time();

      // Check check if a wp_woocommerce_session cookie expiration exists and > current timestamp
      // if no session user is defined, and a woocommerce cookie is,
      // trash the woocommerce cookie
      if (isset($cookie[1]) && $cookie[1] > $time) {
          if (isset($session['user'])) {
              $session_lifetime = $cookie[1] - $time;
          }
          else {
              $sessionHandler = new WC_Session_Handler();
              $sessionHandler->destroy_session();
              $sessionHandler->cleanup_sessions();

		foreach($_COOKIE as  $key => $val)
		{
//			echo "cookie name = ".$key.", and value = ".$val."\n";
			if (strchr($key, "wp_woocommerce_session_") || strchr($key, "yith_wcms")) {
				?>
				<script>
				function unSetCookieForMePlease() {
					var date = new Date();
					date.setTime(date.getTime()-(3600));
					var expires = "; expires="+date.toGMTString();
					name = "<?php echo $key; ?>";
					value = "NULL";
					
					document.cookie = name+"="+value+expires+"; path=/zapalgo/";
					document.cookie = name+"="+value+expires+"; path=/";
				}
				
				unSetCookieForMePlease();
				</script>
				
				<?
			}
		}

//		  echo '<script>window.location.href = "http://www.e-conex.pl/zapalgo/?showpopup=true";</script>';
	  }
	}
		
		if (isset($_GET['redirect'])) {
?>		<script>
				function setRedirectCookiePlease() {
					var date = new Date();
					date.setTime(date.getTime()+(30*1000));
					var expires = "; expires="+date.toGMTString();
					name = "redirect";
					value = "login-page";
					
					document.cookie = name+"="+value+expires+"; path=/zapalgo/";
					document.cookie = name+"="+value+expires+"; path=/";
				}
				
				setRedirectCookiePlease();
			</script>
<?
			echo '<script>window.location.href = "http://www.zapalgo.com/?showpopup=true';
//			echo "&redirect=".$_GET['redirect'];
		} else {
			echo '<script>window.location.href = "http://www.zapalgo.com/?showpopup=true';			
		}
		echo '";</script>';
?>

<?php get_footer(); ?>
