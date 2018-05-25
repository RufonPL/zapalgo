<?php
/*
* Generated By Orbisius Child Theme Creator - your favorite plugin for Child Theme creation :)
* https://wordpress.org/plugins/orbisius-child-theme-creator/
*
* Unlike style.css, the functions.php of a child theme does not override its counterpart from the parent.
* Instead, it is loaded in addition to the parent’s functions.php. (Specifically, it is loaded right before the parent theme's functions.php).
* Source: http://codex.wordpress.org/Child_Themes#Using_functions.php
*
* Be sure not to define functions, that already exist in the parent theme!
* A common pattern is to prefix function names with the (child) theme name.
* Also if the parent theme supports pluggable functions you can use function_exists( 'put_the_function_name_here' ) checks.
*/

add_image_size( 'cross-sell-thumb', 1920, 1280, true);

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields', 99 );

function custom_override_checkout_fields( $fields ) {

    unset($fields['billing']['billing_postcode']['validate']);
    unset($fields['shipping']['shipping_postcode']['validate']);

    return $fields;
}

function my_duplicate_post_link($actions, $post) {

    // The following checks WHERE we should run if not products just return
    if ( $post->post_type != 'product' ) {
        return $actions;
    }

    $product = get_product( $post->ID );
    unset($actions['duplicate']);
    return $actions;
}

// Notice priority changed from default 10 to 15(anything greater than 10)
// Priority defines WHEN we should run
add_filter('post_row_actions', 'my_duplicate_post_link', 15, 2);
add_filter('page_row_actions', 'my_duplicate_post_link', 15, 2);

add_action('init','wpse_227130_hook_properly');

function wpse_227130_hook_properly() {
    add_filter('post_row_actions', 'my_duplicate_post_link', 10, 2);
    add_filter('page_row_actions', 'my_duplicate_post_link', 10, 2);
}



/**
 * Loads parent and child themes' style.css
 */
 
function orbisius_ctc_ultrabootstrap_child_theme_enqueue_styles() {
    $parent_style = 'orbisius_ctc_ultrabootstrap_parent_style';
    $parent_base_dir = 'ultrabootstrap';

    wp_enqueue_style( $parent_style,
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme( $parent_base_dir ) ? wp_get_theme( $parent_base_dir )->get('Version') : ''
    );

    wp_enqueue_style( $parent_style . '_child_style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'wp_enqueue_scripts', 'orbisius_ctc_ultrabootstrap_child_theme_enqueue_styles' );



if( function_exists('acf_add_options_page') ) {  

    acf_add_options_page(array(
            'page_title'    => 'Theme Options',
            'menu_title'    => 'Theme Options',
            'menu_slug'     => 'theme-options',
            'capability'    => 'edit_posts',
            'parent_slug'   => '',
            'position'      => false,
            'icon_url'      => false,
            'redirect'      => false,
        ));     

 }

 
 function customer_set_default_country() {
	if( isset($_GET['customer_set_default_country']) ) {
		$cookie_name = 'customer_default_country';
		$cookie_value = sanitize_text_field( $_GET['customer_set_default_country'] );
		
//		setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 12), '/');
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 12), '/');
		
		//additional cookies used by WooCommerce
		setcookie('aelia_billing_country', $cookie_value, time() + (86400 * 30 * 12), '/');
		setcookie('aelia_customer_country', $cookie_value, time() + (86400 * 30 * 12), '/');
		
		
/*		unset($_COOKIE['woocommerce_cart_hash']);
		unset($_COOKIE['woocommerce_items_in_cart']);
		unset($_COOKIE['PHPSESSID']);
		setcookie('woocommerce_cart_hash', NULL, time() + (86400 * 30 * 12), '/zapalgo/');
		setcookie('woocommerce_items_in_cart', NULL, time() + (86400 * 30 * 12), '/zapalgo/');
		setcookie('PHPSESSID', NULL, time() + (86400 * 30 * 12), '/zapalgo/');*/	
		
		global $woocommerce;
		$woocommerce->customer->set_country( $cookie_value );
		
		if( isset($_GET['alg_currency']) ) {
			/*
if( isset( $_GET['rtc'] ) && absint( $_GET['rtc'] ) == 1 ) { // redirect to checkout
				wp_safe_redirect( get_permalink( get_option( 'woocommerce_checkout_page_id' ) ).'?alg_currency='.sanitize_text_field($_GET['alg_currency']).'&rfc='.get_the_ID() ); exit();
			}else {
 */

		wp_safe_redirect( get_permalink().'?alg_currency='.sanitize_text_field($_GET['alg_currency']) ); exit();
			
		}
	}
}
add_action('template_redirect', 'customer_set_default_country');



