<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="modern" lang="en"> <!--<![endif]-->
<head><script type='text/javascript'></script>


<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php wp_title(''); ?></title>
    <?php
	$home_url = get_bloginfo('url'); 
	$template_url = get_bloginfo('template_url');
	$child_url = get_stylesheet_directory_uri();
	?>
    
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!-- WP head -->
<?php wp_head(); ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W4N7MR6');</script>
<!-- End Google Tag Manager -->

<script type='text/javascript'>
jQuery('#gform_submid_button_2').on('click', function() {
  ga('send', 'event', '#gform_submit_button_2', 'click', 'newsletter-signup', 1);
});
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '649797418553348'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=649797418553348&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<script type='text/javascript'></script></head>

<body <?php body_class(); ?> id="body1">

<!--[if lt IE 8]><p class=chromeframe>Woah! Your browser is <em>old school</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<!-- Top Bar-->
<?php if ( is_active_sidebar( 'top-bar' ) ) : ?>
<div id="top-bar">
    <div class="row">
		<?php dynamic_sidebar( 'top-bar' ); ?>
    </div>
</div>
<div class="clear"></div>
<?php endif; ?>

<div id="header" class="container">


               <div id="phone-numbers"><?php the_field('header_contact_info',2);?><a class="close-box" href="#">close</a></div>
               <div id="locations"><?php the_field('header_addresses',2);?> <a class="close-box" href="#">close</a></div>

	<div class="row" style="over">
		<div class="twelvecol">
          
            <div id="header-right">
			
            	<a href="/cart/" class="thrive-sc-button  custom viewcrt_mobile" style="left: 231px;padding: 10px 14px!important;margin: 0;"><span class="thrive-">View Cart</span>
                        </a>
       			<div id="text-8">
            	<div class="textwidget">
                	<p>
                    	<a href="#" class="thrive-sc-button  blue-gradient">
                        	<span class="thrive-phone"></span>
                           </a>
                        <a href="#" class="thrive-sc-button  blue-gradient right-button">
                        	<span class="thrive-location">Locations</span>
                         </a>
                    </p>
				</div>
			</div>     
         
			
			
			<?php if ( is_active_sidebar( 'header-right' ) ) : ?><?php dynamic_sidebar( 'header-right' ); ?><?php endif; ?></div><!--end #header-right-->
            
              <div id="header-left"><?php if ( is_active_sidebar( 'header-left' ) ) : ?><?php dynamic_sidebar( 'header-left' ); ?><?php endif; ?></div><!--end #header-left -->
		</div><!--end .twelvecol .last-->
    </div><!--end .row -->
</div><!--end #header -->
<div class="clear"></div>

<!-- Subheader-->
<?php if ( is_active_sidebar( 'subheader' ) ) : ?>
<div id="subheader">
	<div class="row">
		<?php dynamic_sidebar( 'subheader' ); ?>
	</div><!--end #header .row-->
   <div class="clear"></div>
</div><!--end #subheader-->
<?php endif; ?>
	
