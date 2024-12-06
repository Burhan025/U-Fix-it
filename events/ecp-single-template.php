<?php
/**
*  If 'Default Events Template' is selected in Settings -> The Events Calendar -> Theme Settings -> Events Template, 
*  then this file loads the page template for all for the individual 
*  event view.  Generally, this setting should only be used if you want to manually 
*  specify all the shell HTML of your ECP pages in this template file.  Use one of the other Theme 
*  Settings -> Events Template to automatically integrate views into your 
*  theme.
*
* You can customize this view by putting a replacement file of the same name (ecp-single-template.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }
?>
<?php get_header(); ?>
<?php tribe_events_before_html() ?>

<div id="core-container">
<div id="core">
 <div class="container">
	<div class="row">
        <div class="twelvecol">
    	    <div id="content" class="tribe-events-event widecolumn">
                
				
				
				
				<?php the_post(); global $post; ?>
                <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
                    <h2 class="entry-title"><?php the_title() ?></h2>
                    
                    <!-- Share this -->
                    
                    <span class='st_facebook_hcount' displayText='Facebook'></span>
                    <span class='st_googleplus_hcount' displayText='Google +'></span>
                    <span class='st_twitter_hcount' displayText='Tweet'></span>
                    <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                    <span class='st_email_hcount' displayText='Email'></span>
                    <br/><br/>
                     
                    <?php include(tribe_get_current_template()) ?>
                    <?php edit_post_link(__('Edit','tribe-events-calendar'), '<span class="edit-link">', '</span>'); ?>
                </div><!-- post -->
                <?php if(tribe_get_option('showComments','no') == 'yes'){ comments_template();} ?>
            </div><!-- #content -->
        </div><!--#twelvecol-->
    </div><!--#row-->
  </div><!-- end .container -->
</div><!--#core-->
</div><!--#core-container-->

<?php tribe_events_after_html() ?>
<?php get_footer(); ?>
