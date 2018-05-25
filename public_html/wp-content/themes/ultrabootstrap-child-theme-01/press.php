<?php
/**
 * Template Name: Press
 *
 * The template used for displaying fullwidth page content in press.php
 *
 * @package ultrabootstrap
 */
get_header(); ?>		

<empty-space></empty-space>
<div class="title-page">
	<h1> <?php the_title();?></h1>
</div>



<div class="container">
	<div class="row">
		  <div id="images">
			<?php if( have_rows('press') ): $int = 0;
			    while ( have_rows('press') ) : the_row(); $int++; ?>
					<div class="col-md-6">
						<?php if($int == 0) { ?>
							<div id="monster" class="retailer">
								<div class="retailer">
									<a href="<?php the_sub_field('link_image'); ?> ">
					        			<img src="<?php the_sub_field('image'); ?>" alt="">
									</a>
					        		<div class="contents main-title">
							            <h1 class="post-title"><?php the_sub_field('title'); ?></h1>
							            <h3><?php the_sub_field('data'); ?></h3>
							        </div>
								</div>
							</div>
						<?php } ?>
						<?php if($int > 0 && $int < 5) { ?>
							<div class="retailer">
								<div class="retailer">
									<a href="<?php the_sub_field('link_image'); ?> ">
					        			<img src="<?php the_sub_field('image'); ?>" alt="">
									</a>
					        		<div class="contents main-title">
							            <h1 class="post-title"><?php the_sub_field('title'); ?></h1>
							            <h3><?php the_sub_field('data'); ?></h3>
							        </div>
								</div>
							</div>
						<?php } ?>
						<?php if($int > 4) { ?>
							<div class="retailer hideme">
								<div class="retailer">
									<a href="<?php the_sub_field('link_image'); ?> ">
					        			<img src="<?php the_sub_field('image'); ?>" alt="">
									</a>
					        		<div class="contents main-title">
							            <h1 class="post-title"><?php the_sub_field('title'); ?></h1>
							            <h3><?php the_sub_field('data'); ?></h3>
							        </div>
								</div>
							</div>
						<?php } ?>								
					</div>
			    <?php endwhile;
			endif; ?>	
		</div>
	</div>
</div>

<?php get_footer(); ?>

