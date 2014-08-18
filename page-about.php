<?php
/*
Template Name: About Template
*/
?>

<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap clearfix">
					<div id="main" class="twelvecol first clearfix" role="main">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<h1><?php the_title(); ?></h1>
							<div class="divisor"></div>
							<?php the_content(); ?>
							<?php _e( masterstouch_get_the_employee_slider() ); ?>
							<?php _e( masterstouch_get_the_employees() ); ?>
						<?php endwhile; else : ?>
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>

<?php get_footer(); ?>