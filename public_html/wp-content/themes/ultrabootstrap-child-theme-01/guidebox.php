
<?php
/**
 * Template Name: Guidebox
 * The template used for displaying fullwidth page content in guidebox.php
 *
 * @package ultrabootstrap
 */
get_header(); ?>		




<empty-space></empty-space>
<div class="title-page">
	<h1> <?php the_title();?></h1>
</div>
<section class="page-section">
	<div class="custom-container check">
	    <div class="content-teaser">
			<div class="row">
				<div class="col-md-12">	
                    <div class="col-sm-12">
                        <div id="slider">
                            <!-- Top part of the slider -->
                            <div class="row">
                                <div id="carousel-bounding-box">
                                    <div class="carousel slide" id="myCarousel"  data-interval="false">
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
                                        <?php if( have_rows('gallery_slider') ):
                                            while ( have_rows('gallery_slider') ) : the_row();
                                                ?>
                                                <?php if( $n == 0 ){ ?>

                                                    <div class="active item" data-slide-number="<?php echo $n ?>">
                                                        <img src="<?php the_sub_field('gallery_image'); ?>">
                                                            <div class="img-slider">
                                                                <h4><?php the_sub_field('gallery_title'); ?></h4>
                                                            </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="item" data-slide-number="<?php echo $n ?>">
                                                        <img src="<?php the_sub_field('gallery_image'); ?>">
                                                            <div class="img-slider">
                                                                <h4><?php the_sub_field('gallery_title'); ?></h4>
                                                            </div>
                                                    </div>
                                                <?php } 
                                                $n++; 
                                                ?>
                                            <?php endwhile;
                                        endif; ?>
                                        <?php if( get_field('movie') ): ?>
                                            <div class="item" data-slide-number="<?php echo $n+1 ?>">
                                                <?php $movie = get_field('movie'); echo do_shortcode($movie); ?>
                                                    <div class="img-slider">
                                                        <h4><?php the_sub_field('gallery_title'); ?></h4>
                                                    </div>
                                            </div>
                                        <?php endif; ?>
                                   
                                        
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
                                <?php if( have_rows('gallery_slider') ):
                                    while ( have_rows('gallery_slider') ) : the_row();
                                        ?>
                                        <li class="col-sm-3">
                                            <a class="thumbnail" id="carousel-selector-<?php echo $m ?>"><img class="elo" src="<?php the_sub_field('gallery_image'); ?>"></a>
                                        </li>
                                    <?php $m++; endwhile;
                                endif; ?>
                                <?php if( get_field('movie') ): ?>
                                    <li class="col-sm-3">
                                        <a class="thumbnail" id="carousel-selector-<?php echo $m ?>"><img class="elo" src="<?php echo get_site_url().'/wp-content/uploads/2017/08/newplay.png'; ?>"></a>
                                    </li>
                                <?php endif; ?>


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



<section class="page-section">
	<div class="custom-container img-slider guidebox-content">
		<div class="row">
			<div class="col-md-12">
				<?php the_field('text_guidebox'); ?>
			</div>
		</div>
	</div>
</section>





<div class="container">
    <div id="main_area">
        <!-- Slider -->
        <div class="row">







            <!--/Slider-->
        </div>

    </div>
</div>



<?php get_footer(); ?>


