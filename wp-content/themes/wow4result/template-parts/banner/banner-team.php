<?php
/*
 * Displays header banner for team page
 */ 
$banner_image = get_field('banner_image'); 
$banner_image_id = $banner_image['id']; 
$banner_image = fly_get_attachment_image_src($banner_image_id, 'team-banner');
$banner_image = ($banner_image['src']) ? $banner_image['src'] : '';   
$banner_title = get_field('banner_title'); 
$banner_description = get_field('banner_description'); 
?>

<section class="banner-wrap" <?php if ($banner_image != '' ):?>
    style="background-image: url(<?php echo $banner_image; ?>);" <?php endif; ?>>
    <div class="org-overlay">
        <div class="container">
            <div class="banner-area">
                <div class="row banner-row">
                    <div class="col-lg-8 align-self-center">
                        <div class="banner-text">
                            <?php if ($banner_title) : ?>
                            <div class="title">
                                <h1 class="text-white mb-0"><?php echo $banner_title; ?></h1>
                            </div>
                            <?php endif; ?>
                            <?php if ($banner_description) : ?>
                                <p><?php echo $banner_description; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>