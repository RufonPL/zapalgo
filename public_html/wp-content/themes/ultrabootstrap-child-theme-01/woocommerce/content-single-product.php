<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

    global $product;
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>


<section class="page-section">
	<div class="check">
	    <div class="content-teaser">
			<div class="row">
				<div class="col-md-12">	
                    <div class="col-sm-12">
                        <div id="slider">
                            <!-- Top part of the slider -->
                            <div class="row">
                                <div id="carousel-bounding-box">
                                    <div class="carousel slide carousel-fade" id="myCarousel" data-interval="false">
                                      <ol class="carousel-indicators">
                                        <?php $slider = get_field('gallery_slider'); ?>
                                        <?php if( $slider ):
                                            foreach($slider as $index => $slide) :?>
                                        <li data-target="#myCarousel" data-slide-to="<?php echo $index?>"<?php if($index == 0):?>class="active"<?php endif?>></li>

                                        <?php endforeach?>
                                        <?php endif?>
                                      </ol>
                                        <!-- Carousel items -->
                                        <div class="carousel-inner">
                                        <?php $n = 0; ?>
                                        
                                        <?php if( $slider ):
                                            foreach($slider as $slide) :
												$image = $slide['gallery_image'];
												$text = $slide['gallery_title'];
                                                ?>
                                                <?php if( $n == 0 ){ ?>

                                                    <div class="active item" data-slide-number="<?php echo $n ?>">
                                                        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                                                            <div class="img-slider">
                                                                <h4><?php echo esc_html($text); ?></h4>
                                                            </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="item" data-slide-number="<?php echo $n ?>">
                                                        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                                                            <div class="img-slider">
                                                                <h4><?php echo esc_html($text); ?></h4>
                                                            </div>
                                                    </div>
                                                <?php } 
                                                $n++; 
                                                ?>
                                            <?php endforeach;
                                        endif; ?>
                                        </div>
                                        <!-- Carousel nav -->
                                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
	    </div>
	    <div class="content-full">
			<div class="row">
				<div class="col-md-12">
					<div class="row mar-bot">
                        <div id="slider-thumbs">
                            <!-- Bottom switcher of slider -->
                            <ul class="hide-bullets">
                                <?php $m = 0; ?>
                                <?php if( $slider ):
									foreach($slider as $slide) :
										$image = $slide['gallery_image'];
										$text = $slide['gallery_title'];
										?>
                                        <li class="col-sm-3">
                                            <a class="thumbnail" id="carousel-selector-<?php echo $m ?>"><img class="elo" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/></a>
                                        </li>
                                    <?php $m++; endforeach;
                                endif; ?>
                            </ul>
                        </div>
					</div>
				</div>
			</div>
	    </div>
		<div class="sub">
			<button class="readmore glyphicon glyphicon-th-large" aria-hidden="true"></button>
		</div>
	</div>
</section>
<section class="page-section productGuidebox">
	<div class="img-slider">
		<div class="row">
			<div class="col-md-12">
				<?php the_field('text_guidebox'); ?>
			</div>
		</div>
	</div>
</section>

<?php
/*


    $regular_price = $product->get_display_price();
    $sale_price = get_product_sale_price($product);
    $discount = ($product->get_display_price() - $sale_price) / $product->get_display_price() * 100;
	
	*/
	
    $regular_price = $product->get_regular_price(); //zmiana #1 (zmienione)
    $sale_price = get_product_sale_price($product);
    $discount = ($product->get_display_price() - $sale_price) / $product->get_display_price() * 100; //zmiana #2 (zmienione)
	$sale_price = $regular_price * (1 - ($discount / 100)); //zmiana #3 (dodane)
    $regular_description = __('Customer price');

    $cusotm_price = $product->get_sale_price();
    $custom_discount = round($discount);

    if ($regular_price == $product->get_regular_price()) {
	    $regular_description = __('Netto') . ' ' . $regular_description;
    }
?>
<?php check_if_customer_can_buy(); ?>
<div class="custom-prices js-custom-prices" data-price-discount="<?php echo $discount; ?>">
    <div class="custom-price-sale js-custom-price-sale"><?php echo wc_price($sale_price); ?></div>
    <?php

	?>
    <?php if ($discount != 0): ?>
        <div class="custom-price-regular js-custom-price-regular"><?php echo wc_price($regular_price) ?> <?php echo $regular_description; ?></div>
        <div class="custom-price-discount"><?php echo round($discount) . '% ' . __('discount') ?></div>
    <?php endif; ?>
</div>

<div class="custom-button-shop">
	<div class="col-sm-12">
		<div class="summary entry-summary">
		<?php
			add_filter( 'woocommerce_loop_add_to_cart_link', 'woocommerce_simple_add_to_cart' );
		?>
		</div><!-- .summary -->
	</div>


	<?php

	echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
	        esc_url( $product->add_to_cart_url() ),
	        esc_attr( $product->id ),
	        esc_attr( $product->get_sku() ),
	        $product->is_purchasable() ? 'add_to_cart_button' : '',
	        esc_attr( $product->product_type ),
	        esc_html( $product->add_to_cart_text() )
	    ),
	$product );
	?>
</div>
<div class="content-files">
	<div class="files">
	    <?php if( have_rows('files') ):
	        while ( have_rows('files') ) : the_row(); ?>
		        <div class="file">
			        <a href="<?php the_sub_field('file'); ?>"><img src="http://www.e-conex.pl/zapalgo/wp-content/uploads/2017/03/download.png" alt=""><span class="txt"><?php the_sub_field('name_file'); ?></span></a>
			    </div>
	        <?php endwhile;
	    endif; ?>	
	</div>
</div>

<?php 

/* crossells */ 

$crosssell_ids = get_post_meta( get_the_ID(), '_crosssell_ids' ); 
$crosssell_ids=$crosssell_ids[0]; 

?>
<div class="title-page seeAlso">
	<div class="h1">You may also like</div>
</div>
  <div class="seeAlsoContainer">
    <div class="row">
        <?php
        if(count($crosssell_ids)>0){
        $args = array( 'post_type' => 'product', 'posts_per_page' => 50, 'post__in' => $crosssell_ids );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        ?>


            <div class="col-md-3 col-sm-6 img-rel">
                <a href='<?php the_permalink(); ?>'>

                <?php // the_post_thumbnail( 'thumbnail' ); ?>
                <?php the_post_thumbnail( 'cross-sell-thumb' ); ?>
                <div class="font-style"><?php the_title(); ?></div>


                </a>
            </div>


        <?php
        endwhile;
        }
        ?>
    </div>
  </div>
<div style="clear: both;"></div>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