function customer_set_cookie_default_country() {
	$user_id = get_current_user_id();
	$key = "billing_country";
	$single = true;
	$usercountry = get_user_meta($user_id, $key, $single);
//	return $usercountry;
	echo "$user_id, $key, $single";
	print_r($usercountry);

	$_COOKIE['aelia_billing_country'] = "whatever";
	
//	$cookie_name = 'customer_default_country';
//	$cookie_value = $usercountry;
/*	setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 12), '/zapalgo/');	
	setcookie("przykladowe cookie", $cookie_value, time() + (86400 * 30 * 12), '/zapalgo/');	*/
}


function customer_get_default_country() {
	$cookie_name = 'customer_default_country';
	
	return isset( $_COOKIE[$cookie_name] ) ? sanitize_text_field( $_COOKIE[$cookie_name] ) : false;
}

function woo_countries_list() {
	$countries_obj  = new WC_Countries();
	$base_country = $countries_obj->get_base_country();
	$countries   		= $countries_obj->__get('countries');
	echo '<div id="customer-default-country"><h2>' . __('Select your country') . '</h2>';

	woocommerce_form_field('customer_default_country', array(
			'type'       	=> 'select',
			'class'      	=> array( 'cdc-drop' ),
			'label'      	=> '',
			'placeholder' => __('Enter something'),
			'options'   	=> $countries,
			'default'     => customer_get_default_country() ? customer_get_default_country() : $base_country
		)
	);
	echo '<a class="btn btn-primary" id="set_cdc">Save</a>';
	echo '<div class="bottom-title"><p>Shipping costs and taxes vary by country of destination. You may change the country anytime later by clicking COUNTRY button in the upper left corner of our site, but doing that may erase all your cart history in our shop.</p>';
	echo '<p>For all European Union countries prices include all taxes and fees. All other countries view prices excluding taxes and fees, which are in this instance not applied. However, if you live outside EU, some taxes and fees may be applied later on arrival in your country of destination.</p>';
	echo '<p>For some countries our online sale is not available. In that case, please contact your nearest retailer. You may find our retailers list in the CONTACT section on our site.</p></div></div>';
}

function localize_scripts() {
	wp_enqueue_script('localizedscripts',  get_stylesheet_directory_uri() . '/localize.js', array('jquery'),'', true );
	wp_localize_script(
		'localizedscripts', 
		'zapalgoscripts',
		array(
			'ajaxurl'		=> admin_url( 'admin-ajax.php'),
			'countries_usd' => json_encode( get_option('alg_currency_switcher_currency_countries_USD') ),
			'countries_pln' => json_encode( get_option('alg_currency_switcher_currency_countries_PLN') ),
			'default_country' => customer_get_default_country(),
			'rfc' => isset($_GET['alg_currency']) && isset( $_GET['rfc'] ) && absint( $_GET['rfc'] ) > 0 ? get_permalink( $_GET['rfc'] ) : ''
		)
	);
}
add_action( 'wp_enqueue_scripts', 'localize_scripts', 9 );

