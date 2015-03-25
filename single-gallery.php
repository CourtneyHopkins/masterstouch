<?php get_header(); ?>

			<div id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="wrap clearfix interior-page-width">
					<div class="twelvecol first clearfix" role="main">
						<div class="page-header-wrapper">
							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
				<div class="divisor"></div>
				<div class="second-half">
					<div class="wrap clearfix interior-page-width">
						<div class="twelvecol first clearfix" role="main">
							<p class="swipe-notice">&#8592; Swipe left and right &#8594;</p>
							<div class="gallery-slideshow">
								<ul class="slides">
									<?php foreach( get_field( 'slideshow' ) as $slide ): ?>
										<li>
											<div class="clearfix">
												<?php foreach( $slide['images'] as $image ): ?>
													<?php if ( count( $slide['images'] ) == 2 ): ?>
														<img class="two-images" src="<?php echo masterstouch_get_image_src( $image['image'], 'before-after-img' ); ?>" />
													<?php else: ?>
														<img class="one-image" src="<?php echo masterstouch_get_image_src( $image['image'], 'gallery-img' ); ?>" />
													<?php endif; ?>
												<?php endforeach; ?>
											</div>	
										<p><?php echo $slide['caption']; ?></p>
										</li>
									<?php endforeach; ?>	
								</ul>
							</div>
						</div>
					</div>
				</div>	
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			
<?php get_footer(); ?>
