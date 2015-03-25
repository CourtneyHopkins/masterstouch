<?php
/*
Template Name: Gallery Template
*/
?>

<?php get_header(); ?>

	<div id="content" class="inner-gallery">
		<div class="wrap clearfix interior-page-width">
			<div class="twelvecol first clearfix" role="main">
				<div class="page-header-wrapper">
					<h1 class="page-title" itemprop="headline">Gallery Collections</h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<p><?php the_content(); ?></p>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
		<div class="redwood-divisor-large"></div>
		<div class="second-half">
			<div class="wrap clearfix">
				<ul class="galleries clearfix">
				<?php 
					$args = array( 'post_type' => 'gallery', 'posts_per_page' => -1, 'post_status' => 'publish' );
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
				?>	
				<li>
					<a href="<?php echo the_permalink(); ?>" class="gallery-thumb-wrapper">
						<div class="gallery-thumb">
							<img src="<?php echo masterstouch_get_image_src( get_field( 'gallery_thumbnail' ), 'gallery-thumb' ); ?>" />
							<p><?php echo the_title(); ?></p>
						</div>
					</a>
				</li>	
				<?php endwhile; ?>
				<?php else: ?>
				<li>
					<h2>There are no galleries at this time.</h2>
				</li>	
				<?php endif; ?>
				</ul>
			</div>	
		</div>
	</div>

<?php get_footer(); ?>