/*
Plugin Name: WooCommerce Dropdown Cart
Plugin URI: https://wordpress.org/plugins/woocommerce-dropdown-cart/
Description: A widget plugin for WooCommerce to display the cart at top of page
Author: svincoll4
Version: 1.4.1
Author URI: https://www.facebook.com/svincoll4
*/
class WooCommerce_Widget_DropdownCart extends WP_Widget {
    var $woo_widget_cssclass;
    var $woo_widget_description;
    var $woo_widget_idbase;
    var $woo_widget_name;
    /**
     * constructor
     *
     * @access public
     * @return void
     */
    function WooCommerce_Widget_DropdownCart() {
        /* Widget variable settings. */
        $this->woo_widget_cssclass      = 'widget_shopping_mini_cart dropdown-cart';
        $this->woo_widget_description   = __( "Display the user's Cart in the sidebar.", 'woocommerce' );
        $this->woo_widget_idbase        = 'woocommerce_widget_minicart';
        $this->woo_widget_name          = __( 'WooCommerce Dropdown Cart', 'woocommerce' );
        /* Widget settings. */
        $widget_ops = array( 'classname' => $this->woo_widget_cssclass, 'description' => $this->woo_widget_description );
        /* Create the widget. */
        $this->WP_Widget( 'widget_shopping_mini_cart', $this->woo_widget_name, $widget_ops );
    }
    /**
     * widget function.
     *
     * @see WP_Widget
     * @access public
     * @param array $args
     * @param array $instance
     * @return void
     */
    function widget( $args, $instance ) {
        if(empty($instance['show_on_checkout']) && (is_cart() || is_checkout())){
            return;
        }
        $woocommerce = WC();
        extract( $args );
        $title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $hide_if_empty = empty( $instance['hide_if_empty'] )  ? 0 : 1;
        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;
        $cart_contents_count = $woocommerce->cart->get_cart_contents_count();
        ?>
        <div class="widget_shopping_mini_cart_content">
            <?php if ( !$hide_if_empty || $cart_contents_count > 0 ) : ?>
                <div class="dropdown-cart-button <?php echo $hide_if_empty ? 'hide_dropdown_cart_widget_if_empty' : '' ?>" style="<?php echo $hide_if_empty && sizeof( $woocommerce->cart->get_cart() ) == 0 ? "display:none;":"" ?>">
                    <a href="#" class="dropdown-total"><?php echo $cart_contents_count.' '._n(__('item', 'woocommerce-ddc'), __('items', 'woocommerce-dc'), $cart_contents_count) ?> - <?php echo $woocommerce->cart->get_cart_subtotal(); ?></a>
                    <div class="dropdown">
                        <?php woocommerce_mini_cart(); ?>
                        <div class="clear"></div>
                    </div>
                </div>
            <?php else: ?>
                <script type="text/javascript">
                    jQuery(function($){
                        $('#<?php echo $this->id ?>').hide();
                    });
                </script>
            <?php endif; ?>
        </div>
        <?php
        echo $after_widget;
    }
    /**
     * update function.
     *
     * @see WP_Widget->update
     * @access public
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    function update( $new_instance, $old_instance ) {
        $instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['hide_if_empty'] = empty( $new_instance['hide_if_empty'] ) ? 0 : 1;
        $instance['show_on_checkout'] = empty( $new_instance['show_on_checkout'] ) ? 0 : 1;
        return $instance;
    }
    /**
     * form function.
     *
     * @see WP_Widget->form
     * @access public
     * @param array $instance
     * @return void
     */
    function form( $instance ) {
        $hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
        $show_on_checkout = empty( $instance['show_on_checkout'] ) ? 0 : 1;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'woocommerce') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>

        <p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('hide_if_empty') ); ?>" name="<?php echo esc_attr( $this->get_field_name('hide_if_empty') ); ?>"<?php checked( $hide_if_empty ); ?> />
            <label for="<?php echo $this->get_field_id('hide_if_empty'); ?>"><?php _e( 'Hide if cart is empty', 'woocommerce' ); ?></label></p>

        <p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('show_on_checkout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_on_checkout') ); ?>"<?php checked( $show_on_checkout ); ?> />
            <label for="<?php echo $this->get_field_id('show_on_checkout'); ?>"><?php _e( 'Show this widget on cart/checkout pages', 'woocommerce' ); ?></label></p>
    <?php
    }
}
function register_WooCommerce_Widget_DropdownCart() {
    if(class_exists('Woocommerce')) {
        register_widget('WooCommerce_Widget_DropdownCart');
    }
}
add_action( 'widgets_init', 'register_WooCommerce_Widget_DropdownCart' );
function register_script_WooCommerce_Widget_DropdownCart() {
    if(class_exists('Woocommerce')) {
        if( !is_admin() ){
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-dropdown-cart', plugins_url('woocommerce-dropdown-cart/js/main.js'), array('jquery'));
            wp_enqueue_style('jquery-dropdown-cart', plugins_url('woocommerce-dropdown-cart/css/style.css'));
        }
    }
}
add_action( 'wp_enqueue_scripts', 'register_script_WooCommerce_Widget_DropdownCart' );


