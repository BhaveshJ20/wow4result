<?php
/**
 * Displays header banner on 404 pages
 */ 

$thank_you_banner_title = get_field('thank_you_banner_title','option'); 
$thank_you_banner_description = get_field('thank_you_banner_description','option'); 
$thank_you_banner_image = get_field('thank_you_banner_image','option');  
$thank_you_banner_image_id = $thank_you_banner_image['id'];   
$thank_you_banner_image = fly_get_attachment_image_src($thank_you_banner_image_id, '404-banner');
$thank_you_banner_image = ($thank_you_banner_image['src']) ? $thank_you_banner_image['src'] : ''; 


?> 
<!-- START BANNER -->
<section class="banner-wrap" <?php if ($thank_you_banner_image != '' ):?>
    style="background-image: url(<?php echo $thank_you_banner_image; ?>);" <?php endif; ?>>
    <div class="org-overlay">
        <div class="notfound-block">
            <div class="notfound-banner-content">
                <div class="container">
                    <div class="banner-area">
                        <div class="row banner-row">
                            <div class="col-lg-8 align-self-center">
                                <div class="banner-text"> 
                                    <?php if ($thank_you_banner_title) : ?>
                                    <div class="title"> 
                                        <h1 class="text-white mb-0"><?php echo $thank_you_banner_title; ?></h1>
                                    </div>  
                                    <?php endif; ?>
                                    <?php if ($thank_you_banner_description) : ?>
                                        <p><?php echo $thank_you_banner_description; ?></p>
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