<?php

/*---------------------------------------------------------------------------------*/
/* Favicon */
/*---------------------------------------------------------------------------------*/

function thrive_favicon() {
		// Favicon
		if(get_option('thrive_custom_favicon') != '') {
	        echo '<link rel="shortcut icon" href="'.  get_option('thrive_custom_favicon')  .'"/>'."\n";
	    }
}
add_action( 'wp_head', 'thrive_favicon', 10 );
add_action( 'admin_head', 'thrive_favicon', 10 );


/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Automatically overwrite images when uploaded to the Media Library
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/

//add_filter( 'sanitize_file_name', 'filename_filter_wpse_28439', 10, 1 );

function filename_filter_wpse_28439( $name )
{
    $args = array(
        'numberposts'   => -1,
        'post_type'     => 'attachment',
        'meta_query' => array(
                array(
                    'key' => '_wp_attached_file',
                    'value' => $name,
                    'compare' => 'LIKE'
                )
            )
    );
    $attachments_to_remove = get_posts( $args );

    foreach( $attachments_to_remove as $attach )
        wp_delete_attachment( $attach->ID, true );

    return $name;
}


/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Start Child Admin Only Functions
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/

if (is_admin()) {

/*-----------------------------------------------------------------------------------*/
// VISUALLY LOAD FONTS IN WYSIWYG EDITOR
/*-----------------------------------------------------------------------------------*/

function load_tiny_mce() {


    // Google Web Fonts
    $theme_advanced_fonts  =  'ralewaybold=ralewaybold, serif;';



    // Default fonts for TinyMCE
    $theme_advanced_fonts .= 'Andale Mono=Andale Mono, Times;';
    $theme_advanced_fonts .= 'Arial=Arial, Helvetica, sans-serif;';
    $theme_advanced_fonts .= 'Book Antiqua=Book Antiqua, Palatino;';
    $theme_advanced_fonts .= 'Courier New=Courier New, Courier;';
    $theme_advanced_fonts .= 'Helvetica=Helvetica;';
    $theme_advanced_fonts .= 'Impact=Impact, Chicago;';
    $theme_advanced_fonts .= 'Tahoma=Tahoma, Arial, Helvetica, sans-serif;';
    $theme_advanced_fonts .= 'Times New Roman=Times New Roman, Times;';
    $theme_advanced_fonts .= 'Trebuchet MS=Trebuchet MS, Geneva;';
    $theme_advanced_fonts .= 'Verdana=Verdana, Geneva;';

	$content_css = home_url('/wp-content/themes/thrive/css/style.css'). ',';
	$content_css .= home_url('/wp-content/themes/child-theme/css/child.css'). ',';
	$content_css .= home_url('/wp-content/themes/child-theme/fonts/RalewayBold.css'). ',';



	wp_tiny_mce(false, array(
		'theme_advanced_fonts' => $theme_advanced_fonts,
		'content_css' => $content_css
	));

}
add_action('admin_head', 'load_tiny_mce');


/* Modify the read more link on the_excerpt() */

function et_excerpt_length($length) {
    return 220;
}
add_filter('excerpt_length', 'et_excerpt_length');

/* Add a link  to the end of our excerpt contained in a div for styling purposes and to break to a new line on the page.*/

function et_excerpt_more($more) {
    global $post;
    return '<div class="view-full-post"><a href="'. get_permalink($post->ID) . '" class="view-full-post-btn">View Full Post</a></div>';
}
add_filter('excerpt_more', 'et_excerpt_more');


/*-----------------------------------------------------------------------------------*/
//Admin Styling
/*-----------------------------------------------------------------------------------*/


function hide_menus() {
global $post;
	echo '<style type="text/css">.widefat #override {display:none; !important;}';

if (current_user_can('editor')) {
	echo '#revisionsdiv {display:block !important;} #yoast_db_widget, #descriptiondiv, #linkcategorydiv, #linktargetdiv, #linkxfndiv, #linkadvanceddiv, .menu-icon-tools, #gallery-settings, #menu-appearance,';
	echo '#wpseo_meta, #postcustom, #postexcerpt, #acx_plugin_dashboard_widget, #pb_backupbuddy, .menu-icon-settings, #cpt_info_box, #cart66_feature_level_meta, .tagcloud, .update-nag, #toplevel_page_w3tc_dashboard, #toplevel_page_better-wp-security,';
	echo '#yoast_db_widget, .toplevel_page_rs-post-restrictions, .toplevel_page_rs-post-roles, #tribe-filters, #slidedeck-sidebar, #tribe_dashboard_widget, #event_cost, #eventBritePluginPlug, #event_organizer,';
	echo '.overview-options, #callout-sidebar, .callout-button, .slide-convert-vertical, .slide-background-url, .mce_slidedeck, .menu_acf, #menu-plugins, #edit-box-ppr, #content_wp_help, #wp-admin-bar-w3tc-modules, #wp-admin-bar-w3tc-faq, #wp-admin-bar-w3tc-support,';
	echo '#content_wp_help, .mce_wp_more, #content_wp_help, #menu-links, #toplevel_page_edit-post_type-acf, #thrive-preview, .toplevel_page_thrivethemes, #my-meta-box,#toplevel_page_wpseo_dashboard, #toplevel_page_cpt_main_menu, #toplevel_page_redirect-options';
	echo '{display:none; !important;}';
} else {
    echo '#revisionsdiv {display:block !important;} ';
	echo '#yoast_db_widget, #yoast_db_widget, #slidedeck-sidebar, #cpt_info_box, .widefat #override, #slidedeck-sidebar, #tribe_dashboard_widget,';
	echo '#content_wp_help, #menu-links, #thrive-preview ';
	echo '{display:none;}';
}
	echo '</style>';
}
add_action('admin_head', 'hide_menus');

}//End is_admin()

