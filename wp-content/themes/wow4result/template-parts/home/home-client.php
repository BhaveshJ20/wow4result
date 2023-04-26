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
                            /* $original_width = $client_image['width'];
                            $original_height = $client_image['height'];

                            $original_2x_width = ($client_image['width']*2);
                            $original_2x_height = ($client_image['height']*2);

                            $original_3x_width = ($client_image['width']*3);
                            $original_3x_height = ($client_image['height']*3);

                           print "<pre>";
                           // print_r($client_image);
                            print "original_width==>".$original_width."<br>";
                            print "original_height==>".$original_height."<br>";
                            print "original_2x_width==>".$original_2x_width."<br>";
                            print "original_2x_height==>".$original_2x_height."<br>";
                            print "original_3x_width==>".$original_3x_width."<br>";
                            print "original_3x_height==>".$original_3x_height."<br>";

                            print "<br>=========================<br>";*/
                            $client_image_id = $client_image['id']; 
                            $client_image = $client_image['url'];  

                            if($client_image) :
                                ?>
                                <div class="col-lg-3 col-md-6 mb-30">
                                    <div class="cl-logo-box">
                                        <div class="cl-logo-image">
                                            <img class="img-clr" src="<?php echo $client_image; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                            endif;
                        endwhile; 
                    endif;
                    ?> 
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