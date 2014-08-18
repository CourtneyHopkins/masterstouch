		
		<footer class="footer" role="contentinfo">
			<div id="inner-footer" class="wrap clearfix">
				<div class="absolute">
					<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php _e( get_stylesheet_directory_uri() ); ?>/library/images/mt_logo.png" id="logo" alt="Master's Touch Tree Service Logo" /></a>
				</div>
				<nav role="navigation">
					<?php bones_footer_links(); ?>
				</nav>
				<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</div>
	</body>
</html>