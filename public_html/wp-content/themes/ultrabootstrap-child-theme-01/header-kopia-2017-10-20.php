
<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ultrabootstrap
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- import jQuery -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
	<script src="http://www.e-conex.pl/zapalgo/wp-content/themes/ultrabootstrap-child-theme-01/jquery.jscroll.min.js"></script> 
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> 
  	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<style>
div#s2id_billing_country, div#s2id_shipping_country {
	pointer-events: none;
	cursor: default;	
}
<?php if(is_checkout()){ ?>
		.top-to {
		    position: relative;
		    top: 0px !Important;
		}
<?php } ?>
</style>
<script>
$(document).ready(function(){
	$('.tm-extra-product-options-radio').each(function (i) {
	    $(this).addClass('required-' + i);
	    $(this).addClass('required-options');
	});
	var numItems = $('.required-options').length;
	$('span.tm-epo-field-label').append( "<span style='color:#f00;'> *</span>" );
});	
$(window).mousemove(function() {
	var numItems = $('.required-options').length;

	if(numItems == 1) {
		if ($('.required-0 > li').hasClass("tc-active")) {
			$('button.single_add_to_cart_button.button.alt').removeAttr('disabled','disabled'); 
			$('.req-text').fadeOut(300, function(){
				$(this).remove();
			});
		} else {
			$('button.single_add_to_cart_button.button.alt').attr('disabled','disabled'); 
			$('button.single_add_to_cart_button.button.alt').after( "<div class='req-text'><span style='color:#f00;'>*</span> Check all required fields</div>" );
			$('.req-text').not(':first').remove();
		}
	}
	if(numItems == 2) {
		if ($('.required-1 > li').hasClass("tc-active") && $('.required-0 > li').hasClass("tc-active")) {
			$('button.single_add_to_cart_button.button.alt').removeAttr('disabled','disabled');
			$('.req-text').fadeOut(300, function(){
				$(this).remove();
			}); 
		} else {
			$('button.single_add_to_cart_button.button.alt').attr('disabled','disabled'); 
			$('button.single_add_to_cart_button.button.alt').after( "<div class='req-text'><span style='color:#f00;'>*</span> Check all required fields</div>" );
			$('.req-text').not(':first').remove();
		}
	}
	if(numItems == 3) {
		if ($('.required-2 > li').hasClass("tc-active") && $('.required-1 > li').hasClass("tc-active") && $('.required-0 > li').hasClass("tc-active")) {
			$('button.single_add_to_cart_button.button.alt').removeAttr('disabled','disabled'); 
			$('.req-text').fadeOut(300, function(){
				$(this).remove();
			});
		} else {
			$('button.single_add_to_cart_button.button.alt').attr('disabled','disabled'); 
			$('button.single_add_to_cart_button.button.alt').after( "<div class='req-text'><span style='color:#f00;'>*</span> Check all required fields</div>" );
			$('.req-text').not(':first').remove();
		}
	}
	if(numItems == 4) {
		if ($('.required-3 > li').hasClass("tc-active") && $('.required-2 > li').hasClass("tc-active") && $('.required-1 > li').hasClass("tc-active") && $('.required-0 > li').hasClass("tc-active")) {
			$('button.single_add_to_cart_button.button.alt').removeAttr('disabled','disabled'); 
			$('.req-text').fadeOut(300, function(){
				$(this).remove();
			});
		} else {
			$('button.single_add_to_cart_button.button.alt').attr('disabled','disabled'); 
			$('button.single_add_to_cart_button.button.alt').after( "<div class='req-text'><span style='color:#f00;'>*</span> Check all required fields</div>" );
			$('.req-text').not(':first').remove();
		}
	}
	if(numItems == 5) {
		if ($('.required-4 > li').hasClass("tc-active") &&  $('.required-3 > li').hasClass("tc-active") && $('.required-2 > li').hasClass("tc-active") && $('.required-1 > li').hasClass("tc-active") && $('.required-0 > li').hasClass("tc-active")) {
			$('button.single_add_to_cart_button.button.alt').removeAttr('disabled','disabled'); 
			$('.req-text').fadeOut(300, function(){
				$(this).remove();
			});
		} else {
			$('button.single_add_to_cart_button.button.alt').attr('disabled','disabled'); 
			$('button.single_add_to_cart_button.button.alt').after( "<div class='req-text'><span style='color:#f00;'>*</span> Check all required fields</div>" );
			$('.req-text').not(':first').remove();
		}
	}
	if(numItems == 6) {
		if ($('.required-5 > li').hasClass("tc-active") && $('.required-4 > li').hasClass("tc-active") &&  $('.required-3 > li').hasClass("tc-active") && $('.required-2 > li').hasClass("tc-active") && $('.required-1 > li').hasClass("tc-active") && $('.required-0 > li').hasClass("tc-active")) {
			$('button.single_add_to_cart_button.button.alt').removeAttr('disabled','disabled'); 
			$('.req-text').fadeOut(300, function(){
				$(this).remove();
			});
		} else {
			$('button.single_add_to_cart_button.button.alt').attr('disabled','disabled'); 
			$('button.single_add_to_cart_button.button.alt').after( "<div class='req-text'><span style='color:#f00;'>*</span> Check all required fields</div>" );
			$('.req-text').not(':first').remove();
		}
	}
	if(numItems == 7) {
		if ($('.required-6 > li').hasClass("tc-active") && $('.required-5 > li').hasClass("tc-active") && $('.required-4 > li').hasClass("tc-active") &&  $('.required-3 > li').hasClass("tc-active") && $('.required-2 > li').hasClass("tc-active") && $('.required-1 > li').hasClass("tc-active") && $('.required-0 > li').hasClass("tc-active")) {
			$('button.single_add_to_cart_button.button.alt').removeAttr('disabled','disabled'); 
			$('.req-text').fadeOut(300, function(){
				$(this).remove();
			});
		} else {
			$('button.single_add_to_cart_button.button.alt').attr('disabled','disabled'); 
			$('button.single_add_to_cart_button.button.alt').after( "<div class='req-text'><span style='color:#f00;'>*</span> Check all required fields</div>" );
			$('.req-text').not(':first').remove();
		}
	}
	if(numItems == 8) {
		if ($('.required-7 > li').hasClass("tc-active") && $('.required-5 > li').hasClass("tc-active") && $('.required-4 > li').hasClass("tc-active") &&  $('.required-3 > li').hasClass("tc-active") && $('.required-2 > li').hasClass("tc-active") && $('.required-1 > li').hasClass("tc-active") && $('.required-0 > li').hasClass("tc-active")) {
			$('button.single_add_to_cart_button.button.alt').removeAttr('disabled','disabled'); 
			$('.req-text').fadeOut(300, function(){
				$(this).remove();
			});
		} else {
			$('button.single_add_to_cart_button.button.alt').attr('disabled','disabled'); 
			$('button.single_add_to_cart_button.button.alt').after( "<div class='req-text'><span style='color:#f00;'>*</span> Check all required fields</div>" );
			$('.req-text').not(':first').remove();
		}
	}
});

