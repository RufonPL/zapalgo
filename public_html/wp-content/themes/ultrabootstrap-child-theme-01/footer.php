<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ultrabootstrap
 */

?>
<?php
	if (is_page (5)) {	?>
				<script>
					/* script that refreshes page after hitting "UPDATE CART" to avoid rendering multiple error messages */
					function updateCartRedirect () {
						body = document.getElementsByTagName("body");
						body[0].style.opacity = "0";
						setTimeout(function(){
						window.location.href = '<?php echo esc_url( WC()->cart->get_cart_url() );?>'}, 800);						
					}
					cartupdate = document.getElementsByClassName("cartupdate");
					productRemove = document.getElementsByClassName("product-remove");
					var cartArrayLength = cartupdate.length;
					var productRemoveLength = productRemove.length;
					cartupdate[cartArrayLength-1].addEventListener("click", updateCartRedirect);
					for (i = 0; i < productRemove.length; i++) {
						productRemove[i].addEventListener("click", updateCartRedirect);
						console.log("productRemove Event Listener"+i+" has been added");
					}
				</script>
	<?php } ?>

		
<?php if( customer_get_default_country() == false ) : ?>
	<div class="default-country-container">
      <div class="loadingContainer"></div>
      <div id="default-country-container-form" style="display: none">
        <?php $countries = woo_countries_list(); ?>
      </div>
	</div>
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
  $.get("https://ipinfo.io", function(response) {
      if(response && response.country){
        $('#customer_default_country').val(response.country);
        var currency = _set_currency(response.country),
		url = window.location.origin + window.location.pathname + '?&alg_currency=' + currency + '&customer_set_default_country=' + response.country;		
		window.location.replace(url);
      }else{
        $('#default-country-container-form').show();
        $('.default-country-container .loadingContainer').hide();
      }
}, "jsonp");
  
});
    
</script>
<?php endif; ?>

<?php // shows popup to choose country after redirected from /zapalgo/session/ site ?>
<?php if( $_GET['showpopup'] == true ) : ?>
	<?php // print_r($_GET);?>
	<div class="default-country-container">
	<?php $countries = woo_countries_list(); ?>
	</div>
<?php endif; ?>