function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu1',__( 'My Custom Menu 1' ));
  register_nav_menu('my-custom-menu2',__( 'My Custom Menu 2' ));
  register_nav_menu('my-custom-menu3',__( 'My Custom Menu 3' ));
  register_nav_menu('my-custom-menu4',__( 'My Custom Menu 4' ));
  register_nav_menu('my-custom-menu5',__( 'My Custom Menu 5' ));
  register_nav_menu('my-custom-menu6',__( 'My Custom Menu 6' ));
  register_nav_menu('my-custom-menu7',__( 'My Custom Menu 7' ));
  register_nav_menu('my-custom-menu8',__( 'My Custom Menu 8' ));
  register_nav_menu('my-custom-menu9',__( 'My Custom Menu 9' ));
  register_nav_menu('my-custom-menu10',__( 'My Custom Menu 10' ));
  register_nav_menu('my-custom-menu11',__( 'My Custom Menu 11' ));
  register_nav_menu('my-custom-menu12',__( 'My Custom Menu 12' ));
  register_nav_menu('my-custom-menu13',__( 'My Custom Menu 13' ));
  register_nav_menu('my-custom-menu14',__( 'My Custom Menu 14' ));
  register_nav_menu('my-custom-menu15',__( 'My Custom Menu 15' ));
}
add_action( 'init', 'wpb_custom_new_menu' );


add_action( 'wp_enqueue_scripts', 'wcqi_enqueue_polyfill' );
function wcqi_enqueue_polyfill() {
    wp_enqueue_script( 'wcqi-number-polyfill' );
	
}

function rfswp_scripts() {
	wp_enqueue_script('customjs', get_stylesheet_directory_uri().'/custom.js',array(),'1.0', true);
	//wp_enqueue_script('owljs', get_stylesheet_directory_uri().'/owl/owl.carousel.min.js',array(),'1.0', true);
	
	//wp_enqueue_style('owlcss', get_template_directory_uri().'/owl/owl.carousel.min.css', array(), '1.0');
}
add_action( 'wp_enqueue_scripts', 'rfswp_scripts',9 );


function pippin_login_form_shortcode( $atts, $content = null ) { 

	extract( shortcode_atts( array(
      'redirect' => ''
      ), $atts ) ); 

	if (!is_user_logged_in()) {
		if($redirect) {
			$redirect_url = $redirect;
		} else {
			$redirect_url = get_permalink();
		}
		$form = wp_login_form(array('echo' => false, 'redirect' => $redirect_url ));
	} 
	return $form;
}
add_shortcode('loginform', 'pippin_login_form_shortcode');


/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Register a shortcode that creates a product categories dropdown list
 *
 * Use: [product_categories_dropdown orderby="title" count="0" hierarchical="0"]
 *
 */
add_shortcode( 'product_categories_dropdown', 'woo_product_categories_dropdown' );
function woo_product_categories_dropdown( $atts ) {
  extract(shortcode_atts(array(
    'count'         => '0',
    'hierarchical'  => '0',
    'orderby' 	    => ''
    ), $atts));
	
	ob_start();
	
	$c = $count;
	$h = $hierarchical;
	$o = ( isset( $orderby ) && $orderby != '' ) ? $orderby : 'order';
		
	// Stuck with this until a fix for http://core.trac.wordpress.org/ticket/13258
	woocommerce_product_dropdown_categories( $c, $h, 0, $o );
	?>
	<script type='text/javascript'>
	/* <![CDATA[ */
		var product_cat_dropdown = document.getElementById("dropdown_product_cat");
		function onProductCatChange() {
			if ( product_cat_dropdown.options[product_cat_dropdown.selectedIndex].value !=='' ) {
				location.href = "<?php echo home_url(); ?>/?product_cat="+product_cat_dropdown.options[product_cat_dropdown.selectedIndex].value;
			}
		}
		product_cat_dropdown.onchange = onProductCatChange;
	/* ]]> */
	</script>
	<?php
	
	return ob_get_clean();
	
}

