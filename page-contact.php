<?php
/*
Template Name: Contact Template
*/
?>

<?php get_header(); ?>

	<div id="content">
		<div id="inner-content" class="wrap clearfix">
			<div id="main" class="twelvecol first clearfix" role="main">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="page-header-wrapper">
					<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
					<p><?php _e( get_field( 'contact_blurb' ) ); ?></p>
					<p class="phone"><?php _e( get_field( 'phone', 'option') ); ?></p>
					<div class="divisor"></div>
					<div class="contact-form">
						<?php the_content(); ?>
					</div>	
				</div>	
				<?php endwhile; else : ?>
					<article id="post-not-found" class="hentry clearfix">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
					</article>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
