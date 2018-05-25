<?php
/**
 * Template Name: Find-retailer
 *
 * The template used for displaying fullwidth page content in find-retailer.php
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
				<?php 
				// Get repeater value
				$repeater = get_field('retailers');
				$int = 0;
				// Obtain list of columns
				foreach ($repeater as $key => $row) {
					$name[$key] = $row['name'];
					$address_1[$key] = $row['address_1'];
					$address_2[$key] = $row['address_2'];
					$website[$key] = $row['website'];
					$mail[$key] = $row['mail'];
					$country[$key] = $row['country'];
				}

				// Sort the data by restaurant name column, ascending
				array_multisort($country, SORT_ASC, $repeater);

				// Display newly orded columns
				// Unsure if this is the optimal way to do this...
				foreach( $repeater as $row ) { $int++; ?>


					<div class="col-md-6">
						<?php if($int == 0) { ?>
							<div id="monster" class="retailer">
								<div><?php echo $row['name']; ?></div>
								<div><?php echo $row['address_1']; ?></div>
								<div><?php echo $row['address_2']; ?></div>
								<div><?php echo $row['website']; ?></div>
								<div><?php echo $row['mail']; ?></div>
								<div><?php echo $row['country']; ?></div>
							</div>
						<?php } ?>
						<?php if($int > 0 && $int < 7) { ?>
							<div class="retailer">
								<div><?php echo $row['name']; ?></div>
								<div><?php echo $row['address_1']; ?></div>
								<div><?php echo $row['address_2']; ?></div>
								<div><?php echo $row['website']; ?></div>
								<div><?php echo $row['mail']; ?></div>
								<div><?php echo $row['country']; ?></div>
							</div>
						<?php } ?>
						<?php if($int > 6) { ?>
							<div class="retailer hideme">
								<div><?php echo $row['name']; ?></div>
								<div><?php echo $row['address_1']; ?></div>
								<div><?php echo $row['address_2']; ?></div>
								<div><?php echo $row['website']; ?></div>
								<div><?php echo $row['mail']; ?></div>
								<div><?php echo $row['country']; ?></div>
							</div>
						<?php } ?>								
					</div>
				<?php } ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>

