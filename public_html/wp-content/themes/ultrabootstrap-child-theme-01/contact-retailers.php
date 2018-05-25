<?php
/**
 * Template Name: Contact-retailers
 *
 * The template used for displaying fullwidth page content in contact-retailers.php
 *
 * @package ultrabootstrap
 */
get_header(); ?>		

<empty-space></empty-space>
<div class="title-page">
	<h1> <?php the_title();?></h1>
	<h2><?php the_field('subtitle_for_retailers'); ?></h2>
</div>

	

<div class="custom-container">
	<div class="row contact-retailers">
		<?php the_field('form_retailers'); ?>
	</div>
</div>




<?php get_footer(); ?>




	
