<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ultrabootstrap
 */

get_header(); ?>

<!-- Header Image -->
<?php if (has_header_image()): ?>
<div class="text-center">
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
<?php endif;?>
<!-- Header Image -->


<div class="spacer" style="padding-top: 0px;">
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

      <?php if ( is_home() && ! is_front_page() ) : ?>
        <header>
          <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
      <?php endif; ?>
<div class="custom-container">
  <div class="row post-list">
      <?php /* Start the Loop */ ?>
<empty-space></empty-space>
      <div class="page-title">
        <h1>Blog</h1>
      </div>
      <?php while ( have_posts() ) : the_post(); ?>
            <?php if($int == 0) { ?>
              <div id="monster" >
                  <div class="single-post">
                      <div class="post-content">
                          <article class="contents main-title">
                              <h1 class="post-title"><?php the_title(); ?></h1>
                              <h3><?php the_field('date_subtitle'); ?></h3>
                          </article>
                          <?php if( have_rows('images') ):
                              while ( have_rows('images') ) : the_row(); ?>
                                  <div class="img-blog">
                                      <img src="<?php the_sub_field('image'); ?>" alt="">
                                      <h5><?php the_sub_field('subtitle'); ?></h5>

                                  </div>
                              <?php endwhile;
                          endif; ?>
                          <h4><?php the_field('content'); ?></h4>
                      </div>
                  </div>
                  <div class="clearfix"></div>
              </div>
            <?php } ?>
            <?php if($int > 0) { ?>
              <div class="hideme">
                <div class="single-post">
                    <div class="post-content">
                        <article class="contents main-title">
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            <h3><?php the_field('date_subtitle'); ?></h3>
                        </article>
                        <?php if( have_rows('images') ):
                            while ( have_rows('images') ) : the_row(); ?>
                                <div class="img-blog">
                                    <img src="<?php the_sub_field('image'); ?>" alt="">
                                    <h5><?php the_sub_field('subtitle'); ?></h5>

                                </div>
                            <?php endwhile;
                        endif; ?>
                        <h4><?php the_field('content'); ?></h4>
                    </div>
                </div>
                <div class="clearfix"></div>
              </div>
            <?php } ?>    
          <?php $int++; ?>  
      <?php endwhile; ?>

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>
</div>
</div>
    </main><!-- #main -->
  </div><!-- #primary -->
</div>
<?php get_footer(); ?>