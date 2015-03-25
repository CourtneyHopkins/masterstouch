<?php
/*
Template Name: Contact Template
*/
?>

<?php get_header(); ?>

	<div id="content" class="inner-gallery">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="wrap clearfix interior-page-width">
			<div class="twelvecol first clearfix" role="main">
				<div class="page-header-wrapper">
					<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
					<p><?php _e( get_field( 'contact_blurb' ) ); ?></p>
					<p><a href="tel:<?php echo get_field( 'phone', 'option'); ?>" class="phone"><?php echo get_field( 'phone', 'option'); ?></a></p>
				</div>	
			</div>
		</div>
		<div class="redwood-divisor-large"></div>
		<div class="second-half">
			<div class="wrap clearfix interior-page-width">
				<div class="twelvecol first clearfix" role="main">
					<div class="contact-form">
						<?php the_content(); ?>
					</div>	
				</div>
			</div>	
		</div>			
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	

<?php get_footer(); ?>
