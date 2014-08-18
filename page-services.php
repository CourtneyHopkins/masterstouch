<?php
/*
Template Name: Services Template
*/
?>

<?php get_header(); ?>

			<div id="content" class="services">
				<div id="inner-services" class="clearfix">
					<div id="main" class="twelvecol first clearfix" role="main">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="page-header-wrapper">
								<h1 class="page-title"><?php the_title(); ?></h1>
								<p><?php the_content(); ?></p>
								<div class="divisor"></div>
							</div>	
							<div class="fourcol first testimonial-group">
								<?php echo masterstouch_get_the_testimonials(); ?>
							</div>
							<div class="eightcol last">
								<?php echo masterstouch_get_the_services(); ?>
							</div>
						<?php endwhile; else : ?>
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						<?php endif; ?>
					</div>
				</div>
			</div>

<?php get_footer(); ?>
