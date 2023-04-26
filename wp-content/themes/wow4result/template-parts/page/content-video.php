<?php
/**
 * Displays content for Client 
 */

$video_per_page = get_field('video_per_page', 'option');
$video_per_page = ($video_per_page) ? $video_per_page : -1;
$count_args = array(
        'post_type' => 'wow_video',
        'post_status' => 'publish', 
        'orderby' => date,
        'order' => 'DESC' 
    );

$count_query = new WP_Query($count_args);

$total_clients = $count_query->found_posts;
?>
<div class="contentarea">
	<?php get_template_part( 'template-parts/page/content', 'resource-centre');?>
	<div class="container">
		<div class="mb-4">
            <p><?php the_content(); ?></p>
        </div>
        <div id="video-list" class="row">
		    <!--Load Video Data from video.js --> 
		</div>
		<div id="loader" class="text-center pb-4">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ajax-loader.gif"/>
		<div> 
	</div>	
</div>

<input type="hidden" id="video_per_page" name="video_per_page" value="<?php echo $video_per_page; ?>"/>
<input type="hidden" id="total_clients" name="total_clients" value="<?php echo $total_clients; ?>"/>
<input type="hidden" id="ajaxurl" name="ajaxurl" value="<?php echo admin_url('admin-ajax.php'); ?>" />