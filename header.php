<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title(''); ?></title>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href='http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC|Kelly+Slab|Mate+SC|Strait' rel='stylesheet' type='text/css'>
		<?php wp_head(); ?>
	</head>

	<body>
		<div id="container">
			<header class="header clearfix" role="banner">
				<p id="site-title"><?php bloginfo('name'); ?></p>
				<div id="inner-header" class="clearfix">
					<div class="nav-container">
						<div class="nav left">
							<a href="masterstouch.com/about/">About</a>
							<a href="masterstouch.com/services/">Services</a>
						</div>
						<div class="left">
							<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php _e( get_stylesheet_directory_uri() ); ?>/library/images/mt_logo.png" id="logo" alt="Master's Touch Tree Service Logo" /></a>	
						</div>
						<div class="nav left">
							<a href="masterstouch.com/gallery/">Gallery</a>
							<a href="masterstouch.com/contact/">Contact</a>
						</div>	
					</div>
				</div>
			</header>