add_role('retailer', 'Retailer', array(
    'read' => true, 
    'edit_posts' => false,
    'delete_posts' => false, 
));


function change_currency_position( ) { 
   	if($_SESSION['alg_currency'] == 'USD') {
		return 'left_space';	
	}else {
		return 'right_space';
	}
}; 
add_filter( 'pre_option_woocommerce_currency_pos', 'change_currency_position' );


function cart_count() {
	return WC()->cart->get_cart_contents_count();	
}


function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $validation_errors->add( 'billing_first_name_error', __( 'Nombre es un campo requerido.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $validation_errors->add( 'billing_last_name_error', __( 'Apellidos es un campo requerido.', 'woocommerce' ) );
    }


    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $validation_errors->add( 'billing_phone_error', __( 'Teléfono es un campo requerido.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_address_1'] ) && empty( $_POST['billing_address_1'] ) ) {
        $validation_errors->add( 'billing_address_1_error', __( 'Dirección es un campo requerido.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_postcode'] ) && empty( $_POST['billing_postcode'] ) ) {
        $validation_errors->add( 'billing_postcode_error', __( 'Código postal / Zip es un campo requerido.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_city'] ) && empty( $_POST['billing_city'] ) ) {
        $validation_errors->add( 'billing_city_error', __( 'Localidad / Ciudad es un campo requerido.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_state'] ) && empty( $_POST['billing_state'] ) ) {
        $validation_errors->add( 'billing_state', __( 'Provincia es un campo requerido.', 'woocommerce' ) );
    }
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );


remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );


add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
 
function woo_custom_cart_button_text() {
 
        return __( 'ADD TO CART', 'woocommerce' );
 
}

function wpa_change_my_basket_text( $translated_text, $text, $domain ){
    if( $domain == 'woothemes' && $translated_text == 'Cart:' )
        $translated_text = 'Basket:';
    return $translated_text;
}
add_filter( 'gettext', 'wpa_change_my_basket_text', 10, 3 );


function wooc_extra_register_fields() {
    ?>

    <p class="form-row form-row-wide">

    <input type="text" class="input-text" placeholder="First Name" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>

    <p class="form-row form-row-wide">
    <input type="text" class="input-text" placeholder="Last Name" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>


    <p class="form-row form-row-wide">
    <select class="state_select" name="billing_country" placeholder="Country" id="reg_billing_country">
    <option value="none">Country</option><option value="AX">Åland Islands</option><option value="AF">Afghanistan</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="PW">Belau</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo (Brazzaville)</option><option value="CD">Congo (Kinshasa)</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CW">Curaçao</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="CI">Ivory Coast</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao S.A.R., China</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territory</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL" selected="selected">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="IE">Republic of Ireland</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="ST">São Tomé and Príncipe</option><option value="BL">Saint Barthélemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="SX">Saint Martin (Dutch part)</option><option value="MF">Saint Martin (French part)</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia/Sandwich Islands</option><option value="KR">South Korea</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom (UK)</option><option value="US">United States (US)</option><option value="UM">United States (US) Minor Outlying Islands</option><option value="VI">United States (US) Virgin Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select>
    </select>
    </p>

    <?php
}

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

function wooc_validate_reg_form_fields($validation_errors) {
	if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
		$validation_errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'text_domain'));
	}

	if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
		$validation_errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'text_domain'));
	}
	return $validation_errors;
}

add_filter('woocommerce_process_registration_errors', 'wooc_validate_reg_form_fields', 10, 3);

