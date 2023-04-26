<?php
/**
 * Displays header banner on 404 pages
 */ 

$page_not_found_banner_title = get_field('404_banner_title','option'); 
$page_not_found_banner_description = get_field('404_banner_description','option'); 
$page_not_found_banner_image = get_field('404_banner_image','option');  
$page_not_found_banner_image_id = $page_not_found_banner_image['id'];   
$page_not_found_banner_image = fly_get_attachment_image_src($page_not_found_banner_image_id, '404-banner');
$page_not_found_banner_image = ($page_not_found_banner_image['src']) ? $page_not_found_banner_image['src'] : ''; 


?> 
<!-- START BANNER -->
<section class="banner-wrap" <?php if ($page_not_found_banner_image != '' ):?>
    style="background-image: url(<?php echo $page_not_found_banner_image; ?>);" <?php endif; ?>>
    <div class="org-overlay">
        <div class="notfound-block">
            <div class="notfound-banner-content">
                <div class="container">
                    <div class="banner-area">
                        <div class="row banner-row">
                            <div class="col-lg-8 align-self-center">
                                <div class="banner-text"> 
                                    <?php if ($page_not_found_banner_title) : ?>
                                    <div class="title"> 
                                        <h1 class="text-white mb-0"><?php echo $page_not_found_banner_title; ?></h1>
                                    </div>  
                                    <?php endif; ?>
                                    <?php if ($page_not_found_banner_description) : ?>
                                        <p><?php echo $page_not_found_banner_description; ?></p>
                                    <?php endif; ?>  
                                    <a href="<?php echo get_site_url(); ?>" title="<?php bloginfo('title'); ?>" class="btn btn-plain mt-5">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BANNER -->