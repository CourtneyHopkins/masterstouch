<?php
/*
Template Name: Homepage Template
*/
?>

<?php get_header(); ?>
		<div class="wrap shadow clearfix">
			<div id="homepage-slideshow">
				<?php echo masterstouch_get_homepage_slideshow(); ?>
			</div>
			<div id="tagline">
				<p><?php echo get_field( 'tagline' ); ?></p>
			</div>
			<div id="homepage-content">
				<div class="clearfix featured-area" role="main">
					<?php echo masterstouch_get_cards(); ?>
				</div>
			</div>
			<!-- <div class="divisor"></div> -->
		</div>	

<?php get_footer(); ?>
