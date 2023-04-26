<?php
if( have_rows('add_client_images') ):
?>
<section class="dark-orange_bg our-clients-wrap">
        <div class="container">
            <div class="gray_bg">
                <div class="text-center">
                    <div class="title"><h2 class="text-orange"><?php echo get_field('client_section_title');?></h2></div>
                </div>
            </div>
        </div>
</section>
<section class="gray_bg">
    <div class="container">
            <div class="someof-our-clients">
                <div class="row">
                    <?php
                    if( have_rows('add_client_images') ): 
                        while ( have_rows('add_client_images') ) : the_row();                    
                            $client_image = get_sub_field('select_client_image');
                            $client_image_id = $client_image['id']; 
                           // $client_image = $client_image['url'];
                             $client_image = fly_get_attachment_image_src($client_image_id, 'home-client');
                            $client_image = ($client_image['src']) ? $client_image['src'] : '';  

                            $client_image_2x = fly_get_attachment_image_src($client_image_id, 'home-client-2x');
                            $client_image_2x = ($client_image_2x['src']) ? $client_image_2x['src'] : ''; 
                            $client_image_3x = fly_get_attachment_image_src($client_image_id, 'home-client-3x');
                            $client_image_3x = ($client_image_3x['src']) ? $client_image_3x['src'] : '';
                            

                            if($client_image) :
                                ?>
                                <div class="col-lg-3 col-md-6 mb-30">
                                    <div class="cl-logo-box">
                                        <div class="cl-logo-image">
                                            <img class="img-clr" src="<?php echo $client_image; ?>" srcset="<?php echo $client_image_2x." 2x,".$client_image_3x." 3x"; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                            endif;
                        endwhile; 
                    endif;
                    ?>

                    <!--<div class="col-lg-3 col-md-6 mb-30">
                        <div class="cl-logo-box">
                            <div class="cl-logo-image">
                                <img class="img-clr" src="images/absa/absa.png" srcset="images/absa/absa@2x.png 2x, images/absa/absa@3x.png 3x">
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6 mb-30">
                        <div class="cl-logo-box">
                            <div class="cl-logo-image">
                                <img class="img-clr" src="images/ackermans/ackermans-logo-slider.png" srcset="images/ackermans/ackermans-logo-slider@2x.png 2x, images/ackermans/ackermans-logo-slider@3x.png 3x">
                            </div>
                        </div>
                    </div> --> 
                </div>
                <?php
                $home_client_button_title  = get_field('home_client_button_title');
                $home_client_button_link   = get_field('home_client_button_link');
                $home_client_button_target = get_field('home_client_button_target');
                if ($home_client_button_link) : 
                ?>
                <div class="text-center">
                    <a href="<?php echo $home_client_button_link; ?>" target="<?php echo $home_client_button_target; ?>" title="<?php echo $home_client_button_title; ?>" class="btn btn-orange"><?php echo $home_client_button_title; ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
</section>
<?php
endif;
?>