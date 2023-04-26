<?php
/**
 * Displays content for Who we are page NEW
 */
?>
<?php
$content = apply_filters( 'the_content', get_the_content() );
$mission_title = get_field('mission_title'); 
$mission_description = get_field('mission_description'); 
$vision_image = get_field('vision_image'); 
 
$vision_image_id = $vision_image['id']; 
$vision_image = fly_get_attachment_image_src($vision_image_id, 'about-us-mission');
$vision_image = ($vision_image['src']) ? $vision_image['src'] : ''; 


$vision_title = get_field('vision_title'); 
$vision_description = get_field('vision_description'); 
$bbee_title = get_field('bbee_title'); 
$bbee_description = get_field('bbee_description'); 
$bbee_button_title = get_field('bbee_button_title'); 
$bbee_file = get_field('bbee_file'); 
?>
<div class="contentarea">
        <?php
        if($vision_title):
        ?>
        <div class="container">
            <div class="heading">
                <div class="title"><h2 class="text-orange"><?php echo $vision_title;?>:</h2></div>
            </div>
        </div>
        <?php
    	endif; 
        ?>
        <section class="container">
            <div class="row">
                <div class="<?php if($vision_image): ?> col-lg-7<?php else: ?>col-lg-12<?php endif; ?>">
                    <?php if($vision_description):?>
                    	<p><?php echo $vision_description;?></p>
                    <?php 
					endif;
					if($mission_description):
					?>	
                    <div class="orange_bg">
                        <div class="our-vision">
                            <?php
					        if($mission_title):
					        ?>
                            <div class="heading">
                                <div class="title"><h2 class="text-white"><?php echo $mission_title;?></h2></div>
                            </div>
                            <?php endif;?>
                            <?php if($mission_description):?>
		                    	<p><?php echo $mission_description;?></p>
		                    <?php endif;?>
                        </div>
                    </div>
					<?php
					endif;
					?>
                </div>
                <?php if($vision_image): ?>
                <div class="col-lg-5 mb-30">
                    <img src="<?php echo $vision_image;?>" class="img-full" alt="<?php the_title();?>">
                </div>
            <?php endif; ?>
            </div>
            <?php 
			if($bbee_description || $bbee_file):
    		?>
            <div class="row">
                <div class="col-lg-7">
                    <div class="status-text">
                        <?php 
                        if($bbee_title):
                        ?>
                        <div class="heading">
                            <div class="title"><h2 class="text-orange"><?php echo $bbee_title; ?>:</h2></div>
                        </div>
                    	<?php endif; ?>
                    	<?php if($bbee_description):?>
                        <p class="mb-4"><?php echo $bbee_description;?></p>
                        <?php endif; ?>
                        <?php if($bbee_file) : ?>
                        <a href="<?php echo $bbee_file;?>" class="btn btn-orange" target="_blank"><?php echo $bbee_button_title;?></a>
                    	<?php endif;?>
                    </div>
                </div>
            </div>
			<?php
			endif;
			?>
        </section>
    </div>