<?php

add_action( 'after_setup_theme', 'bones_ahoy', 16 );

function bones_ahoy() {
	add_action( 'init', 'bones_head_cleanup' );
	add_filter( 'the_generator', 'bones_rss_version' );
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
	add_filter( 'gallery_style', 'bones_gallery_style' );
	add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
	bones_theme_support();
	add_action( 'widgets_init', 'bones_register_sidebars' );
	add_filter( 'get_search_form', 'bones_wpsearch' );
	add_filter( 'the_content', 'bones_filter_ptags_on_images' );
	add_filter( 'excerpt_more', 'bones_excerpt_more' );
} 

function bones_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );

} /* end bones head cleanup */

// remove WP version from RSS
function bones_rss_version() { return ''; }

// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

/*********************
SCRIPTS & ENQUEUEING
*********************/

function bones_scripts_and_styles() {
	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
	if (!is_admin()) {
		// register/enqueue styles
        wp_enqueue_style( 'stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );
        wp_register_style( 'bones-ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), '' );
        wp_enqueue_style( 'flexslider', get_stylesheet_directory_uri() . '/library/css/flexslider.css', array(), '', 'all' );
        wp_enqueue_style( 'stylesheet' );
        wp_enqueue_style( 'bones-ie-only' );
        $wp_styles->add_data( 'bones-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet
        
        // register/enqueue scripts
        wp_register_script( 'bones-modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array(), false, false );
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), false, true );
        wp_register_script( 'flexslider', '//cdnjs.cloudflare.com/ajax/libs/flexslider/2.2.0/jquery.flexslider-min.js', array('jquery'), false, true );
        wp_register_script( 'theme-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );
        wp_register_script( 'gridalicious', get_stylesheet_directory_uri() . '/library/js/jquery.grid-a-licious.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'bones-modernizr' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'theme-js' );
        wp_enqueue_script( 'flexslider' );
        wp_enqueue_script( 'gridalicious' );
	}
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
		array(
		'default-image' => '',  // background image default
		'default-color' => '', // background color default (dont add the #)
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' => '',
		'admin-preview-callback' => ''
		)
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'left-nav-group' => __( 'Left Nav Group', 'bonestheme' ),
			'right-nav-group' => __( 'Right Nav Group', 'bonestheme' ),
			'mobile-nav-group' => __( 'Mobile Nav Group', 'bonestheme' )
		)
	);
} /* end bones theme support */


/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function bones_left_nav_group() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'container_class' => 'clearfix',           				// class of container (should you choose to use it)
		'menu' => __( 'Left Nav Group', 'bonestheme' ), // nav name
		'menu_class' => '',         					// adding custom nav class
		'theme_location' => 'left-nav-group',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => ''      // fallback function
	));
} /* end bones main nav */

// the footer menu (should you choose to use one)
function bones_right_nav_group() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => '',                              // remove nav container
		'container_class' => 'clearfix',   						// class of container (should you choose to use it)
		'menu' => __( 'Right Nav Group', 'bonestheme' ),   // nav name
		'menu_class' => '',     						// adding custom nav class
		'theme_location' => 'right-nav-group',          // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => ''  // fallback function
	));
} /* end bones footer link */

