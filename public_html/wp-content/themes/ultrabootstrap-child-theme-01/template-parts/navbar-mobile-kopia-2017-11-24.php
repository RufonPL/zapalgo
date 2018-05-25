<div class="container visible-xs">
    <nav class="navbar navbar-default navbar-fixed-top up-down" role="navigation">
      <div class="navbar-header dropdown">
       	<div class="logo-tag">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php the_field('logo', 'options'); ?>" alt=""></a>   
      	</div>		  
        <button id="nav-dropdown" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
	
<!--<div class="container">-->
<!--  <div class="dropdown">-->
<!--    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">BUTTON
    <span class="caret"></span></button>-->
<div class="navbar-collapse collapse">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#SHOP">SHOP</a>
        </h4>
      </div>
      <div id="SHOP" class="panel-collapse collapse">
        <div class="panel-body">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#SHOP1" href="#SHOP11">Lighting</a>
			</h4>
			</div>
			<div id="SHOP11" class="panel-collapse collapse">
				<div class="panel-body">
									<?php
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu12',
											'theme_location'    => 'my-custom-menu12',
											'depth'             => 8,
											'container'         => 'div',
											'menu_class'        => '',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);
									?>
				</div>
			</div>

			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#SHOP1" href="#SHOP12">Furniture</a>
			</h4>
			</div>
			<div id="SHOP12" class="panel-collapse collapse">
				<div class="panel-body">
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
			</div>

			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#SHOP1" href="#SHOP13">Accessories</a>
			</h4>
			</div>
			<div id="SHOP13" class="panel-collapse collapse">
				<div class="panel-body">
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
			</div>
			
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#SHOP1" href="#SHOP14">End series</a>
			</h4>
			</div>
			<div id="SHOP14" class="panel-collapse collapse">
				<div class="panel-body">
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
			</div>	
		</div>
      </div>
	</div>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#GUIDEBOOK1">GUIDEBOOK</a>
        </h4>
      </div>
      <div id="GUIDEBOOK1" class="panel-collapse collapse">
        <div class="panel-body">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#GUIDEBOOK1" href="#GUIDEBOOK11">Copper finish</a>
			</h4>
			</div>
			<div id="GUIDEBOOK11" class="panel-collapse collapse">
				<div class="panel-body">
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
			</div>

			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#GUIDEBOOK1" href="#GUIDEBOOK12">Wood</a>
			</h4>
			</div>
			<div id="GUIDEBOOK12" class="panel-collapse collapse">
				<div class="panel-body">
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
			</div>

			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#GUIDEBOOK1" href="#GUIDEBOOK13">Shades</a>
			</h4>
			</div>
			<div id="GUIDEBOOK13" class="panel-collapse collapse">
				<div class="panel-body">
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
			</div>
			
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#GUIDEBOOK1" href="#GUIDEBOOK14">Others</a>
			</h4>
			</div>
			<div id="GUIDEBOOK14" class="panel-collapse collapse">
				<div class="panel-body">
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
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">ABOUT</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">CONTACT</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#collapse3" href="#collapse4">Collapsible Group 3</a>
          </h4>
        </div>
        <div id="collapse4" class="panel-collapse collapse">
          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        </div>
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#collapse3" href="#collapse5">Collapsible Group 3</a>
          </h4>
        </div>
        <div id="collapse5" class="panel-collapse collapse">
          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        </div>
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#collapse3" href="#collapse6">Collapsible Group 3</a>
          </h4>
        </div>
        <div id="collapse6" class="panel-collapse collapse">
          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        </div>
      </div>
    </div>
  </div> 
</div>
<!--	<li><a tabindex="-1" href="#">Item 1</a></li>
      <li><a tabindex="-1" href="#">Item 2</a></li>
      <li class="dropdown-submenu">
        <a class="mobile-nav" tabindex="-1" href="#">SHOP<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-submenu">
            <a class="mobile-nav" tabindex="-1" href="#">Lighting<span class="caret"></span></a>
				<ul class="dropdown-menu">
 									<?php/*
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu12',
											'theme_location'    => 'my-custom-menu12',
											'depth'             => 8,
											'container'         => 'ul',
											'menu_class'        => 'nav navbar-nav navbar-left dropdown-submenu',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);*/
									?>
				</ul>
			</li>
			<li class="dropdown-submenu">
            <a class="mobile-nav" tabindex="-1" href="#">Furniture<span class="caret"></span></a>
				<ul class="dropdown-menu">				
												<?php /*
										wp_nav_menu( array(
											'menu'              => 'my-custom-menu13',
											'theme_location'    => 'my-custom-menu13',
											'depth'             => 8,
											'container'         => 'ul',
											'menu_class'        => 'nav navbar-nav navbar-left dropdown-submenu',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker())
										);*/
									?>
				</ul>
			</li>
			</ul>
 <!--           <ul class="dropdown-menu">
              <li><a href="#">3rd level dropdown</a></li>
              <li><a href="#">3rd level dropdown</a></li>
            </ul>-->
 <!--         </li>-->

      </li>
    </ul>
  <!--</div>-->
</div>

<script>
$(document).ready(function(){
  $('p').on("click", function(e){
	alert("The paragraph was clicked.");
  });
});

/*$(document).ready(function(){
  $('.dropdown-submenu a.mobile-nav').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});*/
</script>


    </nav>
</div>