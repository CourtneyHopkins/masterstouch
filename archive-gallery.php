<?php
/*
Template Name: Gallery Template
*/
?>

<?php get_header(); ?>

	<div id="content">
		<div id="inner-gallery" class="wrap clearfix">
			<div id="main" class="twelvecol first clearfix" role="main">
				<div class="page-header-wrapper">
					<h1 class="page-title" itemprop="headline">Gallery Collections</h1>
					<?php echo get_field( 'gallery_page_description', 'option'); ?>
				</div>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<a href="<?php echo the_permalink(); ?>" class="gallery-thumb-wrapper">
					<div class="gallery-thumb">
						<img src="<?php echo masterstouch_get_image_src( get_field( 'gallery_thumbnail' ), 'before-after-img' ); ?>" />
						<p><?php echo the_title(); ?></p>
					</div>
				</a>
				<?php endwhile; ?>
				<?php else : ?>
				<h2>There are no galleries at this time.</h2>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
