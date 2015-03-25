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
				<div class="redwood-divisor-large"></div>
				<div class="second-half">
					<div class="wrap clearfix interior-page-width">
						<div class="twelvecol first clearfix" role="main">
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<header class="article-header">
								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							</header>
							<section class="entry-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
							</section>
						</article>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			
<?php get_footer(); ?>