$(document).ready(function(){
	$('input.button.alt.yith-wcms-button.next.button-step-1').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 250);
		return false;
	});
});  


$(document).ready(function() { 
	$(".col-sm-6.register-custom > form > p > input#user_login").attr( "disabled", "disabled" );
	$(".col-sm-6.register-custom > form > p > input#user_pass").attr( "disabled", "disabled" );
});
$(document).ready(function() { 
	jQuery(".register-custom > form > p > input#wp-submit").click(function() {
		window.location.href= 'http://retailer.e-conex.pl/';
		return false;
	});
});

$(document).ready(function() { 
	$('#ChangeCurrency').click(function(){
		jQuery.removeCookie('woocommerce_items_in_cart', { path: '/zapalgo/' });
		jQuery.removeCookie('aelia_billing_country', { path: '/zapalgo/' });
		jQuery.removeCookie('aelia_cs_selected_currency', { path: '/zapalgo/' });
		jQuery.removeCookie('aelia_customer_country', { path: '/zapalgo/' });
		jQuery.removeCookie('aelia_customer_state', { path: '/zapalgo/' });
		jQuery.removeCookie('customer_default_country', { path: '/zapalgo/' });
		jQuery.removeCookie('woocommerce_cart_hash', { path: '/zapalgo/' });
		jQuery.removeCookie('wp-settings-time-1', { path: '/zapalgo/' });
		jQuery.removeCookie('cookie-law-bar', { path: '/' });
		setTimeout( function() {
			location.reload();
		}, 500);
	});
	// $('.button-step-1').click(function(){
	// 	jQuery.removeCookie('woocommerce_items_in_cart', { path: '/zapalgo/' });
	// 	jQuery.removeCookie('aelia_billing_country', { path: '/zapalgo/' });
	// 	jQuery.removeCookie('aelia_cs_selected_currency', { path: '/zapalgo/' });
	// 	jQuery.removeCookie('aelia_customer_country', { path: '/zapalgo/' });
	// 	jQuery.removeCookie('aelia_customer_state', { path: '/zapalgo/' });
	// 	jQuery.removeCookie('customer_default_country', { path: '/zapalgo/' });
	// 	jQuery.removeCookie('woocommerce_cart_hash', { path: '/zapalgo/' });
	// 	jQuery.removeCookie('wp-settings-time-1', { path: '/zapalgo/' });
	// 	jQuery.removeCookie('cookie-law-bar', { path: '/' });
	// 	setTimeout( function() {
	// 		location.reload();
	// 	}, 500);
	// });
});
$(document).ready(function() { 
	$('.carousel').carousel({
	    interval: false
	}); 
	
	$('#ChangeCurrency').click(function(){
		jQuery.removeCookie('aelia_cs_selected_currency', { path: '/zapalgo/' });
		jQuery.removeCookie('customer_default_country', { path: '/zapalgo/' });
		jQuery.removeCookie('aelia_customer_country', { path: '/zapalgo/' });

		jQuery.removeCookie('yith_wcms_checkout_form', { path: '/' });
		jQuery.removeCookie('yith_wcms_checkout_current_step', { path: '/' });
		jQuery.removeCookie('wp-settings-1', { path: '/zapalgo/' });
		jQuery.removeCookie('woocommerce_items_in_cart', { path: '/zapalgo/' });
		jQuery.removeCookie('woocommerce_cart_hash', { path: '/zapalgo/' });
		setTimeout( function() {
			location.reload();
		}, 500);
	});
	$('.login-submit').click(function(){
		jQuery.removeCookie('aelia_cs_selected_currency', { path: '/zapalgo/' });
		jQuery.removeCookie('customer_default_country', { path: '/zapalgo/' });
		jQuery.removeCookie('aelia_customer_country', { path: '/zapalgo/' });
	});
});



