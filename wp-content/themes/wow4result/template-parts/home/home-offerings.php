<?php
$our_offer_section_title = get_field('our_offer_section_title'); 
$home_select_offers = get_field('home_select_offers');
if( $home_select_offers ):
?>
<div class="our-offerings">
    <div class="container">
        <?php
        if($our_offer_section_title):
        ?>
        <div class="text-center">
            <div class="title mb-5"><h2 class="text-white"><?php echo $our_offer_section_title;?></h2></div>
        </div>
        <?php
        endif;
        ?>
        <div class="row">
            <?php
            foreach( $home_select_offers as $post):
                setup_postdata($post); 
                $offer_image_detail = get_field('offer_front_image');
                $offer_image = $offer_image_detail['url'];
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="offer-block">
                    <?php if($offer_image) : ?>
                        <div class="white-icon">
                           <img src="<?php echo $offer_image; ?>" alt="<?php the_title(); ?>">
                        </div>
                    <?php endif;?>
                    <div class="white-icon-desc">
                       <h4><?php the_title(); ?></h4> 
                       <p><?php the_field('offer_short_description'); ?></p>
                       <a href="<?php the_permalink(); ?>" class="link-orange">Read More</a>
                    </div>
                </div>
            </div>
            <?php 
              endforeach;  
              wp_reset_postdata();
            ?>
        </div>
        <?php
        $homepage_portfolio_button_text  = get_field('homepage_portfolio_button_text');
        $homepage_portfolio_button_link   = get_field('homepage_portfolio_button_link');
        $homepage_portfolio_button_target = get_field('homepage_portfolio_button_targethomepage_portfolio_button_target');

        if($homepage_portfolio_button_link):
        ?> 
        <div class="text-center my-4">
            <a href="<?php echo $homepage_portfolio_button_link; ?>" class="btn btn-orange" target="<?php echo $homepage_portfolio_button_target; ?>" title="<?php echo $homepage_portfolio_button_text; ?>"><?php echo $homepage_portfolio_button_text; ?></a>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>
<?php
endif;
?>