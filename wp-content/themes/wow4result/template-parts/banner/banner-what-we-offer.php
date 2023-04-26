<?php
/**
 * Displays header banner on What we offer pages
 */
$what_we_offer_banner_image = get_field('what_we_offer_banner_image','option'); 
$what_we_offer_banner_image_id = $what_we_offer_banner_image['id'];  

$what_we_offer_banner_image = fly_get_attachment_image_src($what_we_offer_banner_image_id, 'what-we-offer-banner');
$what_we_offer_banner_image = ($what_we_offer_banner_image['src']) ? $what_we_offer_banner_image['src'] : ''; 
 
$what_we_offer_banner_title = get_field('what_we_offer_banner_title','option'); 
$what_we_offer_banner_description = get_field('what_we_offer_banner_description','option'); 
?>
<section class="banner-wrap" <?php if ($what_we_offer_banner_image != '' ):?>
	style="background-image: url(<?php echo $what_we_offer_banner_image; ?>);" <?php endif; ?>>
        <div class="org-overlay">
            <div class="container">
                <div class="banner-area">
                    <div class="row banner-row">
                        <div class="col-lg-8 align-self-center">
                            <div class="banner-text"> 
                                <?php if ($what_we_offer_banner_title) : ?>
                                <div class="title">	
                                	<h1 class="text-white mb-0"><?php echo $what_we_offer_banner_title; ?></h1>
                                </div>	
                                <?php endif; ?>
                                <?php if ($what_we_offer_banner_description) : ?>
                                	<p><?php echo $what_we_offer_banner_description; ?></p>
                                <?php endif; ?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>