$(function(){  // $(document).ready shorthand
  $('.monster').fadeIn('slow');
});

$(document).ready(function() {
    $( "input[name$='update_cart']" ).val( "Update Cart" );
    $( "p.cart-empty" ).text( "Your cart is currently empty." );
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).position().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},4000);
                    
            }
            
        }); 
    
    });
    
});

	$(document).ready(function() { 
		jQuery(".login-custom #user_login").attr('placeholder', 'Email');
		jQuery(".login-custom #user_pass").attr('placeholder', 'Password');
		jQuery(".register-custom #user_login").attr('placeholder', 'Email');
		jQuery(".register-custom #user_pass").attr('placeholder', 'Password');
			$('.scroll').jscroll();
	});

$(document).ready(function(){




/* jQuery('li.dropdown-submenu').hover(function () {
    jQuery(this).find('ul.dropdown-menu').stop(true, true).delay(200).fadeIn();
}, function () {
    jQuery(this).find('ul.dropdown-menu').stop(true, true).delay(200).fadeOut();
}); */ 

$(".check .readmore").click(function() {
    var container = $(".check");  //Narrow the selector to the container
    
    var fadeOut;
    var fadeIn;
    if($(".content-teaser", container).is(':visible'))
    {
        fadeOut = $(".content-teaser", container);
        fadeIn = $(".content-full", container);

    }
    else
    {
        fadeOut = $(".content-full", container);
        fadeIn = $(".content-teaser", container);
    }
        
    fadeOut.fadeToggle('fast', function ()
                           {
                               fadeIn.fadeToggle('fast');
                           });   
                              
});


});
</script>

	<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 1){  
	        $('.header').addClass("sticky");
	    }
	    else{
	        $('.header').removeClass("sticky");
	    }
	});
	</script>
	<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 1){  
	        $('.header2').addClass("sticky");
	    }
	    else{
	        $('.header2').removeClass("sticky");
	    }
	});
	</script>
	<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 1){  
	        $('.logo-tag').addClass("sticky");
	    }
	    else{
	        $('.logo-tag').removeClass("sticky");
	    }
	});
	</script>
		<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 1){  
	        $('.navsticky').addClass("sticky");
	    }
	    else{
	        $('.navsticky').removeClass("sticky");
	    }
	});
	</script>
			<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 1){  
	        $('.custom-padding').addClass("sticky");
	    }
	    else{
	        $('.custom-padding').removeClass("sticky");
	    }
	});
	</script>
	<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 1){  
	        $('empty-space').addClass("sticky");
	    }
	    else{
	        $('empty-space').removeClass("sticky");
	    }
	});
	</script>
	<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 1){  
	        $('.up-down').addClass("yes");
	    }
	    else{
	        $('.up-down').removeClass("yes");
	    }
	});
	</script>
	<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 1){  
	        $('.menu-space').addClass("sticky");
	    }
	    else{
	        $('.menu-space').removeClass("sticky");
	    }
	});


	</script>

