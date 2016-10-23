<?php
/*
 *  Author: Ivan
 */

global $theme_name;
$theme_name = 'ivanalbizu';


foreach ( glob( get_template_directory() . '/lib/*/functions.php') as $lib_functions ) {
	include_once( $lib_functions );
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


if ( function_exists( 'add_theme_support' ) ) {

	global $theme_name;

	add_theme_support( 'post-thumbnails' );

	add_image_size('extrasmall', 70, 57, true);
	add_image_size('stickyhome_large', 330, 145, true); //large screen
	add_image_size('stickyhome_med', 365, 250, true); //medium screen
	add_image_size('stickyhome_small', 545, 145, true); //small screen

	add_image_size('card_410', 410, 365, true);
	add_image_size('card_530', 530, 300, true);


}

/* Functions */

// Load header scripts (header.php)
function load_header_scripts() {
	if ( $GLOBALS['pagenow'] != 'wp-login.php' && !is_admin() ) {

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.0.0.min.js', false, null );
		wp_enqueue_script( 'jquery' );


		wp_register_script('angular', get_template_directory_uri() . '/node_modules/angular/angular.min.js', array( 'jquery' ), null, false);
		wp_enqueue_script('angular');

		wp_register_script('angular-route', get_template_directory_uri() . '/node_modules/angular-route/angular-route.js', array( 'angular' ), null, false);
		wp_enqueue_script('angular-route');

		wp_register_script('angular-sanitize', get_template_directory_uri() . '/node_modules/angular-sanitize/angular-sanitize.min.js', array( 'angular' ), null, false);
		wp_enqueue_script('angular-sanitize');

		wp_register_script('angular-locale', get_template_directory_uri() . '/lib/i18n/angular-locale_es-es.min.js', array( 'angular' ), null, false);
		wp_enqueue_script('angular-locale');

		wp_register_script('ng-infinite-scroll', get_template_directory_uri() . '/node_modules/ng-infinite-scroll/build/ng-infinite-scroll.min.js', array( 'angular' ), null, false);
		wp_enqueue_script('ng-infinite-scroll');

		wp_register_script('magnific-popup', get_template_directory_uri() . '/lib/magnific-popup/js/jquery.magnific-popup.min.js', array( 'jquery' ), null, false);
		wp_enqueue_script('magnific-popup');

		wp_register_script('materialize', get_template_directory_uri() . '/lib/materialize/js/materialize.min.js', array( 'angular' ), null, false);
		wp_enqueue_script('materialize');

		wp_register_script('angular-materialize', get_template_directory_uri() . '/lib/materialize/js/angular-materialize.min.js', array( 'angular' ), null, false);
		wp_enqueue_script('angular-materialize');

		wp_register_script('angular-animate', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js', array( 'angular' ), null, false);
		wp_enqueue_script('angular-animate');

		wp_enqueue_script('app', get_template_directory_uri() . '/js/custom/app.js', array( 'angular' ), null, true );
		wp_enqueue_script('sale-filters', get_template_directory_uri() . '/js/custom/filters/sale.filter.js', array( 'angular' ), null, true );
		wp_enqueue_script('rent-filters', get_template_directory_uri() . '/js/custom/filters/rent.filter.js', array( 'angular' ), null, true );
		wp_enqueue_script('gallery', get_template_directory_uri() . '/js/custom/directives/gallery.directive.js', array( 'angular' ), null, true );
		wp_enqueue_script('sale-factory', get_template_directory_uri() . '/js/custom/factories/sale.factory.js', array( 'angular' ), null, true );
		wp_enqueue_script('rent-factory', get_template_directory_uri() . '/js/custom/factories/rent.factory.js', array( 'angular' ), null, true );
		wp_enqueue_script('like-factory', get_template_directory_uri() . '/js/custom/factories/like.factory.js', array( 'angular' ), null, true );
		wp_enqueue_script('home-ctrl', get_template_directory_uri() . '/js/custom/controllers/home.controller.js', array( 'angular' ), null, true );
		wp_enqueue_script('footer-ctrl', get_template_directory_uri() . '/js/custom/controllers/footer.controller.js', array( 'angular' ), null, true );
		wp_enqueue_script('list-sale-ctrl', get_template_directory_uri() . '/js/custom/controllers/list-sale.controller.js', array( 'angular' ), null, true );
		wp_enqueue_script('list-rent-ctrl', get_template_directory_uri() . '/js/custom/controllers/list-rent.controller.js', array( 'angular' ), null, true );
		wp_enqueue_script('like-ctrl', get_template_directory_uri() . '/js/custom/controllers/like.controller.js', array( 'angular' ), null, true );
		wp_enqueue_script('single-sale-ctrl', get_template_directory_uri() . '/js/custom/controllers/single-sale.controller.js', array( 'angular' ), null, true );
		wp_enqueue_script('single-rent-ctrl', get_template_directory_uri() . '/js/custom/controllers/single-rent.controller.js', array( 'angular' ), null, true );

		wp_localize_script('app', 'localized',
		array(
			'views' => trailingslashit( get_template_directory_uri() ) . 'views/',
			'state_plugin_rest_api' => is_plugin_active( 'rest-api/plugin.php' ),
			'state_plugin_acf' => is_plugin_active( 'advanced-custom-fields/acf.php' )
			)
		);
	}
}


// Load styles
function load_styles() {

	global $theme_name;

	wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css', array(), null, 'all');
	wp_enqueue_style('font-awesome');

	wp_register_style('magnific-popup', get_template_directory_uri() . '/lib/magnific-popup/css/magnific-popup.min.css', array(), null, 'all');
	wp_enqueue_style('magnific-popup');

	wp_register_style('materialize', get_template_directory_uri() . '/css/materialize.css', array(), null, 'all');
	wp_enqueue_style('materialize');

}

function load_admin_styles() {

	wp_register_style( 'admin_custom', get_template_directory_uri() . '/css/admin.css', false, null );
	wp_enqueue_style( 'admin_custom' );

}

// Remove Admin bar
function remove_admin_bar() {
	return false;
}



/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'load_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'load_styles'); // Add Theme Stylesheet
add_action('admin_enqueue_scripts', 'load_admin_styles' ); // Add Admin Stylesheet
add_action('init', 'create_custom_post_types'); // Add custom Post Type
add_action( 'init', 'remove_support_page' );


// Dequeue emoji CSS
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Add Filters
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter( 'the_excerpt', 'wpautop' ); // Remove <p> tags from Excerpt altogether


function remove_support_page() {
	remove_post_type_support( 'page', 'thumbnail' );
	remove_post_type_support( 'page', 'editor' );
	remove_post_type_support( 'page', 'page-attributes' );
}


/* Custom Post Types */
function create_custom_post_types() {

	$taxonomy_args = array(
		'hierarchical'	=> true
	);

	create_post_type( 'sale', '', 'sale', 'Venta', 'Ventas' );
	create_post_type( 'rent', '', 'rent', 'Alquiler', 'Alquileres' );

}

function create_post_type( $post_type_name, $taxonomies = '', $slug = '', $singular_name = '', $plural_name = '', $supports = '' ) {

	global $theme_name;

	if ( $singular_name == '' ) {
		$singular_name = $post_type_name;
	}

	if ( $plural_name == '' ) {
		$plural_name = $post_type_name . 's';
	}

	if ( $slug == '' ) {
		$slug = $singular_name;
	}

	if ( $supports == '' ) {
		$supports = array( 'title', 'editor', 'excerpt', 'thumbnail' );
	}


	$post_type_labels = array(
		'name'					=> __( ucfirst( $plural_name ), $theme_name ),
		'singular_name'			=> __( ucfirst( $singular_name ), $theme_name ),
		'add_new'				=> __( 'Add New', $theme_name ),
		'add_new_item'			=> __( 'Add New ' . $singular_name, $theme_name ),
		'edit'					=> __( 'Edit', $theme_name ),
		'edit_item'				=> __( 'Edit ' . $singular_name, $theme_name ),
		'new_item'				=> __( 'New ' . $singular_name, $theme_name ),
		'view'					=> __( 'View ' . $singular_name, $theme_name ),
		'view_item'				=> __( 'View ' . $singular_name, $theme_name ),
		'search_items'			=> __( 'Search ' . $singular_name, $theme_name ),
		'not_found'				=> __( 'No ' . $plural_name . ' found', $theme_name ),
		'not_found_in_trash'	=> __( 'No ' . $plural_name . ' found in Trash', $theme_name )
	);

	$post_type_options = array(
		'labels'			=> $post_type_labels,
		'public'			=> true,
		'hierarchical'		=> true,
		'has_archive'		=> true,
		'can_export'		=> true,
		'supports'			=> $supports,
		'rewrite'			=> array( 'slug' => $slug ),
		'menu_icon'   		=> 'dashicons-admin-page',
		'show_in_rest'		=> true,
	);

	if ( $taxonomies != '' && !empty( $taxonomies ) ) {
		$post_type_options['taxonomies'] = $taxonomies;
	}

	register_post_type( $post_type_name, $post_type_options );
}





/* WP EXTRA FUNCTIONS */

// Change default sender name for emails
function new_mail_from_name( $old ) {
	return get_bloginfo();
}
add_filter( 'wp_mail_from_name', 'new_mail_from_name' );


/**
 * Hide editor on specific pages.
 */
function hide_editor() {

	global $pagenow;
	if( !( 'post.php' == $pagenow ) ) return;

	global $post;
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

	$hide_selected = array( 'Home', 'page-team.php' );

	foreach ( $hide_selected as $value ) {
		$homepgname = get_the_title($post_id);
		$template_file = get_post_meta($post_id, '_wp_page_template', true);
		if( $homepgname == $value || $template_file == $value ){
			remove_post_type_support('page', 'editor');
		}
	}

}
add_action( 'admin_head', 'hide_editor' );




/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option( $name, $default = false ) {

		$optionsframework_settings = get_option( 'optionsframework' );

		$option_name = $optionsframework_settings['id'];

		if ( get_option( $option_name ) ) {
			$options = get_option( $option_name );
		}

		if ( isset( $options[$name] ) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}

// Deregister Contact Form 7 CSS files on all pages without a form
add_action( 'wp_print_styles', 'deregister_cf7_style', 100 );
function deregister_cf7_style() {
	if ( !is_page( 'contact ') ) {
		wp_deregister_style( 'contact-form-7' );
	}
}

// Deregister Contact Form 7 JavaScript files on all pages without a form
add_action( 'wp_print_scripts', 'deregister_cf7_script', 100 );
function deregister_cf7_script() {
	if ( ! is_page( 'contact' ) ) {
		wp_deregister_script( 'contact-form-7' );
	}
}



/* OPTIONS FUNCTIONS */
function get_logo_url() {

	$logo_url = get_template_directory_uri() . '/img/logo.png';

	if ( of_get_option( 'logo' ) ) {
		$logo_url = of_get_option( 'logo' );
	}

	return $logo_url;

}

function the_logo_url() {
	echo get_logo_url();
}

function get_favicon_url() {

	$favicon_url = get_template_directory_uri() . '/img/icon/favicon.png';

	if ( of_get_option( 'favicon' ) ) {
		$favicon_url = of_get_option( 'favicon' );
	}

	return $favicon_url;

}

function the_favicon_url() {
	echo get_favicon_url();
}

function get_apple_touch_url() {

	$apple_touch_url = get_template_directory_uri() . '/img/icon/touch.png';

	if ( of_get_option( 'apple-touch' ) ) {
		$apple_touch_url = of_get_option( 'apple-touch' );
	}

	return $apple_touch_url;

}

function the_apple_touch_url() {
	echo get_apple_touch_url();
}

function the_analytics_script() {
	if ( $analytics_code = of_get_option( 'analytics-code' ) ) { ?>

		<script>

			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', '<?php echo $analytics_code; ?>', 'auto');
			ga('send', 'pageview');

		</script>

	<?php }
}


function get_social_menu( $id = "social-icons" ) {

	$result = '';

	$latest_page = get_posts("post_type=page&numberposts=1");

	if ($latest_page) {
		$latest_page_id = $latest_page[0]->ID;

		$facebook		= get_field( "facebook_link",  $latest_page_id );
		$twitter		= get_field( "twitter_link",  $latest_page_id );
		$linkedin		= get_field( "linkedin_link",  $latest_page_id );
		$instagram 		= get_field( "instagram_link",  $latest_page_id );
	} else {
		return $result;
	}

	if ( $facebook || $twitter || $linkedin || $instagram ) {

		?>

		<ul id="<?php echo $id; ?>">
			<?php if ( $facebook ) { ?>
			<li>
				<a href="<?php echo $facebook; ?>" target="_blank">
					<svg height="67px" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="67px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M29.765,50.32h6.744V33.998h4.499l0.596-5.624h-5.095  l0.007-2.816c0-1.466,0.14-2.253,2.244-2.253h2.812V17.68h-4.5c-5.405,0-7.307,2.729-7.307,7.317v3.377h-3.369v5.625h3.369V50.32z   M34,64C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;"/></svg>
				</a>
			</li>
			<?php } ?>
			<?php if ( $twitter ) { ?>
			<li>
				<a href="<?php echo $twitter; ?>" target="_blank">
					<svg height="67px" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="67px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M38.167,22.283c-2.619,0.953-4.274,3.411-4.086,6.101  l0.063,1.038l-1.048-0.127c-3.813-0.487-7.145-2.139-9.974-4.915l-1.383-1.377l-0.356,1.017c-0.754,2.267-0.272,4.661,1.299,6.271  c0.838,0.89,0.649,1.017-0.796,0.487c-0.503-0.169-0.943-0.296-0.985-0.233c-0.146,0.149,0.356,2.076,0.754,2.839  c0.545,1.06,1.655,2.097,2.871,2.712l1.027,0.487l-1.215,0.021c-1.173,0-1.215,0.021-1.089,0.467  c0.419,1.377,2.074,2.839,3.918,3.475l1.299,0.444l-1.131,0.678c-1.676,0.976-3.646,1.526-5.616,1.567  C20.775,43.256,20,43.341,20,43.405c0,0.211,2.557,1.397,4.044,1.864c4.463,1.377,9.765,0.783,13.746-1.568  c2.829-1.674,5.657-5,6.978-8.221c0.713-1.715,1.425-4.851,1.425-6.354c0-0.975,0.063-1.102,1.236-2.267  c0.692-0.678,1.341-1.419,1.467-1.631c0.21-0.403,0.188-0.403-0.88-0.043c-1.781,0.636-2.033,0.551-1.152-0.402  c0.649-0.678,1.425-1.907,1.425-2.267c0-0.063-0.314,0.042-0.671,0.233c-0.377,0.212-1.215,0.53-1.844,0.72l-1.131,0.361l-1.027-0.7  c-0.566-0.381-1.361-0.805-1.781-0.932C40.766,21.902,39.131,21.944,38.167,22.283z M34,64C17.432,64,4,50.568,4,34  C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;"/></svg>
				</a>
			</li>
			<?php } ?>
			<?php if ( $linkedin ) { ?>
			<li>
				<a href="<?php echo $linkedin; ?>" target="_blank">
					<svg height="67px" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="67px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M50.837,48.137V36.425c0-6.275-3.35-9.195-7.816-9.195  c-3.604,0-5.219,1.983-6.119,3.374V27.71h-6.79c0.09,1.917,0,20.427,0,20.427h6.79V36.729c0-0.609,0.044-1.219,0.224-1.655  c0.49-1.22,1.607-2.483,3.482-2.483c2.458,0,3.44,1.873,3.44,4.618v10.929H50.837z M22.959,24.922c2.367,0,3.842-1.57,3.842-3.531  c-0.044-2.003-1.475-3.528-3.797-3.528s-3.841,1.524-3.841,3.528c0,1.961,1.474,3.531,3.753,3.531H22.959z M34,64  C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z M26.354,48.137V27.71h-6.789v20.427  H26.354z" style="fill-rule:evenodd;clip-rule:evenodd;"/></svg>
				</a>
			</li>
			<?php } ?>
			<?php if ( $instagram ) { ?>
			<li>
				<a href="<?php echo $instagram; ?>" target="_blank">
					<svg height="67px" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="67px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M43.271,26.578v-0.006c0.502,0,1.005,0.01,1.508-0.002  c0.646-0.016,1.172-0.57,1.172-1.217c0-0.963,0-1.927,0-2.89c0-0.691-0.547-1.24-1.236-1.241c-0.961,0-1.922-0.001-2.883,0  c-0.688,0.001-1.236,0.552-1.236,1.243c-0.001,0.955-0.004,1.91,0.003,2.865c0.001,0.143,0.028,0.291,0.073,0.426  c0.173,0.508,0.639,0.82,1.209,0.823C42.344,26.579,42.808,26.578,43.271,26.578z M34,27.817c-3.384-0.002-6.135,2.721-6.182,6.089  c-0.049,3.46,2.72,6.201,6.04,6.272c3.454,0.074,6.248-2.686,6.321-6.043C40.254,30.675,37.462,27.815,34,27.817z M22.046,31.116  v0.082c0,4.515-0.001,9.03,0,13.545c0,0.649,0.562,1.208,1.212,1.208c7.16,0.001,14.319,0.001,21.479,0  c0.656,0,1.215-0.557,1.215-1.212c0.001-4.509,0-9.02,0-13.528v-0.094h-2.912c0.411,1.314,0.537,2.651,0.376,4.014  c-0.161,1.363-0.601,2.631-1.316,3.803s-1.644,2.145-2.779,2.918c-2.944,2.006-6.821,2.182-9.946,0.428  c-1.579-0.885-2.819-2.12-3.685-3.713c-1.289-2.373-1.495-4.865-0.739-7.451C23.983,31.116,23.021,31.116,22.046,31.116z   M46.205,49.255c0.159-0.026,0.318-0.049,0.475-0.083c1.246-0.265,2.264-1.304,2.508-2.557c0.025-0.137,0.045-0.273,0.067-0.409  V21.794c-0.021-0.133-0.04-0.268-0.065-0.401c-0.268-1.367-1.396-2.428-2.78-2.618c-0.058-0.007-0.113-0.02-0.17-0.03H21.761  c-0.147,0.027-0.296,0.047-0.441,0.08c-1.352,0.308-2.352,1.396-2.545,2.766c-0.008,0.057-0.02,0.114-0.029,0.171V46.24  c0.028,0.154,0.05,0.311,0.085,0.465c0.299,1.322,1.427,2.347,2.77,2.52c0.064,0.008,0.13,0.021,0.195,0.03H46.205z M34,64  C17.432,64,4,50.568,4,34C4,17.431,17.432,4,34,4s30,13.431,30,30C64,50.568,50.568,64,34,64z" style="fill-rule:evenodd;clip-rule:evenodd;"/></svg>
				</a>
			</li>
			<?php } ?>

		</ul>

		<?php
	}

	//return $result;
}

function the_social_menu( ) {
	echo get_social_menu();
}





if ( is_plugin_active( 'rest-api/plugin.php' ) ) {

	add_action( 'rest_api_init', 'slug_register_spaceship' );

	function slug_register_spaceship() {

		// Return all fields create with ACF created for
		// for specified Type Post
		register_api_field( 'sale',
			'fields',
			array(
				'get_callback'    => 'get_all_fields_acf',
				'update_callback' => null,
				'schema'          => null,
			)
		);
		register_rest_field( 'sale',
			'url_thumbnail',
			array(
				'get_callback'    => 'ng_get_thumbnail_url',
				'update_callback' => null,
				'schema'          => null,
			)
		);
		register_rest_field( 'sale',
			'url_gallery',
			array(
					'get_callback'    => 'ng_get_post_galleries_images',
					'update_callback' => null,
					'schema'          => null,
			)
		);

		// Return all fields create with ACF created for
		// for specified Type Post
		register_api_field( 'rent',
			'fields',
			array(
				'get_callback'    => 'get_all_fields_acf',
				'update_callback' => null,
				'schema'          => null,
			)
		);
		register_rest_field( 'rent',
			'url_thumbnail',
			array(
				'get_callback'    => 'ng_get_thumbnail_url',
				'update_callback' => null,
				'schema'          => null,
			)
		);
		register_rest_field( 'rent',
			'url_gallery',
			array(
					'get_callback'    => 'ng_get_post_galleries_images',
					'update_callback' => null,
					'schema'          => null,
			)
		);

	}


	function get_all_fields_acf($data, $field, $request, $type) {
		if ( function_exists( 'get_fields' ) ) {
			return get_fields($data['id']);
		}
		return [];
	}

	function ng_get_thumbnail_url( $post ) {
		// Default images size to Return
		$sizes = ['extrasmall', 'stickyhome_large', 'stickyhome_med', 'stickyhome_small', 'card_410', 'card_530'];

		$imgArray = [];

		if ( has_post_thumbnail( $post['id'] ) ){
			foreach ($sizes as $size) {
				$imgArray[$size] = wp_get_attachment_image_src( get_post_thumbnail_id( $post['id'] ), $size )[0];
			}
			return $imgArray;
		} else {
			return false;
		}
	}

	function ng_get_post_galleries_images() {
		global $post;
		$result = array();
		if ( $galleries = get_post_galleries_images( $post ) ) {
			foreach ( $galleries as $gallery ) {
				foreach ( $gallery as $src ) {
					$result[] = $src;
				}
			}
		}
		return $result;
	}


	add_filter( 'rest_query_vars', 'valid_vars_metaquery');
	function valid_vars_metaquery( $valid_vars ) {
	    return array_merge( $valid_vars, array(
												'venta_numero_habitaciones',
												'venta_numero_banos',
												'venta_destacada',
												'alquiler_numero_habitaciones',
												'alquiler_numero_banos',
												'meta_query'
											)
										);
	}

	add_filter( 'rest_sale_query', 'filter_sale_num_hab_ban', 10, 2 );
	function filter_sale_num_hab_ban( $args, $request ) {
	    $venta_numero_habitaciones = $request->get_param( 'venta_numero_habitaciones' );
	    $venta_numero_banos = $request->get_param( 'venta_numero_banos' );
	    $venta_destacada = $request->get_param( 'venta_destacada' );

		// if on url has parameter: venta_numero_habitaciones and venta_numero_banos
	    if ( ! empty( $venta_numero_habitaciones ) && ! empty( $venta_numero_banos ) ) {
	        $args['meta_query'] = array(
	            array(
	                'key'     => 'venta_numero_habitaciones',
	                'value'   => $venta_numero_habitaciones,
	                'compare' => '=',
	            ),
				array(
					'key'     => 'venta_numero_banos',
					'value'   => $venta_numero_banos,
					'compare' => '=',
				)
	        );
	    }

		// if on url has parameter: venta_destacada
	    if ( ! empty( $venta_destacada ) ) {
	        $args['meta_query'] = array(
				array(
					'key'     => 'venta_destacada',
					'value'   => $venta_destacada,
					'compare' => '=',
				),
				'filter[posts_per_page]' => wp_count_posts( 'sale' ),
	        );
	    }

	    return $args;
	}

	add_filter( 'rest_rent_query', 'filter_rent_num_hab_ban', 10, 2 );
	function filter_rent_num_hab_ban( $args, $request ) {
		$alquiler_numero_habitaciones = $request->get_param( 'alquiler_numero_habitaciones' );
		$alquiler_numero_banos = $request->get_param( 'alquiler_numero_banos' );

		// if on url has parameter: alquiler_numero_habitaciones and alquiler_numero_banos
		if ( ! empty( $alquiler_numero_habitaciones ) && ! empty( $alquiler_numero_banos ) ) {
			$args['meta_query'] = array(
				array(
					'key'     => 'alquiler_numero_habitaciones',
					'value'   => $alquiler_numero_habitaciones,
					'compare' => '=',
				),
				array(
					'key'     => 'alquiler_numero_banos',
					'value'   => $alquiler_numero_banos,
					'compare' => '=',
				)
			);
		}

	    return $args;
	}

}