/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Start Child FrontEnd Only Functions
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/


 if (!is_admin()) {

	// LOAD EXTERNAL CHILD THEME SPECIFIC LINKS (Properly hosted Javascript, Google Fonts)

function load_external_links() {

	// EXAMPLES:
	// Load Oswald Regular Font
	wp_register_style('ralewaybold', home_url('wp-content/themes/child-theme/fonts/RalewayBold.css'));
	wp_enqueue_style( 'ralewaybold');


}
add_action('wp_enqueue_scripts', 'load_external_links');

}//END !is_admin()


/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Start Child Admin & FrontEnd Only Functions
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/

 // require_once ($includes_path . 'functions/posttypes/repair-parts.php'); 		// custom meta box

if(!function_exists('sp_remove_wpmandrill_dashboard'))
{
 function sp_remove_wpmandrill_dashboard() {

 if ( class_exists( 'wpMandrill' ) ) {

 remove_action( 'wp_dashboard_setup', array( 'wpMandrill' , 'addDashboardWidgets' ) );

 }

 }

 add_action( 'admin_init', 'sp_remove_wpmandrill_dashboard' );
}


// Prevent TinyMCE from stripping out schema.org metadata
function schema_TinyMCE_init($in)
{
    /**
     *   Edit extended_valid_elements as needed. For syntax, see
     *   http://www.tinymce.com/wiki.php/Configuration:valid_elements
     *
     *   NOTE: Adding an element to extended_valid_elements will cause TinyMCE to ignore
     *   default attributes for that element.
     *   Eg. a[title] would remove href unless included in new rule: a[title|href]
     */
    if(!empty($in['extended_valid_elements']))
        $in['extended_valid_elements'] .= ',';

    $in['extended_valid_elements'] .= '@[id|class|style|title|itemscope|itemtype|itemprop|datetime|rel],div,dl,ul,dt,dd,li,span,a|rev|charset|href|lang|tabindex|accesskey|type|name|href|target|title|class|onfocus|onblur]';

    return $in;
}
add_filter('tiny_mce_before_init', 'schema_TinyMCE_init' );


// Site Optimizations

// Remove Assets from HOME page only
function remove_home_assets() {
  if (is_front_page()) {

	  wp_dequeue_style('wp-biographia-bio');
	  wp_dequeue_style('woocommerce-general');
	  wp_dequeue_style('woocommerce-layout');
	  wp_dequeue_style('woocommerce-smallscreen');
	  wp_dequeue_style('wpmu-wpmu-ui-3-min-css');
	  wp_dequeue_style('wpmu-animate-3-min-css');
	  wp_dequeue_style('lazyload-style');
	  wp_dequeue_style('insite-grid-style');

	  wp_dequeue_script( 'wc-cart-fragments' );
	  wp_dequeue_script( 'woocommerce' );
	  wp_dequeue_script( 'wc-add-to-cart' );
	  wp_dequeue_script( 'jquery-blockui' );
	  wp_dequeue_script( 'jquery-cookie' );

  }
};
add_action( 'wp_enqueue_scripts', 'remove_home_assets', 999 );

// Remove Assets Globally
function wpfiles_dequeue() {
	if (current_user_can( 'update_core' )) {
		return;
	}
	wp_deregister_script('wp-embed');

}
add_action( 'wp_enqueue_scripts', 'wpfiles_dequeue', 99 );

// remove jetpack.css from frontend
add_filter( 'jetpack_implode_frontend_css', '__return_false' );


//add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {

    // Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __('Available!', 'woocommerce');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = __('Sold Out', 'woocommerce');
    }
    return $availability;
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//Disabling AJAX for Cart Page..
function cart_script_disabled(){
	wp_dequeue_script( 'wc-cart' );
}
add_action( 'wp_enqueue_scripts', 'cart_script_disabled' );

function thrive_reverse_comments($comments) {
	return array_reverse($comments);
}
add_filter ('comments_array', 'thrive_reverse_comments');

add_action( 'woocommerce_before_add_to_cart_form', 'location_inventory', 60 );
  
function location_inventory() {
	echo '<div><ul>';
  if(get_field('westmoreland')!== false)
{
	echo '<strong>Inventory at our locations</strong><br><li>South Dallas: ' . get_field('westmoreland') . ' in inventory</li>';
}

  if(get_field('garland')!== false)
{
	echo '<li>East Dallas: ' . get_field('garland') . ' in inventory</li>';
}

  if(get_field('tyler')!== false)
{
	echo '<li>Tyler: ' . get_field('tyler') . ' in inventory</li>';
}

  if(get_field('arlington')!== false)
{
	echo '<li>Arlington: ' . get_field('arlington') . ' in inventory</li>';
}
	echo '</ul></div>';
   
  // Note: 'trade' is the slug of the ACF
}