<style>
	[data-slick] {
  .slick-slide {
    height: $slick-height;
    overflow: hidden;
  }
  img {
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
    position: absolute;
    width: 100%;
    transition: all 500ms ease-in-out;
    transform: scale(1.25, 1.25);
  }
  .slick-active {
    img {
      transform: scale(1, 1);
    }
  }
}


</style>

	  <script type="text/javascript">
    $(document).ready(function(){

$('[data-slick]').slick({
  fade: true,
       dots: true,
      focusOnSelect: true,
      autoplay: true,
      draggable: true,
      autoplaySpeed: 6000,
      infinite: true,
      pauseOnHover: false,
      swipeToSlide: true,
      accessibility: true,
});

    var slickOpts = {
      dots: true,
      focusOnSelect: true,
      autoplay: false,
      draggable: true,
      autoplaySpeed: 2000,
      infinite: true,
      pauseOnHover: false,
      swipeToSlide: true,
      accessibility: true,
    };
    // Init the slick
    $('.autoplay').slick(slickOpts);
    var slickEnabled = true;
			


    var slick1pts = {
      dots: true,
      focusOnSelect: true,
      autoplay: true,
      draggable: true,
      autoplaySpeed: 6000,
      infinite: true,
      pauseOnHover: false,
      swipeToSlide: true,
      accessibility: true,
    };
    // Init the slick
    $('.autoplay2').slick(slick1pts);
    var slickEnabled = true;


$('.example2 .slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: false,
    asNavFor: '.example2 .slider-nav',
    dots: false,
    arrows:true,    
    appendArrows: '.pr_images',
    prevArrow:'<i class="fa fa-angle-left slick-prev"></i>',
    nextArrow:'<i class="fa fa-angle-right slick-next"></i>'
});
$('.example2 .slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.example2 .slider-for',
    dots: false,
    arrows:false,
    centerMode: false,
    focusOnSelect: true
});	
    });
	$(document).ready(function() { 
	    $(".tnp-submit").val('SING UP FOR NEWSLETTER');
	});
  </script>
  <script type="text/javascript">
  	$('.slider').slick({
  arrows: false
})

$('.left').click(function(){
  $('.slider').slick('slickPrev');
})

