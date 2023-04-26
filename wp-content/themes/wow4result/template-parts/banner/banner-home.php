<?php
/*
 * Displays header banner on Frontpage page
 */ 
$home_banner_image = get_field('home_banner_image','option'); 
$home_banner_image_id = $home_banner_image['id']; 
$home_banner_image = fly_get_attachment_image_src($home_banner_image_id, 'top-banner');
$home_banner_image = ($home_banner_image['src']) ? $home_banner_image['src'] : ''; 
$home_banner_title = get_field('home_banner_title','option'); 
$home_banner_description = get_field('home_banner_description','option'); 

$home_page_banner_logo = get_field('home_page_banner_logo', 'option');  
?>
<section class="banner-wrap" <?php if ($home_banner_image != '' ):?>style="background-image: url(<?php echo $home_banner_image; ?>);" <?php endif;?>>
        <div class="homebanner_bg">
            <div class="full-height">
                <div class="home-bg">
                    <div class="home-banner-content">
                        <div class="container">
                            <div class="text-center">
                                <?php
                                if($home_page_banner_logo):
                                ?>
                                <div class="banner-logo">
                                    <img class="mb-2 wow-logo" src="<?php echo $home_page_banner_logo['url'];?>" alt="<?php bloginfo('title'); ?>" title="<?php bloginfo('title'); ?>">
                                </div>
                                <?php
                                endif;
                                ?>
                                <div class="title"> 
                                    <?php if ($home_banner_title) : ?><h1 class="text-white mb-0"><?php echo $home_banner_title; ?></h1><?php endif; ?>
                                    <?php if ($home_banner_description) : ?>
                                    	<p>
                                    		<?php echo $home_banner_description; ?>                              	
                                    	</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- START OUR OFFERING AREA --> 
            <?php 
            get_template_part('template-parts/home/home', 'offerings'); 
            ?> 
            <!-- END OUR OFFERING AREA -->
        </div>
</section>