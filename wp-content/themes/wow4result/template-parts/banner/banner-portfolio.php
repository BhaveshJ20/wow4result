<?php
/*
 * Displays header banner on Portfolio Page
 */
$portfolio_banner_image = get_field('portfolio_banner_image','option'); 
$portfolio_banner_image_id = $portfolio_banner_image['id'];  
$portfolio_banner_image = fly_get_attachment_image_src($portfolio_banner_image_id, 'portfolio-banner');
$portfolio_banner_image = ($portfolio_banner_image['src']) ? $portfolio_banner_image['src'] : ''; 

$portfolio_banner_title = get_field('portfolio_banner_title','option'); 
$portfolio_banner_description = get_field('portfolio_banner_description','option'); 
?> 
<!-- START BANNER -->
<section class="banner-wrap" <?php if ($portfolio_banner_image != '' ):?>
	style="background-image: url(<?php echo $portfolio_banner_image; ?>);" <?php endif; ?>>
        <div class="org-overlay">
            <div class="container">
                <div class="banner-area">
                    <div class="row banner-row">
                        <div class="col-lg-8 align-self-center">
                            <div class="banner-text">
                                <?php if ($portfolio_banner_title) : ?>
                                <div class="title">
                                    <h1 class="text-white mb-0"><?php echo $portfolio_banner_title; ?></h1>                      
                                </div>
                                <?php endif; ?>
                                <?php if ($portfolio_banner_description) : ?><p><?php echo $portfolio_banner_description; ?></p><?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- END BANNER -->