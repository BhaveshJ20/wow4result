<?php
/**
 * Displays content for Client 
 */ 
?>
<div class="contentarea">
	<?php get_template_part( 'template-parts/page/content', 'portfolio');?> 
    <div class="container">
         <?php the_content(); ?>
         <?php if( have_rows('add_mobile_apps') ):  $mob = 1; ?>
         	<?php while ( have_rows('add_mobile_apps') ) : the_row(); ?>
         		<?php
         		$mobile_app_title 	 	 = get_sub_field('mobile_app_title');
		 		$mobile_app_description  = get_sub_field('mobile_app_description');
		 		$mobile_app_image 		 = get_sub_field('mobile_app_image');  
		        $mobile_app_image_id 	 = $mobile_app_image['id'];   

		        $row_class = '';
		        $image_class = '';
		        $content_class = '';

		        if($mob%2==0):
        			$row_class = 'even';
        			$image_class = 'order-md-2';
        			$content_class = 'order-md-1'; 

        			$mobile_app = fly_get_attachment_image_src($mobile_app_image_id, 'mobile-app-right');
        			$mobile_app_x2 = fly_get_attachment_image_src( $mobile_app_image_id, 'mobile-app-right-2x');
					$mobile_app_x3 = fly_get_attachment_image_src( $mobile_app_image_id, 'mobile-app-right-3x');  
        		else:
        			$mobile_app = fly_get_attachment_image_src($mobile_app_image_id, 'mobile-app-left'); 
					$mobile_app_x2 = fly_get_attachment_image_src( $mobile_app_image_id, 'mobile-app-left-2x'); 
					$mobile_app_x3 = fly_get_attachment_image_src( $mobile_app_image_id, 'mobile-app-left-3x');
        		endif;	
        		$mobile_app = ($mobile_app['src']) ? $mobile_app['src'] : ''; 
        		$mobile_app_x2 = ($mobile_app_x2['src']) ? $mobile_app_x2['src'] : '';  
				$mobile_app_x3 = ($mobile_app_x3['src']) ? $mobile_app_x3['src'] : ''; 
				?>
				<div class="oddeven-block">
	                <div class="row <?php echo $row_class; ?>">
	                    <?php if($mobile_app): ?>
	                    <div class="col-lg-4 col-md-6 <?php echo $image_class; ?> align-self-center">
	                        <div class="screen-block">
	                            <img class="img-fluid" src="<?php echo $mobile_app;?>" srcset="<?php echo $mobile_app_x2;?> 2x, <?php echo $mobile_app_x3;?> 3x">
	                        </div>
	                    </div>
	                	<?php endif; ?>
	                    <?php if($mobile_app_title || $mobile_app_description):?>
		                    <div class="col-lg-8 col-md-6 <?php echo $content_class; ?> align-self-center">
		                        <?php if($mobile_app_title): ?>
		                        <div class="oddeven-title">
		                            <h3><?php echo $mobile_app_title;?></h3>
		                        </div>
		                    	<?php endif; ?>
		                        <?php if($mobile_app_description): ?><p><?php echo $mobile_app_description;?> </p><?php endif; ?> 
		                    </div>
	                	<?php endif;?>
	                </div>
	            </div>
				<?php
				$mob++;
         	?>
         	<?php endwhile; ?>	
         <?php endif; ?>
    </div> 
</div>