$('.right').click(function(){
  $('.slider').slick('slickNext');
})

$('.slid').slick({
			slidesToShow: 1,
    slidesToScroll: 1,	
			  });
  </script>


  <script type="text/javascript">


$(document).ready(function(){

$( ".elo" ).click(function() {
	$( "button.glyphicon-th-large" ).click();
});


var fewSeconds = 2;
$('.readmore').click(function(){
    // Ajax request
    var btn = $(this);
    btn.prop('disabled', true);
    setTimeout(function(){
        btn.prop('disabled', false);
    }, fewSeconds*500);
});


});
	$(document).ready(function() { 
		jQuery("#username").attr('placeholder', 'Email');
		jQuery("#password").attr('placeholder', 'Password');
		jQuery("#reg_email").attr('placeholder', 'Email');
		jQuery("#reg_password").attr('placeholder', 'Password');
			$('.scroll').jscroll();
	});





	$(document).ready(function() { 
	    $(".login-custom #wp-submit").val('SING IN');
	    $(".register-custom #wp-submit").val('SING IN');
	});



</script>




<script type="text/javascript">
	  jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: false
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});

	  
</script>



<style>
	.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
}
</style>
	<?php wp_head(); ?>
	<!-- Temporary or forever -->
	<link rel="stylesheet" href="<?php echo bloginfo('url')."/wp-content/themes/ultrabootstrap-child-theme-01"; ?>/custom.css"/>
	<link rel="stylesheet" href="<?php echo bloginfo('url')."/wp-content/themes/ultrabootstrap-child-theme-01"; ?>/custom2.css"/>
	<link rel="stylesheet" href="<?php echo bloginfo('url')."/wp-content/themes/ultrabootstrap-child-theme-01"; ?>/woostyles.css"/>
	<link rel="stylesheet" href="<?php echo bloginfo('url')."/wp-content/themes/ultrabootstrap-child-theme-01"; ?>/custom-rwd.css"/>
</head>

<body <?php body_class(); ?>>
<?php $header_text_color = get_header_textcolor();?>

<header >
	<section class="logo-menu">


<div class="container visible-xs">
    <nav class="navbar navbar-default navbar-fixed-top up-down" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
       	<div class="logo-tag">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php the_field('logo', 'options'); ?>" alt=""></a>   
      	</div>
      <div class="navbar-collapse collapse">
 <!--       <ul class="nav navbar-nav">



        <?php // if ( is_user_logged_in() ) { ?>
			<li class="navbar-left"><a href="<?php //echo wp_logout_url(); ?>">Sign out</a></li>
			<li class="navbar-left"><a href="<?php //echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php //_e('My Account','woothemes'); ?>"><?php //_e('My Account','woothemes'); ?></a></li> -->
		<?php // } else { ?>
<!--		  <li class="navbar-left dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="<?php //bloginfo('url'); //echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>/login-page/" title="<?php //_e('Login / Register','woothemes'); ?>"><?php //_e('Sign in','woothemes'); ?>
		    </a> -->
<!--		  	<ul class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
		  		<div class="custom-container">
		  			<div class="row">
		  				<div class="col-sm-12">
		  					<?php //echo do_shortcode( '[woocommerce_my_account]') ?>
		  				</div>
		  			</div>
		  		</div>
		  	</ul>
		  </li>-->
		<?php //} ?>

	           <li class="li-block dropdown">
			  <a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/shop/" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Shop
				  </a>
				  <div class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
						<div class="container menu-custom">
							<div class="row">
								<div class="col-md-4 title">
									<h2>Lighting</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu12',
											'theme_location'    => 'my-custom-menu12',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-4 title">
									<h2>Furniture</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu13',
											'theme_location'    => 'my-custom-menu13',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-4 title">
									<h2>Accessories</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu14',
											'theme_location'    => 'my-custom-menu14',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    		</div>
				    	</div>
				  </div>
	          </li>
	          <li class="li-block"><a href="#">Guidebook</a></li>
	          <li class="li-block dropdown">
				  <a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/cart/" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    About
				  </a>
				  <div class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
				    				<?php echo do_shortcode( '[woocommerce_cart]') ?>
				    			</div>
				    		</div>
				    	</div>
				  </div>
			</li>
	          <li class="li-block"><a href="#">Contact</a></li>

			<li class="navbar-right dropdown">
			  <a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/cart/" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Cart
			  </a>

			  <div class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
			    				<?php echo do_shortcode( '[woocommerce_cart]') ?>
			    			</div>
			    			<div class="col-md-6">
			    				<a href="<?php bloginfo('url'); ?>/checkout/">BUTTON</a>
			    			</div>	
			    			<div class="col-md-6">
			    				<a href="<?php bloginfo('url'); ?>/checkout/">BUTTON</a>
			    			</div>	
			    		</div>
			    	</div>
			  </div>
			</li> 
          <li class="navbar-right"><a href="#"><?php //do_shortcode('[woocommerce_currency_switcher_drop_down_box]') ?></a></li>
        </ul>
      </div>
    </nav>
