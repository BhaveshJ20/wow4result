<?php
/**
 * Displays header banner on Who We are
 */
$who_we_are_banner_image = get_field('who_we_are_banner_image','option'); 
$who_we_are_banner_image_id = $who_we_are_banner_image['id']; 
$who_we_are_banner_image = fly_get_attachment_image_src($who_we_are_banner_image_id, 'about-us-banner');
$who_we_are_banner_image = ($who_we_are_banner_image['src']) ? $who_we_are_banner_image['src'] : ''; 

$who_we_are_banner_title = get_field('who_we_are_banner_title','option'); 
$who_we_are_banner_description = get_field('who_we_are_banner_description','option'); 
?> 
<!-- START BANNER -->
<section class="banner-wrap" <?php if ($who_we_are_banner_image != '' ):?>
style="background-image: url(<?php echo $who_we_are_banner_image; ?>);" <?php endif; ?>
>
    <div class="org-overlay">
        <div class="container">
            <div class="banner-area">
                <div class="row banner-row">
                    <div class="col-lg-8 align-self-center">
                        <div class="banner-text">
                            <?php if ($who_we_are_banner_title) : ?>
                            <div class="title">
                                <h1 class="text-white mb-0">
                                	<?php echo $who_we_are_banner_title; ?>
                                </h1>
                            </div>
                            <?php endif; ?>
                            <?php if ($who_we_are_banner_description) : ?>
                            <p><?php echo $who_we_are_banner_description; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BANNER -->