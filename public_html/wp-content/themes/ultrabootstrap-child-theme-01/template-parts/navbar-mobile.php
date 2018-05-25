<!--<div class="container menu-mobile">-->
	<nav class="navbar navbar-default navbar-fixed-top up-down" role="navigation">
		<div class="navbar-header dropdown">
			<div class="logo-tag">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php the_field('logo', 'options'); ?>" alt=""></a>   
				</div>		  
				<button type="button" class="navbar-toggle">
					<span class="icon-bar"/></span>
					<span class="icon-bar"/></span>
					<span class="icon-bar"/></span>
				</button>
				<div class="cart-mobile">
					<a class="dropdown-toggle" href="<?php bloginfo('url'); ?>/cart/" id="dropdownMenuLink">
						<i class="fa fa-shopping-cart fa-lg" aria-hidden="true"/></i>
					</a>
				</div>

				<div class="navbar-collapse collapse">
					<!--Collapse Menu-->
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Shop</a>
								</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse">
								<div class="panel-body">
									<h5 data-toggle="collapse" data-target="#shop-1">Lighting</h5>
									<div id="shop-1" class="collapse">
										<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu12',
											'theme_location'    => 'my-custom-menu12',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
									</div>
									<h5 data-toggle="collapse" data-target="#shop-2">Furniture</h5>
									<div id="shop-2" class="collapse">
										<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu13',
											'theme_location'    => 'my-custom-menu13',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
									</div>
									<h5 data-toggle="collapse" data-target="#shop-3">Accessories</h5>
									<div id="shop-3" class="collapse">
										<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu14',
											'theme_location'    => 'my-custom-menu14',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
									</div>
									<h5 data-toggle="collapse" data-target="#shop-4">Bulbs</h5>
									<div id="shop-4" class="collapse">
										<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu15',
											'theme_location'    => 'my-custom-menu15',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
									</div>
								</div>						
							</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Guidebook</a>
									</h4>
								</div>
								<div id="collapse2" class="panel-collapse collapse">
									<div class="panel-body">
										<h5 data-toggle="collapse" data-target="#guidebook-1">Metal finish</h5>
										<div id="guidebook-1" class="collapse">
											<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu5',
											'theme_location'    => 'my-custom-menu5',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
										</div>
										<h5 data-toggle="collapse" data-target="#guidebook-2">Wood</h5>
										<div id="guidebook-2" class="collapse">
											<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu6',
											'theme_location'    => 'my-custom-menu6',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
										</div>
										<h5 data-toggle="collapse" data-target="#guidebook-3">Shades</h5>
										<div id="guidebook-3" class="collapse">
											<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu7',
											'theme_location'    => 'my-custom-menu7',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
										</div>
										<h5 data-toggle="collapse" data-target="#guidebook-4">Others</h5>
										<div id="guidebook-4" class="collapse">
											<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu8',
											'theme_location'    => 'my-custom-menu8',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
										</div>
									</div>
								</div>
							</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">About</a>
										</h4>
									</div>
									<div id="collapse3" class="panel-collapse collapse">
										<div class="panel-body">
											<h5 data-toggle="collapse" data-target="#about-1">Company</h5>
											<div id="about-1" class="collapse">
												<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu1',
											'theme_location'    => 'my-custom-menu1',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
											</div>
											<h5 data-toggle="collapse" data-target="#about-2">Media</h5>
											<div id="about-2" class="collapse">
												<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu2',
											'theme_location'    => 'my-custom-menu2',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
											</div>
											<h5 data-toggle="collapse" data-target="#about-3">Download</h5>
											<div id="about-3" class="collapse">
												<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu3',
											'theme_location'    => 'my-custom-menu3',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										?>
											</div>
											<h5 data-toggle="collapse" data-target="#about-4">Legal Matters</h5>
											<div id="about-4" class="collapse">
												<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu4',
											'theme_location'    => 'my-custom-menu4',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Contact</a>
										</h4>
									</div>
									<div id="collapse4" class="panel-collapse collapse">
										<div class="panel-body">
											<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu9',
											'theme_location'    => 'my-custom-menu9',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu10',
											'theme_location'    => 'my-custom-menu10',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
										
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu11',
											'theme_location'    => 'my-custom-menu11',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => 'nav navbar-nav navbar-left',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
										</div>
									</div>
								</div>


								<div class="panel panel-default">
									<div class="panel-heading">
										<a href="<?php bloginfo('url'); ?>/session/" data-parent="#accordion"><h4 class="panel-title">Country</h4>
										</a>
									</div>
								</div>

							</div> 
						</div>
						<!-- End of Collapse Menu-->


					</div>

					<script>
$(document).ready(function(){
  $('.dropdown-submenu a.mobile-nav').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
					</script>


				</nav>
			<!--</div>-->