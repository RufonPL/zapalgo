<?php
/**
 * Template part for displaying posts.
 *
 * @package ultrabootstrap
 */

?>

<?php $int++; ?>

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

