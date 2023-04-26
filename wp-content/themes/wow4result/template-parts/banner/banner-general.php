<?php
/*
 * Displays header banner for general pages
 */ 
$banner_image = get_field('banner_image'); 
$banner_image_id = $banner_image['id'];
//$banner_image = fly_get_attachment_image_src($banner_image_id, 'top-banner');
//$banner_image = ($banner_image['src']) ? $banner_image['src'] : '';
$banner_image = ($banner_image['url']) ? $banner_image['url'] : ''; 
$banner_title = get_field('banner_title'); 
$banner_description = get_field('banner_description');

$is_general_banner_set = 0;

if($banner_image != '' || $banner_title != '' || $banner_description != ''):
    $is_general_banner_set = 1;
    define('is_general_banner_set',$is_general_banner_set);
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
<?php endif;?>