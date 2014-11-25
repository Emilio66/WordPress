<!DOCTYPE html>
<!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
    <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type"
	content="<?php bloginfo('html_type'); ?>"
	charset="<?php bloginfo('charset'); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>	
	<?php $wl_theme_options = weblizar_get_options(); ?>
	<?php if($wl_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon"
	href="<?php  echo $wl_theme_options['upload_image_favicon']; ?>" /> 
	<?php } ?>	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="">
	
		<!-- Header Section -->
		<div class="header_section">
			<div class="container">
				<!-- Logo & Contact Info -->
				<div class="row ">
					<div class="col-md-6 col-sm-12">
						<div class="logo">
							<a href="<?php echo home_url( '/' ); ?>"
								title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
								rel="home">
					<?php
					if ($wl_theme_options ['text_title'] == "on") {
						echo get_bloginfo ( 'name' );
					} else if ($wl_theme_options ['upload_image_logo'] != '') {
						?>
					<img class="img-responsive" src="<?php echo $wl_theme_options['upload_image_logo']; ?>" style="height:<?php if($wl_theme_options['height']!='') { echo $wl_theme_options['height']; }  else { "80"; } ?>px; width:<?php if($wl_theme_options['width']!='') { echo $wl_theme_options['width']; }  else { "200"; } ?>px;" />
					<?php } else { ?> 
					Movie2.0
					<?php } ?>
					</a>
							<p><?php bloginfo( 'description' ); ?></p>
						</div>
					</div>
				
			</div>
				<!-- /Logo & Contact Info -->
			</div>
		</div>
		<!-- /Header Section -->
		<!-- Navigation  menus -->
		<div class="navigation_menu " data-spy="affix" data-offset-top="95"
			id="enigma_nav_top" style="border-color:#e61f18;border-width:thin">
			<span id="header_shadow"></span>
			<div class="container navbar-container">
				<nav class="navbar navbar-default " role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#menu">

							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
					</div>
				<?php
				
				wp_nav_menu ( array (
						'menu' => 'primary',
						'theme_location' => 'primary',
						'container' => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id' => 'menu',
						'menu_class' => 'nav navbar-nav',
						'fallback_cb'       => 'wlkr_bootstrap_navwalker::fallback',
						'walker'     => new wlkr_bootstrap_navwalker())
				); ?>
			</nav>
			</div>
		</div>