</div>


<div class=" hidden-xs">
    <nav class="navbar navbar-default navbar-fixed-top up-down " role="navigation">
      <div class="container navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
       	<div class="logo-tag">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php the_field('logo', 'options'); ?>" alt=""></a>   
      	</div>
      <div class="navbar-collapse collapse">

  		<ul class="nav navbar-nav in-line">


	          <li class="li-block dropdown">
			  <a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/shop/" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Shop
				  </a>
				  <div class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
						<div class="container menu-custom">
							<div class="row">
								<div class="col-md-3 title">
									<h2>Lighting</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu12',
											'theme_location'    => 'my-custom-menu12',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-3 title">
									<h2>Furniture</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu13',
											'theme_location'    => 'my-custom-menu13',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-3 title">
									<h2>Accessories</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu14',
											'theme_location'    => 'my-custom-menu14',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
                                <div class="col-md-3 title">
									<h2>End series</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu15',
											'theme_location'    => 'my-custom-menu15',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    		</div>
				    	</div>
				  </div>
	          </li>
	          <li class="li-block dropdown">
				  <a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/cart/" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Guidebook
				  </a>
				  <div class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
						<div class="container menu-custom">
							<div class="row">
								<div class="col-md-3 title">
									<h2>Copper finish</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu5',
											'theme_location'    => 'my-custom-menu5',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-3 title">
									<h2>Wood</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu6',
											'theme_location'    => 'my-custom-menu6',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-3 title">
									<h2>Shades</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu7',
											'theme_location'    => 'my-custom-menu7',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-3 title">
									<h2>Others</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu8',
											'theme_location'    => 'my-custom-menu8',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    		</div>
				    	</div>
				  </div>
			</li>
	          <li class="li-block dropdown">
				  <a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/cart/" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    About
				  </a>
				  <div class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
						<div class="container menu-custom">
							<div class="row">
								<div class="col-md-3 title">
									<h2>Company</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu1',
											'theme_location'    => 'my-custom-menu1',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-3 title">
									<h2>Media</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu2',
											'theme_location'    => 'my-custom-menu2',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-3 title">
									<h2>Download</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu3',
											'theme_location'    => 'my-custom-menu3',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-3 title">
									<h2>Legal metters</h2>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu4',
											'theme_location'    => 'my-custom-menu4',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    		</div>
				    	</div>
				  </div>
			</li>
	          <li class="li-block dropdown">
				  <a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/cart/" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Contact
				  </a>
				  <div class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
						<div class="container menu-custom">
							<div class="row">
								<div class="col-md-4 title items-center"><br>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu9',
											'theme_location'    => 'my-custom-menu9',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-4 title items-center"><br>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu10',
											'theme_location'    => 'my-custom-menu10',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    			<div class="col-md-4 title items-center"><br>
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu11',
											'theme_location'    => 'my-custom-menu11',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				    			</div>
				    		</div>
				    	</div>
				  </div>
			</li>
		</ul>


        <ul class="nav navbar-nav">
