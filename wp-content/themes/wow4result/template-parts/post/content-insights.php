<?php
$insight_title = get_field('insight_title','option'); 
$insight_description = get_field('insight_description','option'); 

$limit =  get_field('post_per_page_except_featured_post' , 'option') ? intval(get_field('post_per_page_except_featured_post', 'option')) : 6;
$meta_query = array(
    'relation' => 'AND',
    array(
        'key' => '_is_featured',
        'compare' => '!=',
        'value' =>'yes',
    ),
);

$args = array(
    'posts_per_page' => -1,        
    'post_type' => 'post',
    'post_status' => 'publish',
    'meta_query' => $meta_query
);
$count_query = new WP_Query( $args );
$count = $count_query->found_posts;

$max_pages = ceil($count / $limit); 

?>
<div class="contentarea blog-page">
	<?php if($insight_title): ?>
	<div class="container">
		<div class="heading">
			<div class="title"><h2 class="text-orange"><?php echo $insight_title;?></h2></div>
		</div>
	</div>
	<?php endif;?>
	<div class="container">
		<div class="latest-blog-top">
			<div class="row">
				
				<?php 
				$sort_class = 'col-lg-12';
				$description_class = 'col-lg-6';
				if($insight_description): 
					$sort_class = 'col-lg-6';
					if($count == 0)
						$description_class = 'col-lg-12';
				?>
				<div class="<?php echo $description_class;?> mb-30">
					<p><?php echo $insight_description;?></p>
				</div>
				<?php endif;?>
				<?php if($count > 0):?>
				<div class="<?php echo $sort_class;?> mb-30">
					<div class="filter-option">
						<div class="sort-lbl">SORT BY</div>
						<div class="b-select-wrap">
							<select id="sort_by" class="b-select">
								<option value="date_desc">Most Recent</option>
								<option value="alpha_asc">A-Z</option>
								<option value="alpha_desc">Z-A</option>								
							</select>
						</div>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>	
	<?php 
	
	$feature_posts_args = array(
		'posts_per_page' => -1,
		'post_type' => 'post',
		'post_status' => 'publish',
		'meta_key' => '_is_featured',
		'meta_value' => 'yes',
	);
	
	$the_query = new WP_Query( $feature_posts_args );
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();

			$thumb_id = get_post_thumbnail_id();
			$post_thumb = fly_get_attachment_image_src($thumb_id, 'featured-post-thumb');
			$post_thumb = ($post_thumb['src']) ? $post_thumb['src'] : '';
			?>
			<section class="article-block">
				<div class="container">
					<div class="row">
						<?php if($post_thumb): ?>
							<div class="col">

								<div class="article-block-left" style="background-image: url(<?php echo $post_thumb; ?>);">
								</div>
							</div>
						<?php endif; ?>
						<div class="col-lg-6">
							<div class="article-block-right">
								<div class="oddeven-title">
									<h3><?php the_title(); ?></h3>
									<strong>Featured Article - <?php the_date('d | m | y'); ?></strong>
								</div>
								<?php the_field('blog_left_content'); ?>
								<a href="<?php the_permalink(); ?>" title="Read More" class="btn btn-orange">READ MORE</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php 
		endwhile;
	endif; 
	?>
	<div class="container blog-list">
		<div id="list_insights"  class="row">  <!-- class="row" --> 
		</div>
		<div id="loader" class="text-center pb-4">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ajax-loader.gif"/>
		<div>
	</div>
</div>
<input type="hidden" id="limitstart" name="limitstart" value="0"/>
<input type="hidden" id="limit" name="limit" value="<?php echo $limit; ?>"/>
<input type="hidden" id="total" name="total" value="<?php echo $count; ?>"/>
<input type="hidden" id="insight_page" name="insight_page" value="1"/>
<input type="hidden" id="max_pages" name="max_pages" value="<?php echo $max_pages;?>"/>
<input type="hidden" id="ajax_url" value="<?php echo admin_url('admin-ajax.php'); ?>" />		