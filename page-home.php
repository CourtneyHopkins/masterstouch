<?php
/*
Template Name: Homepage Template
*/
?>

<?php get_header(); ?>
		<div class="wrap shadow clearfix">
			<div id="homepage-slideshow">
				hello
			</div>
			<div id="tagline">
				<p><?php _e( get_field( 'tagline' ) ); ?></p>
			</div>
			<div id="homepage-content">
				<div class="clearfix featured-area" role="main">
					<div id="homepage-crew" class="homepage-feature fourcol first">
						<a href="/about/">
							<div class="label">
								<img src="" alt="crew-icon" /><br />
								<span>Meet the Crew</span>
							</div>
							<div class="divisor"></div>
							<div class="desc">
								<p>Click here to learn about the expert crew who will be taking care of your yard.</p>
							</div>
						</a>	
					</div>
					<div id="homepage-emergency" class="homepage-feature fourcol">
						<a href="/contact/">
							<div class="label">
								<img src="" alt="emergency-icon" /><br />
								<span>Emergency Services</span>
							</div>
							<div class="divisor"></div>
							<div class="desc">
								<p>Tree on your house? Limbs on your car? Call us first, we can handle the storm damage. Click here to contact us.</p>
							</div>
						</a>
					</div>
					<div id="homepage-services" class="homepage-feature fourcol last">
						<a href="/services/">
							<div class="label">
								<img src="" alt="services-icon" /><br />
								<span>What We Do</span>
							</div>
							<div class="divisor"></div>
							<div class="desc">
								<p>Click here to learn about the services we offer to transform your property.</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>	

<?php get_footer(); ?>
