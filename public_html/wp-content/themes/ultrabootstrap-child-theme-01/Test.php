<?php
/**
 * Template Name: Test
 * The template used for displaying fullwidth page content in test.php
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
					<div class="example example2">
					    <p>Tu bedzie!</p>
					    <div class="slider slider-for">
					        <div>1</div>
					        <div>2</div>
					        <div>3</div>
					        <div>4</div>
					    </div>
					</div>
				</div>
			</div>
	    </div>
	    <div class="content-full">
			<div class="row">
				<div class="col-md-12">
					<div class="row mar-bot">
						<div class="example example2">
						    <div class="slider slider-nav">

						        <div><p>1</p></div>
						        <div><p>2</p></div>
						        <div><p>3</p></div>
						        <div><p>4</p></div>
						    </div>
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
	<div class="custom-container img-slider">
		<div class="row">
			<div class="col-md-12">
				<h5><?php the_field('text_guidebox'); ?></h5>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>

