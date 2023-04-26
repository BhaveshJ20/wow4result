<?php
//$banner_image_id = get_post_thumbnail_id();

$page_for_posts = get_option( 'page_for_posts' );

$banner_image = get_field('banner_image', $page_for_posts); 
$banner_image_id = $banner_image['id'];

$banner_image = fly_get_attachment_image_src($banner_image_id, 'top-banner');
$banner_image = ($banner_image['src']) ? $banner_image['src'] : get_stylesheet_directory_uri().'/assets/images/blog_img.jpg';
$banner_title = get_the_title();
$banner_description = get_field('blog_short_desctiption');

?>

<section class="banner-wrap" style="background-image: url(<?php echo $banner_image; ?>);">
	<div class="org-overlay">
		<div class="container">
			<div class="banner-area">
				<div class="row banner-row">
					<div class="col-lg-8 align-self-center">
						<div class="banner-text">
							<div class="title">
								<h1 class="text-white mb-0"><?php echo $banner_title; ?></h1>
							</div>
							<p><?php echo $banner_description; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 

$next_post = get_next_post();
$blog_left_content =  get_field('blog_left_content');
//$blog_image =  get_field('blog_image');
$banner_image_id = get_post_thumbnail_id();
$main_class = "articlev2";
//if($blog_image):
if($banner_image_id):
	//$blog_image_id = $blog_image['id']; 
	$blog_image_id = $banner_image_id;
	
	$blog_image = fly_get_attachment_image_src($blog_image_id, 'top-banner');
	$blog_image = ($blog_image['src']) ? $blog_image['src'] : ''; 
	$main_class = "article-block";
endif;

$blog_right_content =  get_field('blog_right_content');
$author_name = get_field('author_name');
$author_quote = get_field('author_quote');
$author_image = get_field('author_image');

if($author_image):
	$author_image_id = $author_image['id']; 
	$author_image = fly_get_attachment_image_src($author_image_id, 'author-pic');
	$author_image = ($author_image['src']) ? $author_image['src'] : ''; 


	$author_image_2x = fly_get_attachment_image_src($author_image_id, 'author-pic-2x');
	$author_image_2x = ($author_image_2x['src']) ? $author_image_2x['src'] : ''; 

	$author_image_3x = fly_get_attachment_image_src($author_image_id, 'author-pic-3x');
	$author_image_3x = ($author_image_3x['src']) ? $author_image_3x['src'] : ''; 
endif;

$is_featured = get_post_meta( get_the_ID(), '_is_featured', true);

?>

<div class="contentarea blog-detail-page">
	<div class="container">
		<div class="article-link d-flex mb-30">
			<div class="mr-auto"><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="link-orange" title="BACK TO BLOG">BACK TO BLOG</a></div>
			<?php if (!empty( $next_post )): ?>
				<div><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="link-orange" title="Next Article">Next Article</a></div>
			<?php endif; ?>
		</div>
	</div>
	<section class="<?php echo $main_class; ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="article-block-right">
						<div class="oddeven-title">
							<h3><?php echo ($is_featured == 'yes')  ? 'Featured Article - '.get_the_date('d  M  Y') : get_the_date('d  M  Y') ; ?></h3>
						</div>
						<?php echo $blog_left_content; ?>
					</div>
				</div>				
				<?php if($blog_image): ?>
					<div class="col">
						<div class="article-block-left article-img" style="background-image: url(<?php echo $blog_image; ?>);">
							
						</div>
					</div>
					<?php else: ?>
						<div class="col-lg-6">
							<div class="article-block-left">
								<?php echo $blog_right_content; ?>
							</div>
						</div>
					<?php endif; ?>					
				</div>
			</div>
		</section>
		<?php 
		$class = "col-lg-6";
		if(!$blog_image || !$blog_right_content):
			$class = "col-lg-12";
		endif;
		?>
		<div class="container">
			<div class="row">
				<?php if($author_image || $author_quote || $author_name): ?>
					<div class="<?php echo $class; ?>">
						<div class="author-block">
							<?php if($author_image): ?>
								<div class="author-pic">
									<img class="rounded-circle img-fluid" src="<?php echo $author_image; ?>" srcset="<?php echo $author_image_2x; ?> 2x, <?php echo $author_image_3x; ?> 3x">
								</div>
							<?php else:	?>
								<div class="author-pic">
									<img class="rounded-circle img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/no-image.svg">
								</div>
							<?php
							endif; ?>
							<div class="author-text">
								<?php if($author_quote): ?>
									<h3><sup><img class="inverted-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/inverted-top.svg" alt="Inverted Top"></sup><?php echo $author_quote; ?><sub><img class="inverted-botm" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/inverted-botm.svg" alt="Inverted Bottom"></sub></h3>
								<?php endif; ?>
								<p><?php echo $author_name; ?></p>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if($blog_image && $blog_right_content): ?>
					<div class="col-lg-6">
						<?php echo $blog_right_content; ?>
					</div>
				<?php endif; ?>
			</div>


			<hr>
			<div class="article-link d-flex pt-3 mb-30">
				<div class="mr-auto"><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="link-orange" title="BACK TO BLOG">BACK TO BLOG</a></div>
				<?php if (!empty( $next_post )): ?>
					<div><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="link-orange" title="Next Article">Next Article</a></div>
				<?php endif; ?>
			</div>
		</div>
	</div>x