<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap clearfix">
					<div id="main" class="twelvecol first clearfix" role="main">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="page-header-wrapper">
								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							</div>
							<div class="gallery-slideshow">
								<ul class="slides">
									<?php foreach( get_field( 'slideshow' ) as $slide ): ?>
										<li>
											<div class="clearfix">
												<?php foreach( $slide['images'] as $image ): ?>
												<img class="<?php if ( count( $slide['images'] ) == 2 ): echo 'two-images'; endif; ?>" src="<?php echo masterstouch_get_image_src( $image['image'], 'before-after-img' ); ?>" />
												<?php endforeach; ?>
											</div>	
										<p><?php echo $slide['caption']; ?></p>
										</li>
									<?php endforeach; ?>	
								</ul>
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
