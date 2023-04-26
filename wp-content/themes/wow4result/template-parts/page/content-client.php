<?php
/**
 * Displays content for Client 
 */

?>
<div class="contentarea">
	<?php get_template_part( 'template-parts/page/content', 'portfolio');?> 
    <?php
    if( have_rows('add_client_image') ): ?>
    <div class="container">
        <div class="row mb-4">
            <?php 
            while ( have_rows('add_client_image') ) : the_row();
            	$add_clientwise_image = get_sub_field('add_clientwise_image'); 
            	$add_clientwise_image_id = $add_clientwise_image['id'];  
				$add_clientwise_image = fly_get_attachment_image_src($add_clientwise_image_id, 'client');
				$add_clientwise_image = ($add_clientwise_image['src']) ? $add_clientwise_image['src'] : ''; 		   
			    if($add_clientwise_image) :
            	?> 
            		<div class="col-lg-3 col-md-6 mb-30">
		                <div class="cl-logo-box">
		                    <div class="cl-logo-image">
		                        <img class="img-clr" src="<?php echo $add_clientwise_image;?>">
		                    </div>
		                </div>
		            </div> 
	            <?php endif; ?>
        	<?php endwhile; ?>
        </div>
    </div>
	<?php endif; ?>
</div>
<!-- END OUR CLIENTS AREA -->