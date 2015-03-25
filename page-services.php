<?php
/*
Template Name: Services Template
*/
?>

<?php get_header(); ?>

			<div id="content" class="services inner-services">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="wrap clearfix interior-page-width">
					<div class="twelvecol first clearfix" role="main">
						<div class="page-header-wrapper">
							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>	
					</div>
				</div>
				<div class="redwood-divisor-large"></div>
				<div class="second-half">
					<div class="wrap clearfix interior-page-width gray testimonial-push">
						<div class="fourcol first testimonial-group">
							<?php echo masterstouch_get_the_first_testimonial(); ?>
							<a href="#testimonial-bottom" class="read-more-tests">Read More Testimonials</a>
						</div>
						<div class="eightcol last">
							<div class="extra-space">
								<h1>We Offer</h1><br>
								<?php echo masterstouch_get_the_services(); ?>
							</div>	
						</div>
					</div>
				</div>
				<div class="second-half lose-that-space">
					<div class="wrap clearfix">
						<a name="testimonial-bottom" id="testimonial-bottom"></a>
						<div class="redwood-divisor-large"></div>
						<div class="page-separator cf">
							<h1>Words from our clients</h1>
						</div>	
					</div>	
					<div class="wrap clearfix interior-page-width gray">
						<div class="cf large-testimonial-area">
							<div id="gridalicious">
								<?php echo masterstouch_get_all_testimonials(); ?>
							</div>	
						</div>	
					</div>	
				</div>			
				<?php endwhile; ?>
				<?php endif; ?>
			</div>

<?php get_footer(); ?>
