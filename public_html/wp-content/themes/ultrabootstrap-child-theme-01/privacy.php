<?php
/**
 * Template Name: Privacy
 * The template used for displaying fullwidth page content in privacy.php
 *
 * @package ultrabootstrap
 */
get_header(); ?>		

<empty-space></empty-space>
<div class="title-page-privacy">
	<h1> <?php the_title();?></h1>
</div>
<section class="page-section">
	<div class="custom-container c-tab">

		<ul class="nav nav-tabs" id="myTab">
			<li class="active">
				<a href="#EN" data-toggle="tab">
					<img src="http://www.e-conex.pl/zapalgo/wp-content/uploads/2017/02/en.jpg" alt="">
			   </a>
		    </li>
		    <li>
			    <a href="#PL" data-toggle="tab">
					<img src="http://www.e-conex.pl/zapalgo/wp-content/uploads/2017/02/pl.jpg" alt="">
			    </a>
		    </li>

		</ul>
	</div>

</section>
<section class="page-section top-c">
	<div class="custom-container img-slider">
		<div class="row tab-content c-tab">
			<div class="col-md-12 tab-pane active" id="EN">
				<?php the_field('text_en'); ?>
			</div>
			<div class="col-md-12 tab-pane" id="PL">
				<?php the_field('text_pl'); ?>
			</div>
		</div>
	</div>
</section>





<?php get_footer(); ?>
