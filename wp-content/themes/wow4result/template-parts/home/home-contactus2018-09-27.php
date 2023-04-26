<?php
$contact_us_title = get_field('contact_us_title');
$content_of_contact_us = get_field('content_of_contact_us');
$telephone_image = get_field('image_for_telephone','option');
$telephone_number = get_field('telephone_number','option');
$fax_number = get_field('fax_number','option');
$email_image = get_field('image_for_email','option');
$general_enquiry_email = get_field('general_enquiry_email','option');
?>
<section class="contacus-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- START CONTACT US -->
                <div class="contact-us">
                    <?php
                    if($contact_us_title):
                    ?>
                    <div class="title">
                        <h2 class="text-orange">
                            <?php echo $contact_us_title;?>                      
                        </h2>
                    </div>
                    <?php
                    endif;
                    if($content_of_contact_us):
                    ?>
                    <p><?php echo $content_of_contact_us;?></p>
                    <?php
                    endif;
                    ?>
                </div>
                <?php if($telephone_number || $fax_number):?>
                <div class="row">
                    <?php if($telephone_number || $fax_number || $general_enquiry_email):?>
                    <div class="col-md-6">
                        <div class="contact-details">
                            <?php if($telephone_image):?>
                                <img src="<?php echo $telephone_image;?>" alt="Call">
                            <?php endif; ?>  
                            <?php if($telephone_number):?>
                            <a href="tel:<?php echo $telephone_number;?>">Tel: <?php echo $telephone_number;?></a> 
                            <?php endif; ?>
                            <?php if($fax_number):?>
                            <a href="tel:<?php echo $fax_number;?>">Fax: <?php echo $fax_number;?></a> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?> 
                    <?php if($general_enquiry_email):?>
                    <div class="col-md-6">
                        <div class="contact-details">
                            <?php if($email_image):?>
                                <img src="<?php echo $email_image;?>" alt="Call">
                            <?php endif; ?>  
                            <?php if($general_enquiry_email):?>  
                            <a href="mailto:<?php echo $general_enquiry_email;?>"><?php echo $general_enquiry_email;?></a>
                             <?php endif; ?> 
                        </div>
                    </div>
                    <?php endif; ?> 
                </div>
                <?php endif; ?> 
                <?php
                if( have_rows('add_address','option') ):   
                        $address_image = get_sub_field('image_for_address'); 
                        $office_address = get_sub_field('office_address');  
                ?>
                <div class="row">
                    <?php
                        while ( have_rows('add_address','option') ) : the_row();$address_image = get_sub_field('image_for_address');$office_address = get_sub_field('office_address');
                            if($office_address):
                        ?>
                                <div class="col-md-6">
                                    <div class="contact-details">
                                        <?php 
                                            if($address_image):
                                        ?>
                                                <img src="<?php echo $address_image;?>" alt="Address">
                                        <?php
                                            endif;
                                            if($office_address):
                                        ?>
                                                <p><?php echo $office_address;?></p>
                                        <?php
                                            endif;
                                        ?>
                                    </div>
                                </div> 
                    <?php 
                            endif;
                        endwhile;     
                    ?>  
                </div>
                <?php
                endif;
                ?>
                <!-- END CONTACT US -->
            </div>
            <?php
            $talk_to_us_title = get_field('talk_to_us_title','option');
            $talk_to_us_description = get_field('talk_to_us_description','option');
            $talk_to_us_from = get_field('talk_to_us_from','option');

            if($talk_to_us_from):
            ?>
            <div class="col-lg-6">
                <!-- START TALK TO US -->
                <div class="talk-to-us">
                    <div class="text-center">
                        <?php if($talk_to_us_title):?>
                            <div class="title"><h3 class="text-orange"><?php echo $talk_to_us_title; ?></h3></div>
                        <?php endif;?>
                        <?php if($talk_to_us_description):?>
                        <p><?php echo $talk_to_us_description; ?></p>
                        <?php endif;?>
                    </div>
                    <?php echo do_shortcode($talk_to_us_from);?> 
                </div>
                <!-- END TALK TO US -->
            </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</section>