<!--


        <?php //if ( is_user_logged_in() ) { ?>
			<li class="navbar-left"><a href="<?php //echo wp_logout_url(); ?>">Sign out</a></li>
			<li class="navbar-left"><a href="<?php //echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php //_e('My Account','woothemes'); ?>"><?php //_e('My Account','woothemes'); ?></a></li>
		<?php //} else { ?>
		  <li class="navbar-left dropdown">
		    <a class="dropdown-toggle" href="<?php //echo bloginfo('url'); //echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>/session?redirect=login-page" title="<?php // _e('Login / Register','woothemes'); ?>"><?php //_e('Sign in','woothemes'); ?>
		    </a> -->
		  	<ul class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
<!--		  		<div class="custom-container">
		  			<div class="row">
		  				<div class="col-sm-6 login-custom">
							<div class="title">Customer Login</div>
							<div class="subtitle">Login in to check out faster, access your order history, track new orders and save items in your cart.</div>
		  					<?php // echo do_shortcode( '[loginform]') ?>
		  					<div class="forgot-password">
		  						<a href="<?php // bloginfo('url'); ?>/my-account/lost-password/">Forgot your password?</a>
		  					</div>
		  					<div class="sign-up">
		  						Don't have an account? <a href="http://www.e-conex.pl/zapalgo/my-account/">Sign up</a>
		  					</div>
		  				</div>
		  				<div class="col-sm-6 register-custom">
		  					<div class="title">Retailer Login</div>
							<div class="subtitle">Log in for easy quoting, simple ordering, order history access, new orders tracking and more.</div>
		  					<?php //echo do_shortcode( '[loginform]') ?>
							<div class="login-custom">
								<p class="login-submit" style="height: 110px;">
									<a href="http://www.e-conex.pl/retailer/">
										<div class="login-submit-like">
											GO TO RETAILER WEBSITE
										</div>
									</a>	
								</p>
							</div>
		  					<div class="sign-up">
		  						Want to become a retailer?
		  					</div>
		  					<div class="sign-up">
								<a href="<?php // bloginfo('url'); ?>/for-retailers/">Contact for retailers</a>
							</div>
		  				</div>
		  			</div>
		  		</div>-->
		  	</ul> 
		<!--  </li> -->
		<?php // } ?>


		

			<li class="navbar-right dropdown">
			  <a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/cart/" id="dropdownMenuLink">
			    Cart <?php if(cart_count()>0) { echo ' - '.cart_count(); } ?>
			  </a>
<!-- dropdown koszyk -->
			  <!-- <div class="dropdown-menu category-overlay" aria-labelledby="dropdownMenuLink">
					<div class="container cart">
						<div class="row">
							<div class="col-xs-12">
								<div class="cus-mar"> -->
			    					<?php //echo do_shortcode( '[woocommerce_cart]') ?>
								<!-- </div>
			    			</div> -->
			    			<?php //if ( WC()->cart->get_cart_contents_count() != 0 ) { ?>
							<!-- <div class="top-to">
				    			<div class="col-md-6 but-cart1">
				    				<a href="<?php //bloginfo('url'); ?>/zapalgo/shop/">CONTINUE SHOPPING</a>
				    			</div>	
				    			<div class="col-md-6 but-cart">
				    				<a href="<?php //bloginfo('url'); ?>/zapalgo/checkout/">CHECKOUT</a>
				    			</div>	
							</div> -->
							<?php //} ?>
			    		<!-- </div>
			    	</div>
			  </div> -->
			</li>
          <li class="navbar-left dropdown">
		  <?php // poniżej był onclick="myAjax()" ?>
          	<!-- <a id="ChangeCurrency" name="country-button" href="<?php //bloginfo('url'); ?>/session/" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Country
		  	</a> -->
			<?php if ( !is_user_logged_in() ) { ?>
			<a style="padding-left: 0;" href="<?php bloginfo('url'); ?>/session/">
				Country
			</a>
			<?php } ?>
          </li>

        </ul>
      </div>
    </nav>
</div>

	</section> <!-- /.end of section -->
</header>



											