<?php if (isset ($_GET['alg_currency'])) {
		?>
			<script>body = document.getElementsByTagName("body");
			body[0].style.opacity = "0";</script>
		<?
		foreach($_COOKIE as  $key => $val)
		{
			if (strchr($key, "wp_woocommerce_session_")) {
//				echo "key = $key";
				?>
				<script>
				function unSetCookieForMePlease() {
					console.log("wykonuje sie");
					var date = new Date();
					date.setTime(date.getTime()-(3600));
					var expires = "; expires="+date.toGMTString();
					name = "<?php echo $key; ?>";
					value = "NULL";
					
					document.cookie = name+"="+value+expires+"; path=/";
				}
				
				unSetCookieForMePlease();
				</script>
				
				<?
			}
		}
		
		if (isset($_COOKIE['redirect'])) {
			echo "fuck yeah!";
		}
		
		if (isset($_COOKIE['redirect'])) {
			$redirect = $_COOKIE['redirect'];
			echo '<script>document.cookie = "redirect=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";</script>';
			echo '<script>document.cookie = "redirect=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/zapalgo/;";</script>';
			echo '<script>window.location.href = "';
			echo bloginfo('url').$redirect;
			echo '";</script>';
		} else {
			echo '<script>window.location.href = "';
			echo bloginfo('url');
			echo '";</script>';
		}
}
?>

		<!-- Tab to top scrolling -->
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner">
  			<i class="fa fa-2x fa-angle-up"></i>
    		</span>
    	</div> 
			</div><!-- end of container tablet -->
		<footer class="desktop">
			<div class="container footers container-tablet">
		        <div class="row">
					
			        <div class="col-sm-3 newsletterCol">
			        	<div class="title-footer"><?php the_field('widget_1_title', 'options'); ?></div>
						<div class="footer-info email"><a href="mailto: <?php the_field('email', 'options'); ?>"><p><?php the_field('email', 'options'); ?></p></a></div>
						<div class="footer-info"><a href="tel: <?php the_field('phone_number_1', 'options'); ?>"><p><?php the_field('phone_number_1', 'options'); ?></p></a></div>
						<div class="footer-info"><a href="tel: <?php the_field('phone_number_2', 'options'); ?>"><p><?php the_field('phone_number_2', 'options'); ?></p></a></div>
                        <div class="footer-info address"><p><?php the_field('address', 'options'); ?></p></div>
			        </div>
                    <div class="col-sm-3 socialCol">
						<div class="social">
							<div class="title-footer"><?php the_field('widget_2_title', 'options'); ?></div>
                            <div class="shipPartners">
                              <img src="<?php echo get_template_directory_uri(); ?>/img/PayPal.svg"/>
                              <img src="<?php echo get_template_directory_uri(); ?>/img/VISA.svg"/>
                              <img src="<?php echo get_template_directory_uri(); ?>/img/MASTERCARD.svg"/>
                              <img src="<?php echo get_template_directory_uri(); ?>/img/american-express-1.svg"/>
                            </div>
                            <div class="title-footer"><?php the_field('widget_3_title', 'options'); ?></div>
							<?php if( have_rows('social_media', 'options') ):
								while ( have_rows('social_media', 'options') ) : the_row(); ?>
                                    <a href="<?php the_sub_field('link_sm', 'options'); ?>" target="_blank">
										<img src="<?php the_sub_field('img', 'options'); ?>" class="socialImg"/>
									</a>
								<?php endwhile;
							endif; ?>
						</div>
                      <div class="copy"><?php the_field('copyright', 'options'); ?></div>
					</div>
			        <div class="col-md-offset-3 col-md-3 noPadding contactUsCol">
			        	<div class="title-footer newsletter" style=" margin-bottom: 15px;"><?php the_field('widget_4_title', 'options'); ?></div>
                        <p class="addInfo"><?php the_field('newsletter_info', 'options'); ?></p>
						<div class="newsletter">
							<?php the_field('newsletter', 'options'); ?>
						</div>
                        <div class="addInfoUnderButton"><?php the_field('newsletter_under_button_info', 'options'); ?></div>
			        </div>
		        </div>
	    	</div>
		</footer>
            
        <footer class="mobile">
			<div class="container footers container-tablet">
		        <div class="row">
					
                  <div class="col-md-3 noPadding newsletterCol">
			        	<div class="title-footer newsletter" style=" margin-bottom: 15px;"><?php the_field('widget_4_title', 'options'); ?></div>
                        <p class="addInfo"><?php the_field('newsletter_info', 'options'); ?></p>
						<div class="newsletter">
							<?php the_field('newsletter', 'options'); ?>
						</div>
                        <div class="addInfoUnderButton"><?php the_field('newsletter_under_button_info', 'options'); ?></div>
			        </div>
                  
			        <div class="col-md-3 contactUsCol">
			        	<div class="title-footer"><?php the_field('widget_1_title', 'options'); ?></div>
						<div class="footer-info email"><a href="mailto: <?php the_field('email', 'options'); ?>"><p><?php the_field('email', 'options'); ?></p></a></div>
						<div class="footer-info"><a href="tel: <?php the_field('phone_number_1', 'options'); ?>"><p><?php the_field('phone_number_1', 'options'); ?></p></a></div>
						<div class="footer-info"><a href="tel: <?php the_field('phone_number_2', 'options'); ?>"><p><?php the_field('phone_number_2', 'options'); ?></p></a></div>
                        <div class="footer-info address"><p><?php the_field('address', 'options'); ?></p></div>
			        </div>
                    <div class="col-md-3 socialCol">
						<div class="social">
							<div class="title-footer"><?php the_field('widget_2_title', 'options'); ?></div>
                             <div class="shipPartners">
                              <img src="<?php echo get_template_directory_uri(); ?>/img/PayPal.svg"/>
                              <img src="<?php echo get_template_directory_uri(); ?>/img/VISA.svg"/>
                              <img src="<?php echo get_template_directory_uri(); ?>/img/MASTERCARD.svg"/>
                              <img src="<?php echo get_template_directory_uri(); ?>/img/american-express-1.svg"/>
                            </div>
                            
                            <div class="title-footer"><?php the_field('widget_3_title', 'options'); ?></div>
							<?php if( have_rows('social_media', 'options') ):
								while ( have_rows('social_media', 'options') ) : the_row(); ?>
                                    <a href="<?php the_sub_field('link_sm', 'options'); ?>" target="_blank">
										<img src="<?php the_sub_field('img', 'options'); ?>" class="socialImg"/>
									</a>
								<?php endwhile;
							endif; ?>
						</div>
                        <div class="copy"><?php the_field('copyright', 'options'); ?></div>
                      
					</div>
			        
		        </div>
	    	</div>
		</footer>

	<!-- write script to toggle class on scroll -->

	
		
		<?php wp_footer(); ?>
		