function wooc_save_reg_form_fields($customer_id) {
	if (isset($_POST['billing_first_name'])) {
		update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
		update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
	}

	if (isset($_POST['billing_last_name'])) {
		update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
		update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
	}
}

add_action('woocommerce_created_customer', 'wooc_save_reg_form_fields');


/**
 * Apply a different tax rate based on the user role.
 */
function wc_diff_rate_for_user( $tax_class, $product ) {
	if ( is_user_logged_in() && current_user_can( 'retailer' ) ) {
		$tax_class = 'Zero Rate';
	}
	return $tax_class;
}
add_filter( 'woocommerce_product_tax_class', 'wc_diff_rate_for_user', 1, 2 );

function get_product_sale_price($product) {
	global $wad_discounts;

	$sale_price = $product->get_display_price();

	if (isset($product->aelia_cs_conversion_in_progress) && !empty($product->aelia_cs_conversion_in_progress))
		return $sale_price;

	if (is_admin() && !is_ajax())
		return $sale_price;

	$pid = wad_get_product_id_to_use($product);

	$all_discounts = $wad_discounts;
	foreach ($all_discounts["product"] as $discount_id => $discount_obj) {
		$list_products = $discount_obj->products;

		if ($discount_obj->is_applicable($pid) && in_array($pid, $list_products)) {
			$sale_price -= $discount_obj->get_discount_amount($sale_price);
		}
	}

	return $sale_price;
}

 add_filter('jpeg_quality', function($arg){return 100;});

 /*** CURRENCY ***/
// adds additional term at third checkout step for users from Shipping Zone 4 and Rest of World.
function get_checkout_term($type) {
	$zones = WC_Shipping_Zones::get_zones();
	
	echo '<div style="display: none;">';
//		print_r($zones);
	echo '</div>';
	
	$delivery_costs_flag = true;
	$import_duty_flag = true;
	
	// return term about no delivery in zones 1-8
	if ($type == "delivery_costs") {
		for ($i = 1; $i <= count($zones); $i++) {
			for ($locations = 0; $locations < count($zones[$i]['zone_locations']); $locations++){
				if (($zones[$i]['zone_locations'][$locations]->code) == ($_COOKIE['aelia_billing_country'])){
					$delivery_costs_flag = false;
				}
			}
		}

		if ($delivery_costs_flag == true) {
			return '<div class="cart-additional-terms">We are sorry, but shipping cost for country you have selected is currently unavailable. To receive information about shipping cost please check options "Courier shipping - request price" and "Direct bank transfer" and press “COMPLETE ORDER” button. The shipping cost will be emailed to you and your order will be processed further only after your acceptance.</div>';
		}
	}
	
	// return import duty term for 1-3 zones.
	if ($type == "import_duty") {
		for ($i = 1; $i <= count($zones); $i++) {
			if ($i == 1 || $i == 2 || $i == 3) {
				for ($locations = 0; $locations < count($zones[$i]['zone_locations']); $locations++){
					if (($zones[$i]['zone_locations'][$locations]->code) == ($_COOKIE['aelia_billing_country'])){
						$import_duty_flag = false;
					}
				}
			}
		}
		if ($import_duty_flag == true) {
			return '<div class="cart-additional-terms">Our prices do not include Import Duty and GST / VAT applicable in your country. We deliver by a courier such as DHL, FedEx and UPS. You will pay Import Duty and VAT to the courier and the courier will make a VAT invoice. The courier\'s VAT invoice is accepted for VAT Return - the courier is a VAT registered company in your country.</div>';
		}
	}	
}


