<?php
/*
 * Displays header banner on Resource Centre Page
 */

$resource_centre_banner_title = get_field('resource_centre_banner_title','option'); 
$resource_centre_banner_description = get_field('resource_centre_banner_description','option'); 
$resource_centre_banner_image = get_field('resource_centre_banner_image','option'); 
$resource_centre_banner_image_id = $resource_centre_banner_image['id'];  
$resource_centre_banner_image = fly_get_attachment_image_src($resource_centre_banner_image_id, 'resource-banner');
$resource_centre_banner_image = ($resource_centre_banner_image['src']) ? $resource_centre_banner_image['src'] : '';  

?>
<!-- START BANNER -->
<section class="banner-wrap" <?php if ($resource_centre_banner_image != '' ):?>
	style="background-image: url(<?php echo $resource_centre_banner_image; ?>);" <?php endif; ?>>
    <div class="org-overlay">
        <div class="container">
            <div class="banner-area">
                <div class="row banner-row">
                    <div class="col-lg-8 align-self-center">
                        <div class="banner-text">
                            <?php if ($resource_centre_banner_title) : ?>
                            <div class="title">
                                <h1 class="text-white mb-0">
                                	<?php echo $resource_centre_banner_title; ?>
                                </h1>
                            </div>
                            <?php endif; ?>
                            <?php if ($resource_centre_banner_description) : ?><p><?php echo $resource_centre_banner_description; ?></p><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BANNER -->