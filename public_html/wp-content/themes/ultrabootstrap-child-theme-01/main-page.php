<?php
/**
 * Template Name: Main-page
 * The template used for displaying fullwidth page content in main-page.php
 *
 * @package ultrabootstrap
 */
get_header();
$urlPrefix = '';
?>		

<empty-space></empty-space>

<section class="page-section">
	<div class="custom-container">
		<div class="row">
			<div class="col-md-12">
				<div data-slick class="autoplay2  slider-img" style="margin-bottom: 70px;">
					<?php if( have_rows('home_slider') ):
						while ( have_rows('home_slider') ) : the_row(); ?>
							<div class="img-slider">
								<a href="<?php the_sub_field('url_slider'); ?>">
									<img src="<?php the_sub_field('home_slider'); ?>" alt="">
								</a>
							</div>
						<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="page-section">

  <?php
  $shopByCategoryItems = array(
      array(
          'name' => 'Table lamps collection',
          'link' => '/product-category/designer-table-lamps/'
      ),
      array(
          'name' => 'Floor lamps collection',
          'link' => '/product-category/designer-floor-lamps/'
      ),
      array(
          'name' => 'Wall lamps collection',
          'link' => '/product-category/designer-wall-lamps-sconces/'
      ),
      array(
          'name' => 'Ceiling lamps collection',
          'link' => '/product-category/designer-ceiling-lamps/'
      ),
      array(
          'name' => 'Furniture collection',
          'link' => '/product-category/designer-furniture/'
      ),
      array(
          'name' => 'Accessories collection',
          'link' => '/product-category/designer-accessories/'
      ),
      
  );

  ?>
  <div class="title-page">
    <h1>Shop by category</h1>
  </div>
  <div class="custom-container homeTiles">	
    <div class="row">
      <?php foreach($shopByCategoryItems as $index => $item):?>
      <a href="<?php echo $urlPrefix.$item['link']?>" class="col-md-6">
        <img src="<?php echo get_template_directory_uri(); ?>/img/cat<?php echo $index+1?>.jpg"/>
        <h4><?php echo $item['name']?></h4>
      </a>
      
      <?php endforeach?>
      
    </div>
  </div>

</section>


<section class="page-section">

  <?php
  $aboutZapalgoItems = array(
      array(
          'name' => 'The movie',
          'link' => '/zapalgo_video/'
      ),
      array(
          'name' => 'Our story',
          'link' => '/zapalgo-story-behind-genius/'
      ),
      array(
          'name' => 'Press',
          'link' => '/press/'
      ),
      array(
          'name' => 'Blog',
          'link' => '/blog/'
      ),
      
  );

  ?>
  <div class="title-page">
    <h1>About Zapalgo</h1>
  </div>
  <div class="custom-container homeTiles">	
    <div class="row">
      <?php foreach($aboutZapalgoItems as $index => $item):?>
      <a href="<?php echo $urlPrefix.$item['link']?>" class="col-md-6">
        <img src="<?php echo get_template_directory_uri(); ?>/img/about<?php echo $index+1?>.jpg"/>
        <h4><?php echo $item['name']?></h4>
      </a>
      <?php endforeach?>
    </div>
  </div>
</section>



		  					

<!-- <div class="container">
    <div class="content-teaser">
     1
    </div>
    <div class="content-full">
     2
    </div>
<button class="readmore glyphicon glyphicon-th-large" aria-hidden="true"></button>
</div>
 -->
<?php get_footer(); ?>

