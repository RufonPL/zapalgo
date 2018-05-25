<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ultrabootstrap
 */

get_header(); ?>
<empty-space></empty-space>
<div class="spacer">
<div class="custom-container">
	<div class="row">
		<div  class="col-sm-12">
<section class="page-section">					
			<div class="detail-content">     
			<?php while ( have_posts() ) : the_post(); ?>       
<?php if(is_checkout()){ ?>
	<div class="topp"></div>
<?php } else { ?>
<div class="page-title">
	<?php
	if (is_page(5) ) :
?>
<style>
.post-content > article > .woocommerce-message:nth-child(3), .post-content > article > .woocommerce:nth-child(2) {
    display: none !important;
}
.post-content > article > .woocommerce-message:nth-child(4), .post-content > article > .woocommerce:nth-child(3) {
    display: none !important;
}
.post-content > article > .woocommerce-message:nth-child(5), .post-content > article > .woocommerce:nth-child(4) {
    display: none !important;
}
.post-content > article > .woocommerce-message:nth-child(6), .post-content > article > .woocommerce:nth-child(5) {
    display: none !important;
}
</style>
<?php endif; ?>
	<h1>
		<?php 
			//the_title(); 
			$title = get_the_title($post->post_parent);
			if ($title == "Create Account") {
				echo "";
			} else {
				echo $title;
			}
		?>
	</h1>
</div>
<?php } ?>

<div class="single-post">
	<div class="post-content">

		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<figure>
				<?php the_post_thumbnail('full'); ?>
			</figure>
		<?php endif; ?>       

		<article>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ultrabootstrap' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</article> <!-- /.end of article -->
	</div>


</div>


<div class="entry-meta">
	<?php edit_post_link( __( 'Edit', 'ultrabootstrap' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-meta -->
	            <?php /*comments_template();*/ ?>
	        <?php endwhile; ?>
	        </div> <!-- /.end of detail-content -->
</section><!-- /.end of section -->
	</div>
	</div>
</div>
</div>
<?php get_footer(); ?>