/*** Product Page ***/
// checks a specific Shipping Zone for customer counter, and disable sale capability
function check_if_customer_can_buy() {
	$zones = WC_Shipping_Zones::get_zones();
	
	echo '<div style="display: none;">';
//		print_r($zones);
	echo '</div>';	
	
	$can_buy_flag = false;
	
	// return term about no delivery in no delivery zone
//	echo "Kraje należące do sprawdzanej strefy: ";
			for ($locations = 0; $locations < count($zones[9]['zone_locations']); $locations++){
				
				$loc = $zones[9]['zone_locations'][$locations]->code;
//				echo "$loc ";
				
				if (($zones[9]['zone_locations'][$locations]->code) == ($_COOKIE['aelia_billing_country'])){
					$delivery_costs_flag = true;
				}
			}

		if ($delivery_costs_flag == true) {
			echo '<p id="delivery-text">Online sale in your country is unavailable. Please contact your nearest retailer. You may find our retailers list in the <a href="'.get_page_link(162).'">CONTACT section on our site</a>.</p>';
			?>
			<script>
				function hideButtonsPlease() {
					hideBtn1 = document.getElementsByClassName("quantity");
					length = hideBtn1.length;
					hideBtn2 = document.getElementsByClassName("single_add_to_cart_button");
/*					hideBtn3 = document.getElementsByClassName("req-text");*/
					hideBtn1[length-1].style.display = ("none");
					hideBtn2[0].style.display = ("none");
/*					hideBtn3[0].style.display = ("none");*/
				}
				setTimeout(hideButtonsPlease, 1000);
			</script> <?php
		} 
		
	
}


function change_country_currencies($country_currencies) {
// Change normal currency to defined
$country_currencies['CZ'] = 'EUR';
$country_currencies['AL'] = 'EUR';
$country_currencies['AD'] = 'EUR';
$country_currencies['AM'] = 'EUR';
$country_currencies['AZ'] = 'EUR';
$country_currencies['BY'] = 'EUR';
$country_currencies['GE'] = 'EUR';
$country_currencies['LI'] = 'EUR';
$country_currencies['ME'] = 'EUR';
$country_currencies['MK'] = 'EUR';
$country_currencies['MD'] = 'EUR';
$country_currencies['MC'] = 'EUR';
$country_currencies['NO'] = 'EUR';
$country_currencies['RU'] = 'EUR';
$country_currencies['SM'] = 'EUR';
$country_currencies['RS'] = 'EUR';
$country_currencies['CH'] = 'EUR';
$country_currencies['GB'] = 'GBP';
$country_currencies['SE'] = 'EUR';
$country_currencies['TR'] = 'EUR';
$country_currencies['VA'] = 'EUR';
$country_currencies['SE'] = 'EUR';
$country_currencies['LV'] = 'EUR';
$country_currencies['LT'] = 'EUR';
$country_currencies['HU'] = 'EUR';
$country_currencies['RO'] = 'EUR';
$country_currencies['DK'] = 'EUR';
$country_currencies['HR'] = 'EUR';
$country_currencies['BG'] = 'EUR';
$country_currencies['UK'] = '';




return $country_currencies;
}

add_filter('wc_aelia_currencyswitcher_country_currencies', 'change_country_currencies', 10, 1);


// zrobić funcję script biorącą - .cart-collaterals, a z niej .calculated_shipping
function only_one_shipping_on_cart() {

?>
<script>
let cart = document.getElementsByClassName("cart-collaterals");
if (cart.length > 1) {
	for (i = 2; i < cart.length; i++) {
		cart[i].innerHTML = "";
	}
}
</script>
<?php 
};

function change_key( $array, $old_key, $new_key ) {

    if( ! array_key_exists( $old_key, $array ) )
        return $array;

    $keys = array_keys( $array );
    $keys[ array_search( $old_key, $keys ) ] = $new_key;

    return array_combine( $keys, $array );
}

add_filter( 'woocommerce_checkout_fields' , 'my_override_checkout_fields' );
function my_override_checkout_fields( $fields ){
   $fields['shipping'] = change_key( $fields['shipping'], 'shipping_address', 'shipping_address_1' );
  $fields['billing']['billing_state']['required'] = false;
  $fields['shipping']['shipping_state']['required'] = false;
  return $fields;
}



function action_woocommerce_checkout_update_order_review($array, $int)
{
    WC()->cart->calculate_shipping();
    return;
}
add_action('woocommerce_checkout_update_order_review', 'action_woocommerce_checkout_update_order_review', 10, 2);



