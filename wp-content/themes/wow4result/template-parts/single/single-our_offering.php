<?php
/*
 * Template part for displaying Offer
 */  
	get_template_part( 'template-parts/single/single', 'offerlist');
 
	$offer_post_id = get_the_ID();
		 
	$offer_image = get_field('offer_image',$offer_post_id); 
	$offer_image_id = $offer_image['id']; 
	$offer_image = ($offer_image['url']) ? $offer_image['url'] : ''; 

	$offer_download_button_text = get_field('offer_download_button_text',$offer_post_id);
	$offer_upload_pdf = get_field('offer_upload_pdf',$offer_post_id); 
    $content = get_field('what_we_offer_description',$offer_post_id);

	$card_bottom_description = get_field('card_bottom_description',$offer_post_id); 


	
?>		
    <section class="gray_bg">
        <div class="offer-section">
            <div class="container">
                <div class="offer-header">
                    <div class="row">
                        <?php if($offer_image):?>
                        <div class="col-lg-1 col-md-2">
                            <div class="clr-icon"><img src="<?php echo $offer_image;?>" alt="<?php the_title();?>"></div>
                        </div>
                    	<?php endif;?>
                        <div class="<?php if($offer_upload_pdf): ?>col-lg-8 col-md-8<?php else : ?>col-lg-11 col-md-10<?php endif;?>">
                            <div class="offer-header-text">
                                <h3><?php the_title();?></h3>
                                <p><?php echo $content;?></p> 
                            </div>
                        </div>
                        <?php if($offer_upload_pdf):?>
                        <div class="col-lg-3 col-md-12">
                            <div class="download-pdf">
                                <a href="<?php echo $offer_upload_pdf;?>" download class="btn btn-white" title="<?php echo $offer_download_button_text;?>">	<?php echo $offer_download_button_text;?>                              	
                                </a>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php if( have_rows('add_card_details') ): ?>
                <div class="row">	
                <?php
                    $c=0;
                    $card_id = 1;
                         while ( have_rows('add_card_details') ) : the_row();	  
					        $card_icon = get_sub_field('card_icon'); 
					        $card_title = get_sub_field('card_title'); 
					        $card_description = trim(get_sub_field('card_description')); 
					        $card_cost_title = get_sub_field('card_cost_title'); 
					        $card_monthly_cost = get_sub_field('card_monthly_cost'); 
					        
					        if ( wp_is_mobile() ) :
		 					    $half_content = substr($card_description, 0, 70);
		 					else:
		 						$half_content = substr($card_description, 0, 80);
						 	endif; 
							$content_length = strlen($card_description); 
					       
					        ?>

					         <div class="col-lg-3 col-md-6 mb-30">
		                        <div class="box">
		                            <?php if($card_icon) :?>
		                            <div class="white-icon">
		                                <img src="<?php echo $card_icon; ?>" class="icon-size" alt="<?php echo $card_title;?>">
		                            </div>
		                        	<?php endif;?>
		                            <div class="white-icon-desc">
		                               <h4><?php echo $card_title;?></h4>
                                        <?php if($card_description):?>
                                            <div class="scroll-block">                                                 
                                                <div class="scrollcontent full-content content">
                                                    <p><?php echo $card_description;?></p>
                                                </div> 
                                            </div> 
                                        <?php endif;?>
		                                <?php if($card_monthly_cost) :?>
		                                <p class="mb-0">
		                                	<?php if($card_cost_title) :?>
		                                		<span class="text-uppercase"><?php echo $card_cost_title;?></span>: 
		                                	<?php endif;?>
		                                	<?php if($card_monthly_cost) :?>
		                                		<br /><strong><?php echo $card_monthly_cost;?></strong>
		                                	<?php endif;?>
		                                </p>
		                                <?php endif;?>	
		                            </div>
		                        </div>
		                    </div> 
                             
                            <?php  
                                $c++;
                                
                                if($c%4==0)
                                {
                                    echo "</div><div class='row'>";
                                }

                                $card_id++;
					    endwhile; 
				?>
                </div>
                <?php endif;?>
                <?php if($card_bottom_description): ?>
                    <div class="row">
                        <div class="col-lg-1 d-none d-lg-block">
                            &nbsp;
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <p><?php echo $card_bottom_description;?></p>
                        </div>
                    </div>
                <?php endif;?>				
            </div>
        </div>
    </section>
    <?php
    $offer_banner_image = get_field('offer_banner_image',$offer_post_id);  
	$offer_banner_image_id = $offer_banner_image['id'];  
	$offer_banner_image = fly_get_attachment_image_src($offer_banner_image_id, 'what-we-offer-quote-banner');
	$offer_banner_image = ($offer_banner_image['src']) ? $offer_banner_image['src'] : ''; 
	$offer_banner_quote = get_field('offer_banner_quote',$offer_post_id);  
	$offer_banner_quote_author = get_field('offer_banner_quote_author',$offer_post_id); 
	if($offer_banner_quote):
    ?>
    <section class="offers-bg" <?php if ($offer_banner_image != '' ):?>
	style="background-image: url(<?php echo $offer_banner_image; ?>);" <?php endif; ?>>
        <div class="blk-overlay">
            <div class="container">
                <div class="offer_bg_text">
                    <div class="text-center">
                        <h4>"<?php echo $offer_banner_quote;?>"</h4>
                        <?php if($offer_banner_quote_author): ?>
                        	<p><?php echo $offer_banner_quote_author;?></p>
                    	<?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php endif;?> 
<!-- End Sales & Channel Incentives -->