<!-- Slider-->
<?php if(is_front_page()) {?>

<div id="slider" class="body3">
	<div class="container">
        <div class="row">
        	<div class="fourcol">
            	<div id="appliance">
        			<h2 id="parts-menu">Appliance Parts</h2>
        			<?php get_search_form(); ?>
        		</div>
        <?php   
 //$terms = get_terms('repair_parts_cat');
//  $count = count($terms);
 //if ( $count > 0 ){
     echo '<ul>';
     // foreach ( $terms as $term ) {
	//	$child_slug = $term->slug;
		 
    //   echo '<li><a href="/repair_parts_cat/'. $child_slug . '/">'  . $term->name . ' &raquo;</a></li>';
        $args = array(
	'depth'        => 1,
	'show_date'    => '',
	'date_format'  => get_option('date_format'),
	'child_of'     => 205,
	'exclude'      => '972',
	'include'      => '',
	'title_li'     => '',
	'echo'         => 1,
	'authors'      => '',
	'sort_column'  => 'menu_order, post_title',
	'link_before'  => '',
	'link_after'   => ' &raquo;',
	'walker'       => '',
	'post_type'    => 'page',
        'post_status'  => 'publish' 
);
		
		wp_list_pages($args);
     // }
     echo "</ul>";
// }
	  ?>
        	</div> 
        	<div class="eightcol last">
        		<?php if (get_option('thrive_slider_dis') <> "true") {
            		main_slider();
			
            	} ?>
            </div>
 		</div><!--end #slider.container-->
     </div><!--end #slider.row-->
</div><!--end #slider-->

	<?php } else {  
	
	 function thrive_page_title() {
		$post_type = get_post_type();
		if ($post_type == "tribe_events") $post_type = "Events";
		if ($post_type == "testimonial") $post_type = "Testimonials";
	
		$term=$wp_query->queried_object;
		$term_name == $term->name;
		if ($term_name == "tribe_events_cat") $term_name=="Events";
	
		  elseif (is_tax()) { echo $term_name;
		} elseif ($post_type == "tribe_events") { echo "Events";
		} elseif (is_tax('tribe_events_cat')) { echo "Events";
		} elseif (is_post_type_archive( 'directory' )) { echo'Directory';
		} elseif (is_post_type_archive( 'testimonial' )) { echo'Testimonials';
		} elseif (is_404()) { echo'Page Not Found';
		} elseif (is_home() || is_archive() || is_archive()) { echo'Blog';
		} elseif (is_home()) { echo'Blog';
		} elseif (is_search()) { echo'Search for "' . get_search_query() . '"';
		} elseif (is_page()) { 
	
			global $wp_query;
			$thePostID = $wp_query->post->ID;
		
			$page_header = get_the_subheading($thePostID);
		
				if  ($page_header) {
					echo $page_header;
				} else {
					echo the_title();
				}
		if (!$post_type == "Post" || !$post_type == "Page") { echo $post_type;}
		} else { the_title(); }
	 } 
	 
	 if (get_option('thrive_subpage_image') == "true") { ?>
        
            <div id="slider" class="body3">
                <div class="row fi-index">
                    
                <?php if (!is_front_page() && has_post_thumbnail() && !is_single() && !is_archive() && !is_category() && !is_home()) { 
                    $header_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                    $header_url = $header_image['0'];
					} else {
					$header_url = $home_url. "/files/subpage-header.jpg";
					}
                ?>
                       <div id="page-featured-image">
                        <div class="twelvecol">
                        	<div id="title-wrap">
                            	<img src="<?= $url?>" />
                        		<h1 id="title"><?php  thrive_page_title(); ?></h1><!-- End .title -->
							</div><!-- End #title-wrap -->             
                        </div><!-- End #twelvecol -->   
                    </div><!--end .page-featured-image-->
                    
                </div><!--end .row .fi-index-->
    		</div><!--end #slider-->
            
		<?php } else { ?>
              <div id="slider" class="body3">
                 <div class="container">
                    <div class="row">
                        <div class="twelvecol">
                           <!--  <h1 class="pagetitle"><?php  thrive_page_title(); ?></h1> -->
                          
                         </div><!--end .twelvecol-->
               </div><!--end .row-->
       </div><!--end .container-->
     </div><!--end .slider-->
	<?php }
	 } ?>
     
<div class="clear"></div>

<!-- Core Top -->
<?php if ( is_active_sidebar( 'core-top' ) ) : ?>
<div id="core-top">
	<div class="container">
		<div class="row">
            <div class="twelvecol">
        		<?php dynamic_sidebar( 'core-top' ); ?>
             </div><!-- end twelvecol -->
        </div><!-- end row -->
    </div><!-- /#core top .container  -->
</div><!--end #core-top-->
<div class="clear"></div>
<?php endif; ?>