<?php
	$user = wp_get_current_user();
	if ( in_array( 'retailer', (array) $user->roles ) ) {
//		echo "jestem retailerem i nic się nie dzieje";
//		customer_set_cookie_default_country();
	?>
	<script>
/*		var custom_price = $('.custom-price-regular.js-custom-price-regular > .woocommerce-Price-amount').text();
		var custom_price = parseInt($('.custom-price-regular.js-custom-price-regular > .woocommerce-Price-amount').text());

		var procent = $('.custom-price-discount').text();
		var procent = parseInt($('.custom-price-discount').text());
		var customer_price = custom_price * procent/100;

		var custom_price_total = Math.ceil(custom_price + customer_price);
		$('.custom-price-sale.js-custom-price-sale > span.woocommerce-Price-amount.amount').text(custom_price_total);
		console.log(custom_price_total);*/
	</script>
	<?php
	} else {
//		echo "nie jestem retailerem i cena się zmienia";
//		customer_set_cookie_default_country();
		?>
<script>
	// script that takes price from bottom of configurator, and put it on top static price, so customer can see price changes whatever he pick custom finish.
	window.onload = function () {
		setTimeout(getPrice, 1000);
//		setTimeout(unHideHidden, 1000);
	}

// function that gets price under configurator and put it on top of it	
	function getPrice() {
		let hiddenprice = document.getElementsByClassName("final");
		if ($('.final').length > 0) {
			
			hiddenprice = hiddenprice[0].innerText;

			//inner text after currency symbol has a string "including VAT" which need to be sliced
			hiddenprice = hiddenprice.replace("(ex. VAT)", ""); // slice including VAT
			hiddenprice = hiddenprice.replace("(incl. VAT)", ""); // slice exluding VAT
			hiddenprice = hiddenprice.replace("(ex. tax)", ""); // slice exluding VAT
			hiddenprice = hiddenprice.replace("(incl. tax)", ""); // slice exluding VAT

			let price = document.getElementsByClassName("js-custom-price-sale");
			price = price[0].getElementsByClassName("woocommerce-Price-amount");
			price[0].innerText = hiddenprice;
			setTimeout(getPrice, 500);
		}
	}

</script>
	<?php
	}
	?>
	
<script>

// 	function to show hidden inputs
	function unHideHidden() {
		console.log("wgralo sie");

		let input = document.getElementsByTagName("input");
		console.log(input.length);
		for (i = 0; i < input.length; i++) {
			if (input[i].type == "hidden") {
				input[i].type = "text";
			}
		}
	}

</script>

     <div id="popupWrapper">
        <div id="newsletterPopup">
          <a href="#" onclick="$('#popupWrapper').hide(); setCookieZapalgo('popupDisable', 1, 1);" class="close">&times;</a>
          <div class="right">
            <h3>Zapalgo Newsletter</h3>
            <p>SIGN UP AND RECEIVE</p>
            <p class="big">10 % off</p>
            <p>YOUR ORDER</p>
            <p class="delimiter"></p>
            <form action="/?na=s" method="post" _lpchecked="1">
              <input type="hidden" name="nr" value="minimal">
              <input class="email" type="email" required="" name="ne" value="" placeholder="Enter your e-mail address">
              <input class="submit" type="submit" value="SIGN UP">
            </form>

            <div class="checkboxWrapper">
              <input type="checkbox" id="dontShowPopupAgain"> <label for="dontShowPopupAgain">Don't show this popup again </label>
            </div>

          </div>  
          <div class="left">
            <img class="globeImg" src="<?php echo get_template_directory_uri(); ?>/img/globe.png" width="148"/>
            <p class="weShip">WE SHIP</p>
            <p class="worldwide">WORLDWIDE</p>
            <div class="shipPartners">
              <img src="<?php echo get_template_directory_uri(); ?>/img/PayPal.svg"/>
              <img src="<?php echo get_template_directory_uri(); ?>/img/VISA.svg"/>
              <img src="<?php echo get_template_directory_uri(); ?>/img/MASTERCARD.svg"/>
              <img src="<?php echo get_template_directory_uri(); ?>/img/american-express-1.svg"/>
            </div>
          </div>
        </div>
      </div>


	</body>
</html>