// the footer menu (should you choose to use one)
function bones_mobile_nav_group() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => '',                              // remove nav container
		'container_class' => 'clearfix',   						// class of container (should you choose to use it)
		'menu' => __( 'Mobile Nav Group', 'bonestheme' ),   // nav name
		'menu_class' => '',     						// adding custom nav class
		'theme_location' => 'mobile-nav-group',          // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => ''  // fallback function
	));
} /* end bones footer link */

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) { 
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'bonestheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
} /* end bones related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function bones_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	
	echo '<nav class="pagination">';
	
		echo paginate_links( array(
			'base' 			=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&larr;',
			'next_text' 	=> '&rarr;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) );
	
	echo '</nav>';
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bones_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read', 'bonestheme' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'bonestheme' ) .'</a>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function bones_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}

function masterstouch_get_image_src( $id, $size ) {
        $src = '';
        if ( $id > 0 ) list( $src, $width, $height ) = wp_get_attachment_image_src( $id,  $size );
        if ( ! strlen( $src ) ) {
                list( $src, $width, $height ) = wp_get_attachment_image_src( 98,  $size );
        }
    return $src;
}

function masterstouch_get_homepage_slideshow() { ?>
	<div class="homepage-slider">
		<ul class="slides">
			<?php foreach( get_field('homepage_slideshow') as $slide ): ?>
				<li>
					<img src="<?php echo masterstouch_get_image_src( $slide['image'], 'homepage-slide-img'); ?>" alt="" />
				</li>
			<?php endforeach; ?>	
		</ul>
	</div>
<?php }

function masterstouch_get_the_employees() {
	$reece_args = array(
		'post_type' => 'employee',
		'post_status' => 'publish',
		'order' => 'ASC',
		'order_by' => 'menu_order',
		'posts_per_page' => -1
	);
	$employees = get_posts( $reece_args ); ?>
	<h1>Meet the Crew</h1>
	<div class="divisor"></div>
	<?php foreach ( $employees as $employee ) { ?>
		<div class="employee clearfix">
			<div class="employee-image">
				<img src="<?php _e( masterstouch_get_image_src( $employee->employee_image, 'employee-img' ) ); ?>" alt="" />
			</div>
			<div class="employee-desc">
				<div class="emp-title">
					<span><?php  _e( get_the_title( $employee->ID ) ); ?></span><br />
					<span class="job-title"><?php _e( $employee->job_title ); ?></span>
					</div>
				<!-- <div class="divisor"></div> -->
				<p><?php _e( $employee->biography ); ?></p>
			</div>	
		</div>
	<?php }
}

function masterstouch_get_the_services() {
	$services = get_field( 'services' );
	foreach ( $services as $service ) {
?>
	<div class="row clearfix">
		<div class="service-title">
			<?php _e( $service['service']); ?>
		</div>
		<div class="service-description">
			<p><?php _e( $service['description']); ?></p>
		</div>
	</div>
<?php }
}

function masterstouch_get_the_first_testimonial() {
	$i = 0;
	foreach ( get_field( 'testimonials' ) as $t ) { 
		if ($i == 0) {
?>
		<div class="testimonial-wrapper">
			<div class="testimonial">
				<p>"<?php echo $t['testimonial']; ?>"</p>
			</div>
			<div class="client clearfix">
				<span>- <?php echo $t['client']; ?></span>
			</div>
		</div>	
	<?php $i++; }
	}	
}

function masterstouch_get_all_testimonials() {
	foreach ( get_field( 'testimonials' ) as $t ) { 
?>
		<div class="item">
			<div class="testimonial">
				<p>"<?php echo $t['testimonial']; ?>"</p>
			</div>
			<div class="client clearfix">
				<span>- <?php echo $t['client']; ?></span>
			</div>
		</div>	
	<?php }
}

function masterstouch_get_cards() { ?>
<div id="homepage-crew" class="homepage-featured fourcol first">
	<?php foreach( get_field( 'left' ) as $left ): ?>
	<a href="masterstouch/<?php echo $left['link_to_page']; ?>/">
		<div class="label">
			<img src="<?php _e( get_stylesheet_directory_uri() ); ?>/library/images/axe.png" alt="crew-icon" /><br />
			<span><?php echo $left['title']; ?></span>
		</div>
		<div class="redwood-divisor-small"></div>
		<div class="desc">
			<p><?php echo $left['caption']; ?></p>
		</div>
	</a>
	<?php endforeach; ?>	
</div>
<div id="homepage-emergency" class="homepage-featured fourcol">
	<?php foreach( get_field( 'middle' ) as $middle ): ?>
	<a href="masterstouch/<?php echo $middle['link_to_page']; ?>/">
		<div class="label">
			<img src="<?php _e( get_stylesheet_directory_uri() ); ?>/library/images/911.png" alt="emergency-icon" /><br />
			<span><?php echo $middle['title']; ?></span>
		</div>
		<div class="redwood-divisor-small"></div>
		<div class="desc">
			<p><?php echo $middle['caption']; ?></p>
		</div>
	</a>
	<?php endforeach; ?>	
</div>
<div id="homepage-services" class="homepage-featured fourcol last">
	<?php foreach( get_field( 'right' ) as $right ): ?>
	<a href="masterstouch/<?php echo $right['link_to_page']; ?>/">
		<div class="label">
			<img src="<?php _e( get_stylesheet_directory_uri() ); ?>/library/images/boot.png" alt="services-icon" /><br />
			<span><?php echo $right['title']; ?></span>
		</div>
		<div class="redwood-divisor-small"></div>
		<div class="desc">
			<p><?php echo $right['caption']; ?></p>
		</div>
	</a>
	<?php endforeach; ?>
</div>
<?php }

?>
