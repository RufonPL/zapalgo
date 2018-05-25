<?php
/**
 * Template Name: Contact-customers
 *
 * The template used for displaying fullwidth page content in contact-customers.php
 *
 * @package ultrabootstrap
 */
get_header(); ?>		

<empty-space></empty-space>
<div class="title-page">
	<h1> <?php the_title();?></h1>
</div>



<div class="custom-container">
	<div class="row contact-retailers">
		<?php the_field('form_customers'); ?>
	</div>
</div>




<?php get_footer(); ?>




	
