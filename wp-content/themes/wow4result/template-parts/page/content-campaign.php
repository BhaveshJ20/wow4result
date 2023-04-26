<?php
/**
 * Displays content for Client 
 */
?>
<div class="contentarea">
	<?php get_template_part( 'template-parts/page/content', 'portfolio');?> 
    <div class="container">
    	<?php the_content(); ?>
        <?php if( have_rows('add_campaigns') ): 
        	$cam = 1;
        	while ( have_rows('add_campaigns') ) : the_row();

        		$campaign_title 	  = get_sub_field('campaign_title');
		 		$campaign_description = get_sub_field('campaign_description');
		 		$campaign_image 	  = get_sub_field('campaign_image'); 	 		 
				$campaign_image_id 	  = $campaign_image['id'];   

		        $row_class = '';
		        $image_class = '';
		        $content_class = '';

        		if($cam%2==0):
        			$row_class = 'even';
        			$image_class = 'order-md-2';
        			$content_class = 'order-md-1'; 

        			$campaigns = fly_get_attachment_image_src($campaign_image_id, 'campaigns-right');
        			$campaigns_x2 = fly_get_attachment_image_src( $campaign_image_id, 'campaigns-right-2x');
					$campaigns_x3 = fly_get_attachment_image_src( $campaign_image_id, 'campaigns-right-3x');
        			

        		else:
        			$campaigns = fly_get_attachment_image_src($campaign_image_id, 'campaigns-left'); 
					$campaigns_x2 = fly_get_attachment_image_src( $campaign_image_id, 'campaigns-left-2x'); 
					$campaigns_x3 = fly_get_attachment_image_src( $campaign_image_id, 'campaigns-left-3x');
        		endif;	
        		$campaigns_image = ($campaigns['src']) ? $campaigns['src'] : ''; 
        		$campaigns_x2 = ($campaigns_x2['src']) ? $campaigns_x2['src'] : '';  
				$campaigns_x3 = ($campaigns_x3['src']) ? $campaigns_x3['src'] : ''; 
        		?>
        		<div class="oddeven-block">
	                <div class="row <?php echo $row_class; ?>">
	                    <?php if($campaigns_image): ?>
	                    <div class="col-lg-4 col-md-6 <?php echo $image_class; ?> align-self-center">
	                        <div class="screen-block">
	                            <img class="img-fluid" src="<?php echo $campaigns_image;?>" srcset="<?php echo $campaigns_x2;?> 2x, <?php echo $campaigns_x3;?> 3x">
	                        </div>
	                    </div>
	                	<?php endif; ?>
	                    <?php if($campaign_title || $campaign_description):?>
		                    <div class="col-lg-8 col-md-6 <?php echo $content_class; ?> align-self-center">
		                        <?php if($campaign_title): ?>
		                        <div class="oddeven-title">
		                            <h3><?php echo $campaign_title;?></h3>
		                        </div>
		                    	<?php endif; ?>
		                        <?php if($campaign_description): ?><p><?php echo $campaign_description;?> </p><?php endif; ?> 
		                    </div>
	                	<?php endif;?>
	                </div>
	            </div>
        		<?php
        		$cam++;
        	endwhile;	
        	?>
    	<?php endif;?> 
    </div> 
</div>